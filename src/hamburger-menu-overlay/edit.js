import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, SelectControl } from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import { useState } from '@wordpress/element';
import './editor.scss';

export default function Edit( { attributes, setAttributes } ) {
	const { menu } = attributes;
	const blockProps = useBlockProps();
	const [ isOpen, setIsOpen ] = useState( false );

	// Fetch WP menus
	const menus = useSelect(
		( select ) =>
			select( 'core' ).getEntityRecords( 'taxonomy', 'nav_menu' ),
		[]
	);

	return (
		<div { ...blockProps }>
			<InspectorControls>
				<PanelBody title="Menu Settings">
					<SelectControl
						label="Select Menu"
						value={ menu }
						options={ ( menus || [] ).map( ( m ) => ( {
							label: m.name,
							value: m.id,
						} ) ) }
						onChange={ ( value ) =>
							setAttributes( { menu: value } )
						}
					/>
				</PanelBody>
			</InspectorControls>

			{/* Hamburger Icon */}
			<div className="hamburger-menu-container">
				<button
					className={ `hamburger-icon ${
						isOpen ? 'is-active' : ''
					}` }
					onClick={ () => setIsOpen( ! isOpen ) }
					aria-label="Toggle menu"
				>
					<div className="bar"></div>
					<div className="bar"></div>
					<div className="bar"></div>
				</button>
			</div>

			{/* Overlay */}
			<div
				className={ `hamburger-menu-overlay ${
					isOpen ? 'is-active' : ''
				}` }
			>
				{/* Close Button */}
				<button
					className="close-menu-button"
					onClick={ () => setIsOpen( false ) }
					aria-label="Close menu"
				>
					&times;
				</button>

				<nav className="hamburger-menu-nav">
					{ menu ? (
						<p>Menu will render on frontend</p>
					) : (
						<p>Select a menu</p>
					) }
				</nav>
			</div>
		</div>
	);
}
