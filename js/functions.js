/**
 * Theme functions file
 *
 * Contains handlers for navigation, accessibility, header sizing
 * footer widgets and Featured Content slider
 *
 */

 var zap = {};
 var $isotope = '';

jQuery(window).load(function() {
 	if ( jQuery('body.blog #content, body.search #content, body.archive #content').length ) {
		$isotope = jQuery('body.blog #content, body.search #content, body.archive #content').isotope({
			itemSelector: 'article',
			layoutMode: 'masonry'
		});
	};
});

jQuery(document).ready(function($) {
	if ( jQuery('.frontpage-slider-wrapper').length ) {
		var bxMainSlider = jQuery('.frontpage-slider-wrapper').bxSlider({
			mode: 'fade',
			controls: false
		});
	};

	jQuery('.header-share-icons .header-share').click(function() {
		jQuery(this).parent().toggleClass('active');
	});

	if ( jQuery(window).width() > 1140 ) {
		if ( jQuery('.wide-container').length ) {
			jQuery(".wide-container").css({"width": jQuery(window).width()+"px", "left": "-"+parseInt(jQuery(".wide-container").offset().left+1)+"px", "position": "relative"});
		};

		if ( jQuery('.bx-wrapper').length ) {
			jQuery(".bx-wrapper").css({"width": jQuery(window).width()+"px", "left": "-"+parseInt(jQuery(".bx-wrapper").offset().left+1)+"px", "position": "relative"});
			bxMainSlider.redrawSlider();
		};
	} else {
		if ( jQuery('.wide-container').length ) {
			jQuery(".wide-container").css({"width": "", "left": ""});
		};

		if ( jQuery('.wide-container').length ) {
			jQuery(".bx-wrapper").css({"width": "", "left": ""});
		};
	}

	if ( jQuery('#testimonial-container').length ) {
		jQuery('#testimonial-container .testimonial-item').css({'width': jQuery('.testimonial-wrapper').width()+'px'});
	};

	if ( jQuery('#testimonial-container').length && jQuery('#testimonial-container').children().length > 1 ) {
		jQuery('.testimonial-wrapper').on("jcarousel:scroll", function(event, carousel) {
			jQuery("#testimonial-container").parent().hide().fadeIn(700);
		}).jcarousel({
			wrap: "circular",
			animation: {
				duration: 0
			}
		}).jcarouselAutoscroll({
			interval: 5000,
			target: '+=1',
			autostart: true
		});

		jQuery('.testimonial-pagination').on('jcarouselpagination:create', function(carousel) {
			jQuery(carousel.target).find('a:first-child').addClass('active');
		}).on('jcarouselpagination:active', 'a', function() {
			jQuery(this).addClass('active');
		}).on('jcarouselpagination:inactive', 'a', function() {
			jQuery(this).removeClass('active');
		}).jcarouselPagination({
			'carousel': jQuery('.testimonial-wrapper'),
			'perPage': 1
		});
	}

	jQuery(window).resize(function() {
		if ( jQuery('#testimonial-container').length ) {
			jQuery('#testimonial-container .testimonial-item').css({'width': jQuery('.testimonial-wrapper').width()+'px'});
		};

		if ( jQuery(window).width() > 1140 ) {
			if ( jQuery('.wide-container').length ) {
				jQuery(".wide-container").css('left', '0px');
				jQuery(".wide-container").css({"width": jQuery(window).width()+"px", "left": "-"+parseInt(jQuery(".wide-container").offset().left+1)+"px", "position": "relative"});
			};

			if ( jQuery('.bx-wrapper').length ) {
				jQuery(".bx-wrapper").css('left', '0px');
				jQuery(".bx-wrapper").css({"width": jQuery(window).width()+"px", "left": "-"+parseInt(jQuery(".bx-wrapper").offset().left+1)+"px", "position": "relative"});
				bxMainSlider.redrawSlider();
			};
		} else {
			if ( jQuery('.wide-container').length ) {
				jQuery(".wide-container").css({"width": "", "left": ""});
			};

			if ( jQuery('.bx-wrapper').length ) {
				jQuery(".bx-wrapper").css({"width": "", "left": ""});
			};
		}
	});

	jQuery(document).on('click', '.single-post-like', function() {
		if ( jQuery(this).hasClass('icon-heart-empty') ) {
			jQuery(this).removeClass('icon-heart-empty');
			jQuery(this).addClass('icon-heart-1');
		}
	});

	jQuery(document).on('click', '.zap-checkbox', function() {
		jQuery(this).parent().find('input[type=checkbox]').attr('checked');
		jQuery(this).toggleClass('checked');
	});

	jQuery('.before-after-separator').draggable({
		containment: "parent",
		axis: "x",
		drag: function( event, ui ) {
			var separator_left = 0;
			if ( ui.position.left > 1 ) {
				var content_width = jQuery(this).parent().width();
				separator_left = ui.position.left/content_width*100;
			};
			var before_picture = jQuery(this).parent().find('.before-inner');
			var after_picture = jQuery(this).parent().find('.after-inner');

			before_picture.css('width', separator_left+'%');
			after_picture.css('width', 100-separator_left+'%');
		}
	});

	jQuery(document).on('click', '.before-after-side-image:not(.active)', function() {
		var row_index = jQuery(this).index()+1;
		jQuery(this).parent().parent().find('.before-after-row').removeClass('active');
		jQuery(this).parent().parent().find('.before-after-row:nth-child('+row_index+')').addClass('active');

		jQuery(this).parent().find('.before-after-side-image').removeClass('active');
		jQuery(this).addClass('active');;
	});
});

