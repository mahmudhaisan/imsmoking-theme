(function () {
  var containers = document.querySelectorAll('[data-live-search-uid]');

  containers.forEach(function (container) {
    var uid = container.getAttribute('data-live-search-uid');
    var overlay = container.querySelector('#' + uid + '-overlay');
    var toggle = container.querySelector('.ls-toggle');
    var closeBtn = overlay.querySelector('.ls-close');
    var clearBtn = overlay.querySelector('.ls-clear');
    var input = overlay.querySelector('.ls-input');
    var resultsContainer = overlay.querySelector('.ls-results');

    function open() {
      overlay.classList.add('is-active');
      overlay.setAttribute('aria-hidden', 'false');
      if (toggle) toggle.setAttribute('aria-expanded', 'true');
      document.body.classList.add('ls-open');
      setTimeout(() => input && input.focus(), 120);
    }

    function close() {
      overlay.classList.remove('is-active', 'is-expanded');
      overlay.setAttribute('aria-hidden', 'true');
      if (toggle) toggle.setAttribute('aria-expanded', 'false');
      document.body.classList.remove('ls-open');
      toggle && toggle.focus();
    }

    toggle && toggle.addEventListener('click', e => {
      e.preventDefault();
      open();
    });

    closeBtn && closeBtn.addEventListener('click', e => {
      e.preventDefault();
      close();
    });

    clearBtn && clearBtn.addEventListener('click', e => {
      e.preventDefault();
      input.value = '';
      resultsContainer.innerHTML = '';
      overlay.classList.remove('is-expanded');
      input.focus();
    });

    // Escape key closes overlay
    document.addEventListener('keydown', e => {
      if ((e.key === 'Escape' || e.keyCode === 27) && overlay.classList.contains('is-active')) {
        close();
      }
    });

    // Typing expands overlay
    let controller;
    input.addEventListener('input', function () {
      const term = input.value.trim();

      if (term.length > 0) {
        overlay.classList.add('is-expanded');
      } else {
        overlay.classList.remove('is-expanded');
      }

      resultsContainer.innerHTML = '';
      if (!term) return;

      // Spinner
      const spinner = document.createElement('div');
      spinner.className = 'ls-spinner';
      resultsContainer.appendChild(spinner);

      if (controller) controller.abort();
      controller = new AbortController();

      fetch(`/wp-json/wp/v2/product?search=${encodeURIComponent(term)}&per_page=6&_embed`, { signal: controller.signal })
        .then(res => res.json())
        .then(products => {
          resultsContainer.innerHTML = '';

          if (!Array.isArray(products) || products.length === 0) {
            resultsContainer.innerHTML = '<p>No products found.</p>';
            return;
          }

          products.forEach(p => {
            const link = p.link;
            const title = p.title.rendered;
            const imgSrc = p._embedded?.['wp:featuredmedia']?.[0]?.source_url || '';
            const productEl = document.createElement('a');
            productEl.href = link;
            productEl.className = 'ls-product';
            productEl.innerHTML = `<img src="${imgSrc}" alt="${title}"><span>${title}</span>`;
            resultsContainer.appendChild(productEl);
          });

          // Add "View All Results"
          const viewAll = document.createElement('a');
          viewAll.className = 'ls-view-all';
          viewAll.href = `/?s=${encodeURIComponent(term)}&post_type=product`;
          viewAll.textContent = 'View All Results';
          resultsContainer.appendChild(viewAll);
        })
        .catch(err => {
          resultsContainer.innerHTML = '';
          if (err.name !== 'AbortError') console.error(err);
        });
    });
  });
})();
