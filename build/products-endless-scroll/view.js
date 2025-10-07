/******/ (() => { // webpackBootstrap
/*!*********************************************!*\
  !*** ./src/products-endless-scroll/view.js ***!
  \*********************************************/
(function () {
  const containers = document.querySelectorAll('[data-product-endless-uid]');
  containers.forEach(container => {
    const grid = container.querySelector('.product-endless-grid');
    const totalElem = container.querySelector('.pe-total');
    let page = 1;
    let loading = false;
    let maxPages = Infinity;
    const fetchedIDs = new Set();
    const perPage = 12;
    async function fetchProducts(initial = false) {
      if (loading || page > maxPages) return;
      loading = true;
      const loader = document.createElement('div');
      loader.className = 'loader';
      loader.innerText = 'Loading products...';
      if (!initial) grid.appendChild(loader);
      try {
        const res = await fetch(`/wp-json/wp/v2/product?per_page=${perPage}&page=${page}`);
        if (!res.ok) {
          if (res.status === 400) maxPages = page - 1;
          throw new Error(`HTTP ${res.status}`);
        }
        maxPages = parseInt(res.headers.get('X-WP-TotalPages')) || maxPages;
        const totalProducts = parseInt(res.headers.get('X-WP-Total')) || 0;
        totalElem.innerText = `${totalProducts} products found`;
        const products = await res.json();
        if (!products.length) {
          loading = false;
          loader.remove();
          return;
        }
        products.forEach(p => {
          if (fetchedIDs.has(p.id)) return;
          fetchedIDs.add(p.id);
          const img = p.featured_media_url || 'https://via.placeholder.com/150';
          const card = document.createElement('div');
          card.className = 'product-card';
          card.innerHTML = `
            <img src="${img}" alt="${p.title.rendered}" />
            <span>${p.title.rendered}</span>
            <button class="add-to-cart-btn" data-id="${p.id}">Add to Cart</button>
          `;
          grid.appendChild(card);
        });

        // Add click event for add-to-cart buttons
        grid.querySelectorAll('.add-to-cart-btn').forEach(btn => {
          if (btn.dataset.bound) return;
          btn.dataset.bound = true;
          btn.addEventListener('click', async e => {
            e.preventDefault();
            const productId = btn.dataset.id;
            btn.disabled = true;
            btn.innerText = 'Adding...';
            try {
              const formData = new URLSearchParams();
              formData.append('product_id', productId);
              formData.append('quantity', 1);
              const response = await fetch('/?wc-ajax=add_to_cart', {
                method: 'POST',
                headers: {
                  'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: formData.toString()
              });
              if (response.ok) {
                btn.innerText = 'Added!';

                // 🔄 Refresh both WooCommerce Blocks and legacy mini carts
                try {
                  // Modern WooCommerce Blocks mini cart refresh
                  if (window.wp && wp.data && wp.data.dispatch) {
                    const cartStore = wp.data.dispatch('wc/store/cart');
                    if (cartStore && cartStore.invalidateResolutionForStore) {
                      cartStore.invalidateResolutionForStore('getCart');
                      console.log('Mini cart (block) refreshed');
                    }
                  }
                } catch (e) {
                  console.warn('WooCommerce Blocks cart refresh failed:', e);
                }

                // Legacy (classic) fragment refresh
                if (typeof jQuery !== 'undefined') {
                  jQuery(document.body).trigger('wc_fragment_refresh');
                } else {
                  const event = new Event('wc_fragment_refresh');
                  document.body.dispatchEvent(event);
                }

                // Reset button after delay
                setTimeout(() => {
                  btn.innerText = 'Add to Cart';
                  btn.disabled = false;
                }, 1500);
              } else {
                btn.innerText = 'Error';
                btn.disabled = false;
              }
            } catch (err) {
              console.error(err);
              btn.innerText = 'Error';
              btn.disabled = false;
            }
          });
        });
        page++;
        loading = false;
        loader.remove();
      } catch (err) {
        console.error(err);
        loader.remove();
        loading = false;
      }
    }

    // Load first batch
    fetchProducts(true);

    // Infinite scroll
    window.addEventListener('scroll', () => {
      if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 300) {
        fetchProducts();
      }
    });
  });
})();
/******/ })()
;
//# sourceMappingURL=view.js.map