( function( $ ) {
	var body    = $( 'body' ),
		_window = $( window );

	$('.scroll-to-top').click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});

	if ( jQuery('.container[data-background]').length ) {
		jQuery('.container[data-background]').each(function() {
			jQuery(this).css('background-color', jQuery(this).attr('data-background'));
		});
	};

	if ( jQuery('.container[data-image]').length ) {
		jQuery('.container[data-image]').each(function() {
			jQuery(this).css({
				'background': 'url('+jQuery(this).attr('data-image')+') no-repeat',
				'background-size': '100% 100%'
			});
		});
	};

	if ( jQuery('[data-color]').length ) {
		jQuery('[data-color]').each(function() {
			jQuery(this).css('color', jQuery(this).attr('data-color'));
		});
	};

	if ( jQuery('[data-topmargin]').length ) {
		jQuery('[data-topmargin]').each(function() {
			jQuery(this).css('margin-top', jQuery(this).attr('data-topmargin'));
		});
	};

	if ( jQuery('[data-bottommargin]').length ) {
		jQuery('[data-bottommargin]').each(function() {
			jQuery(this).css('margin-bottom', jQuery(this).attr('data-bottommargin'));
		});
	};

	if ( jQuery('.client-list-row').length ) {
		jQuery('.client-list-row').each(function() {
			jQuery(this).css('line-height', jQuery(this).height()+'px');
		});
	};

	jQuery(document).scroll(function() {
		if ( jQuery(document).scrollTop() >= 200 ) {
			jQuery('.site-header').addClass('scrolled');
		} else {
			jQuery('.site-header').removeClass('scrolled');
		}
	});

	jQuery('.sub-menu li.menu-item-has-children').hover(function() {
		jQuery(this).find('.sub-menu').css('left', jQuery(this).outerWidth()+1+'px');
	});

	jQuery('.nav-menu .menu-item-has-children.depth-2').click(function(e) {
		e.preventDefault();
		jQuery(this).find('.sub-menu').slideToggle();
		jQuery(this).toggleClass('active');
	});

	jQuery('.nav-menu .menu-item-has-children.depth-2 ul li a').click(function() {
		window.location = jQuery(this).attr('href');
	});

	// Enable menu toggle for small screens.
	( function() {
		var nav = $( '#primary-navigation' ), button, menu;
		if ( ! nav ) {
			return;
		}

		button = nav.find( '.menu-toggle' );
		if ( ! button ) {
			return;
		}

		// Hide button if menu is missing or empty.
		menu = nav.find( '.nav-menu' );
		if ( ! menu || ! menu.children().length ) {
			button.hide();
			return;
		}

		$( '.menu-toggle' ).on( 'click.zap', function() {
			nav.toggleClass( 'toggled-on' );
		} );
	} )();

	/*
	 * Makes "skip to content" link work correctly in IE9 and Chrome for better
	 * accessibility.
	 *
	 * @link http://www.nczonline.net/blog/2013/01/15/fixing-skip-to-content-links/
	 */
	_window.on( 'hashchange.zap', function() {
		var element = document.getElementById( location.hash.substring( 1 ) );

		if ( element ) {
			if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) {
				element.tabIndex = -1;
			}

			element.focus();

			// Repositions the window on jump-to-anchor to account for header height.
			window.scrollBy( 0, -80 );
		}
	} );

	$( function() {

		/*
		 * Fixed header for large screen.
		 * If the header becomes more than 48px tall, unfix the header.
		 *
		 * The callback on the scroll event is only added if there is a header
		 * image and we are not on mobile.
		 */
		if ( _window.width() > 781 ) {
			var mastheadHeight = $( '#masthead' ).height(),
				toolbarOffset, mastheadOffset;

			if ( mastheadHeight > 48 ) {
				body.removeClass( 'masthead-fixed' );
			}

			if ( body.is( '.header-image' ) ) {
				toolbarOffset  = body.is( '.admin-bar' ) ? $( '#wpadminbar' ).height() : 0;
				mastheadOffset = $( '#masthead' ).offset().top - toolbarOffset;

				_window.on( 'scroll.zap', function() {
					if ( ( window.scrollY > mastheadOffset ) && ( mastheadHeight < 49 ) ) {
						body.addClass( 'masthead-fixed' );
					} else {
						body.removeClass( 'masthead-fixed' );
					}
				} );
			}
		}

		// Focus styles for menus.
		$( '.primary-navigation, .secondary-navigation' ).find( 'a' ).on( 'focus.zap blur.zap', function() {
			$( this ).parents().toggleClass( 'focus' );
		} );
	} );
} )( jQuery );

