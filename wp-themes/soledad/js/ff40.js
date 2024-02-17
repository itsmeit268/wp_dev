jQuery( document ).ready( function ( $ ) {

	'use strict'
	var PENCI = PENCI || {}

	PENCI.owl_slider_40 = function () {

		var slider = jQuery( '.slider-40-wrapper' ).first()
		var mainwrap = slider.closest('.no-df-swiper')
		var relitemlist = slider.find( '.list-slider-creative' ).first()
		var currentslide = 0
		var goToSlide = function ( newslide ) {
			if ( slider.hasClass( 'loading' ) ) {
				return
			}
			var oldslide = currentslide
			currentslide = newslide
			if ( currentslide >= slider.find( '.item-bg-slider-40' ).length ) {
				currentslide = 0
			} else if ( currentslide < 0 ) {
				currentslide = slider.find( '.item-bg-slider-40' ).length - 1
			}
			if ( currentslide == oldslide ) {
				return
			}
			var duration = 0.8
			slider.addClass( 'loading' )
			var currentbg = jQuery( slider.find( '.item-bg-slider-40' ) [currentslide] )
			var oldbg = jQuery( slider.find( '.item-bg-slider-40' ) [oldslide] )
			var currentbgcontent = jQuery(
				slider.find( '.item-bg-slider-40-content' ) [currentslide] )
			var oldbgcontent = jQuery(
				slider.find( '.item-bg-slider-40-content' ) [oldslide] )
			var currentitem = jQuery(
				slider.find( '.item-slider-creative' ) [currentslide] )
			var olditem = jQuery( slider.find( '.item-slider-creative' ) [oldslide] )
			var currentitemcontent = currentitem.find( '.content-item-creative' )
			var olditemcontent = olditem.find( '.content-item-creative' )
			var currentitemimg = currentitem.find( '.img-container' )
			var olditemimg = olditem.find( '.img-container' )
			slider.find( '.content-item-creative' ).css( {
				'width': relitemlist.width(),
			} )
			slider.find( '.item-bg-slider-40-content' ).css( {
				'width': slider.width(),
			} )
			slider.find( '.nav-thumb-creative .owl-item' ).removeClass( 'current' )
			jQuery( slider.find( '.nav-thumb-creative .owl-item' ) [currentslide] ).
				addClass( 'current' )
			slider.find( '.item-bg-slider-40, .item-slider-creative' ).css( {
				'z-index': 5,
			} )
			currentbg.css( {
				'z-index': 10,
			} )
			currentitem.css( {
				'z-index': 10,
			} )
			oldbg.css( {
				'z-index': 8,
			} )
			olditem.css( {
				'z-index': 8,
			} )
			var resetCss = function () {
				currentbg.css( {
					'z-index': 12,
				} )
				currentitem.css( {
					'z-index': 12,
				} )
				slider.find( '.item-bg-slider-40-content, .content-item-creative' ).css( {
					'width': 'auto',
					'left': 0,
					'right': 0,
				} )
				slider.find( '.item-bg-slider-40, .item-slider-creative' ).css( {
					'width': 'auto',
					'left': 0,
					'right': 0,
				} )
				slider.removeClass( 'loading' )
			}
			slider.find( '.item-bg-slider-40' )
			if ( currentslide < oldslide ) {
				currentbg.css( {
					'width': '0',
					'left': 'auto',
					'right': 0,
				} )
				currentbgcontent.css( {
					'right': 0,
					'left': 'auto',
				} )
				currentitem.css( {
					'width': '0',
					'left': 0,
					'right': 'auto',
				} )
				currentitemcontent.css( {
					'right': 'auto',
					'left': 0,
				} )
			} else {
				currentbg.css( {
					'width': '0',
					'left': 0,
					'right': 'auto',
				} )
				currentbgcontent.css( {
					'right': 'auto',
					'left': 0,
				} )
				currentitem.css( {
					'width': '0',
					'left': 'auto',
					'right': 0,
				} )
				currentitemcontent.css( {
					'right': 0,
					'left': 'auto',
				} )
			}
			TweenMax.fromTo(
				currentbg,
				duration,
				{
					width: 0,
					force3D: true,
					throwProps: false,
					ease: Cubic.easeInOut,
				},
				{
					width: slider.width(),
				},
			)
			TweenMax.fromTo(
				currentbgcontent,
				duration,
				{
					scale: 1,
					force3D: true,
					throwProps: false,
					ease: Cubic.easeInOut,
				},
				{
					scale: 1.1,
				},
			)
			TweenMax.to(
				oldbgcontent,
				duration,
				{
					scale: 1,
					force3D: true,
					throwProps: false,
					ease: Cubic.easeInOut,
				},
			)
			TweenMax.fromTo(
				currentitem,
				duration,
				{
					width: 0,
					force3D: true,
					throwProps: false,
					ease: Cubic.easeInOut,
				},
				{
					width: relitemlist.width(),
					onComplete: function () {
						resetCss()
					},
				},
			)
			TweenMax.fromTo(
				currentitemimg,
				duration,
				{
					scale: 1,
					force3D: true,
					throwProps: false,
					ease: Cubic.easeIn,
				},
				{
					scale: 1.1,
				},
			)
			TweenMax.to(
				olditemimg,
				duration,
				{
					scale: 1,
					force3D: true,
					throwProps: false,
					ease: Cubic.easeOut,
				},
			)
		}
		TweenMax.set(
			jQuery( slider.find( '.img-container' ) [currentslide] ),
			{
				scale: 1.1,
			},
		)

		const swiper_thumb = new Swiper( '.nav-thumb-creative', {
			loop: true,
			slidesPerView: 'auto',
			slideActiveClass: 'active',
			watchSlidesProgress: true,
			on: {
				init: function () {
					$( '.nav-thumb-creative' ).addClass( 'penci-owl-loaded' )
				},
				afterInit: function () {
					$( '.nav-thumb-creative' ).addClass( 'penci-featured-loaded' )
				},
			},
			navigation: {
				nextEl: '.next-button',
				prevEl: '.prev-button',
			},
		} )

		slider.find( '.nav-thumb-creative .swiper-slide' ).each(
			function ( i ) {
				var btn = jQuery( this )
				btn.on( 'click', function () {
					swiper_thumb.slideTo( i )
					goToSlide( i )
					$( '.nav-thumb-creative .swiper-slide' ).removeClass( 'active' )
					btn.addClass( 'active' )
					return false
				} )
			},
		)
		slider.find( '.nav-slider-button' ).each(
			function () {
				var btn = jQuery( this ),
					prevs,
					nexts
				btn.on(
					'click',
					function () {
						var slideto
						if ( btn.hasClass( 'prev-button' ) ) {
							slideto = currentslide - 1
							goToSlide( slideto )
						} else {
							slideto = currentslide + 1
							goToSlide( slideto )
						}

						$( '.nav-thumb-creative .swiper-slide' ).removeClass( 'active' )

						var s = slideto + 1,
							s = s == 7 ? 1 : s,
							s = s == 0 ? 6 : s,
							a = $( '.nav-thumb-creative' ).find( '[data-index="' + s + '"]' ),
							b = a.closest( '.swiper-slide' ).addClass( 'active' )

						return false
					},
				)
			},
		)

		if ( mainwrap.attr('data-auto') === 'true' ) {
			
			var timeout = mainwrap.attr('data-autotime'),
				$mouse_een = true

			function slidetoslide() {
				var slideto
					slideto = currentslide + 1
					goToSlide( slideto )

					swiper_thumb.slideNext()

					$( '.nav-thumb-creative .swiper-slide' ).removeClass( 'active' )

					var s = slideto + 1,
						s = s == 7 ? 1 : s,
						s = s == 0 ? 6 : s,
						a = $( '.nav-thumb-creative' ).find( '[data-index="' + s + '"]' ),
						b = a.closest( '.swiper-slide' ).addClass( 'active' )
			}

			var intervalId = setInterval(slidetoslide, timeout);

			// Pause interval on mouse enter
			$('.slider-40-wrapper').mouseenter(function() {
				clearInterval(intervalId);
			});

			// Resume interval on mouse leave
			$('.slider-40-wrapper').mouseleave(function() {
				intervalId = setInterval(slidetoslide, timeout);
			});
		}

		
	}

	PENCI.owl_slider_40()

	$( 'body' ).on( 'penci_swiper_sliders', function () {
		PENCI.owl_slider_40()
	} )
} )