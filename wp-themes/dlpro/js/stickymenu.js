/**
 * Sticky when scroll menu
 * Copyright (c) 2020 Gian MR
 * Gian MR Theme Custom Javascript
 *
 * @package  Dlpro = Null by PHPCORE
 */

function stickyElement(e) {
  
	var header = document.querySelector( '.site-header' );
	var navbar = document.querySelector( '.top-header' );

	if ( header !== null && navbar !== null ) {
		var headerHeight = getComputedStyle( header ).height.split( 'px' )[0];
		var scrollValue = window.scrollY;
		if ( scrollValue > headerHeight ){
			navbar.classList.add( 'sticky-menu' );
		} else if (scrollValue < headerHeight){
			navbar.classList.remove( 'sticky-menu' );
		}
	}
}

window.addEventListener( 'scroll', stickyElement );