function zap_checkbox( checkbox ) {
	checkbox.parent().append('<span class="zap-checkbox"></span>');
}

/*------------------------------------------------------------
 * FUNCTION: Scroll Page Back to Top
 * Used for ajax navigation scroll position reset
 *------------------------------------------------------------*/

function scrollPageToTop(){
	// Height hack for mobile/tablet
	jQuery('body').css('height', 'auto');
	jQuery("html, body").animate({ scrollTop: 0 }, "slow");

	jQuery('body').css('height', '');
}

(function() {

	// detect if IE : from http://stackoverflow.com/a/16657946		
	var ie = (function(){
		var undef,rv = -1; // Return value assumes failure.
		var ua = window.navigator.userAgent;
		var msie = ua.indexOf('MSIE ');
		var trident = ua.indexOf('Trident/');

		if (msie > 0) {
			// IE 10 or older => return version number
			rv = parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
		} else if (trident > 0) {
			// IE 11 (or newer) => return version number
			var rvNum = ua.indexOf('rv:');
			rv = parseInt(ua.substring(rvNum + 3, ua.indexOf('.', rvNum)), 10);
		}

		return ((rv > -1) ? rv : undef);
	}());


	// disable/enable scroll (mousewheel and keys) from http://stackoverflow.com/a/4770179					
	// left: 37, up: 38, right: 39, down: 40,
	// spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
	var keys = [37, 38, 39, 40], wheelIter = 0;

	function preventDefault(e) {
		e = e || window.event;
		if (e.preventDefault)
		e.preventDefault();
		e.returnValue = false;  
	}

	function keydown(e) {
		for (var i = keys.length; i--;) {
			if (e.keyCode === keys[i]) {
				preventDefault(e);
				return;
			}
		}
	}

	function touchmove(e) {
		preventDefault(e);
	}

	function wheel(e) {
	}

	function disable_scroll() {
		window.onmousewheel = document.onmousewheel = wheel;
		document.onkeydown = keydown;
		document.body.ontouchmove = touchmove;
	}

	function enable_scroll() {
		window.onmousewheel = document.onmousewheel = document.onkeydown = document.body.ontouchmove = null;  
	}

	var docElem = window.document.documentElement,
		scrollVal,
		isRevealed, 
		noscroll, 
		isAnimating;

	function scrollY() {
		return window.pageYOffset || docElem.scrollTop;
	}

	function scrollPage() {
		scrollVal = scrollY();
		
		if( noscroll && !ie ) {
			if( scrollVal < 0 ) return false;
			// keep it that way
			window.scrollTo( 0, 0 );
		}

		if( jQuery('body').hasClass( 'notrans' ) ) {
			jQuery('body').removeClass( 'notrans' );
			return false;
		}

		if( isAnimating ) {
			return false;
		}
		
		if( scrollVal <= 0 && isRevealed ) {
			toggle(0);
		}
		else if( scrollVal > 0 && !isRevealed ){
			toggle(1);
		}
	}

	function toggle( reveal ) {
		isAnimating = true;
		
		if( reveal ) {
			jQuery('body').addClass( 'modify' );
		}
		else {
			noscroll = true;
			disable_scroll();
			jQuery('body').removeClass( 'modify' );
		}

		// simulating the end of the transition:
		setTimeout( function() {
			isRevealed = !isRevealed;
			isAnimating = false;
			if( reveal ) {
				noscroll = false;
				enable_scroll();
			}
		}, 600 );
	}

	if( !/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {

		// refreshing the page...
		var pageScroll = scrollY();
		noscroll = pageScroll === 0;

		disable_scroll();

		if( pageScroll ) {
			isRevealed = true;
			jQuery('body').addClass( 'notrans' );
			jQuery('body').addClass( 'modify' );
		}

		
	} else if ( jQuery('body').hasClass('single-post') && /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		jQuery('body').addClass( 'notrans' );
		jQuery('body').addClass( 'modify' );
	}
	
})();
