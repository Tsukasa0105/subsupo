(function () {
	'use strict';

	// Hamburger menu toggle
	var menuBtn = document.getElementById( 'mobile-menu-btn' );
	var menu = document.getElementById( 'mobile-menu' );

	if ( menuBtn && menu ) {
		menuBtn.addEventListener( 'click', function () {
			menu.classList.toggle( 'hidden' );
		} );

		menu.querySelectorAll( 'a' ).forEach( function ( link ) {
			link.addEventListener( 'click', function () {
				menu.classList.add( 'hidden' );
			} );
		} );
	}

	// FAQ accordion
	document.querySelectorAll( '.js-faq-toggle' ).forEach( function ( button ) {
		button.addEventListener( 'click', function () {
			var panelId = button.getAttribute( 'aria-controls' );
			var panel = document.getElementById( panelId );
			var icon = button.querySelector( '.js-faq-icon' );

			if ( ! panel ) {
				return;
			}

			var isHidden = panel.classList.contains( 'hidden' );
			panel.classList.toggle( 'hidden' );
			button.setAttribute( 'aria-expanded', isHidden ? 'true' : 'false' );

			if ( icon ) {
				icon.classList.toggle( 'rotate-180' );
			}
		} );
	} );
} )();
