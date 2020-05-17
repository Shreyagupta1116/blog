/*  -----------------------------------------------------------------------------------------------
  Namespace
--------------------------------------------------------------------------------------------------- */
var chained = chained || {};
// global variables
var $body           = jQuery('body');
var $document       = jQuery(document);
var $html           = jQuery('html');

var $window         = jQuery(window);
var $container      = jQuery('.masonry .wrapper');

var windowWidth     = $window.width();
var windowHeight    = $window.height();
var orientation     = windowWidth > windowHeight ? 'portrait' : 'landscape';
var isRtl           = $body.hasClass('rtl');

function is_RTL(){
if (isRtl) {
   return true;
} else {
   return false;
}}


/*  -----------------------------------------------------------------------------------------------
  Masonry
--------------------------------------------------------------------------------------------------- */

chained.coverMasonry = {

    init: function() {
        $ = jQuery;
        this.onMasonry();

        window.addEventListener( 'resize', function() {
          this.onMasonry();
        }.bind( this ) );
    },

    onMasonry: function() {

    var msnry;
    var max_width_for_msnry = 640;

        var window_width = Math.max(
            document.documentElement.clientWidth,
            window.innerWidth || 0
        );

        /**
         * Only init masonry if the window is greater or equal 730px
         */
        if ( window_width >= max_width_for_msnry && !msnry ) {

            $container.imagesLoaded(function() {
                $container.masonry({
                    itemSelector: '.masonry-panel',
                    columnWidth: '.masonry-panel',
                    gutter: '.grid-gutter',
                    transitionDuration: 0,
                    isOriginLeft: !isRtl,
                });
            });

            var infinite_count = 1;
        
            $( document.body ).on( 'post-load', function () {

                infinite_count++;

                var $selector = $('#infinite-view-' + infinite_count);

                var $elements = $selector.find('.masonry-panel');

                $elements.imagesLoaded(function(){
                    // show elems now they're ready
                    $container.masonry( 'appended', $elements, true ); 
                });
            });
        } else if (window_width < max_width_for_msnry && msnry) {
            $container.masonry('destroy');
            msnry = null;
        }

        // Post Format Gallery Images Height
        // Get height from the square image

        var $post_format_gallery = $('.masonry .wrapper .masonry-panel__content .format-gallery');

        if ( $post_format_gallery.length > 0 ) {
            var $masonry_height = $('.masonry .wrapper .masonry-panel__content .post-design-default  .entry-image > .entry-image-wrapper img').height();
            var $gallery_height = $('.masonry .wrapper .masonry-panel__content .format-gallery ul.post_gallery_slider .post_gallery_item  img')
            
            $gallery_height.css({
                'height' : $masonry_height,
            });
        }

        $container.find('.post-design-newspaper').each(function(i, card) {
            if (i % 2 == 0) {
                $(card).addClass('entry-even');
            } else {
                $(card).removeClass('entry-even');
            }
        });
    }
};


/*  -----------------------------------------------------------------------------------------------
  Search
--------------------------------------------------------------------------------------------------- */
chained.coverSearch = {

    init: function() {
        $ = jQuery;
        this.onSearch();
    },

    onSearch: function() {

        var isOpen = false,
        $offcanvas_search = $('.offcanvas-search');

        function closeOverlay() {
            if (!isOpen) {
              return;
            }
            $body.removeClass('body-offcanvas-opened');
            $offcanvas_search.removeClass('is-visible');
            $offcanvas_search.find('input').blur();
            isOpen = false;
        }

        function escOffcanvas_search(e) {
            if (e.keyCode == 27) {
                closeOverlay();
            }
        }

        $('#offcanvas-search-open').on('click touchstart', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $body.addClass('body-offcanvas-opened');

            if (isOpen) {
              return;
            }

            var offset;

            if ($body.hasClass('rtl')) {
              offset = windowWidth
            } else {
              offset = -1 * windowWidth
            }

            setTimeout(function(){
                $offcanvas_search.find('input').focus();
            }, 500);

            $offcanvas_search.addClass('is-visible');
            $(this).addClass('pressed');

            $(document).on('keyup', escOffcanvas_search);

            isOpen = true;
        });

        // create function to hide the search overlay and bind it to the click event
        $('#offcanvas-search-close, .body__before').on('click touchstart', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $body.removeClass('body-offcanvas-opened');
            closeOverlay();
            $('.site-header .header-offcanvas_search_open').removeClass('pressed');
            $('.site-header #offcanvas-desktop-search-open').removeClass('pressed');
            // unbind overlay dismissal from escape key
            $(document).off('keyup', escOffcanvas_search);
        });
    }
};


/*  -----------------------------------------------------------------------------------------------
  Back To Top Button
--------------------------------------------------------------------------------------------------- */

chained.coverBacktoTop = {
    init: function() {
      $ = jQuery;
      this.onBacktoTop();
    },

    onBacktoTop: function() {

        var scrollLimit         = 300;
        var scroll_btn_wrapper  = $('.back-to-top');

        $window.scroll(function() {
            if ( $window.scrollTop() > scrollLimit ) {
                scroll_btn_wrapper.addClass('show');
            } else {
                scroll_btn_wrapper.removeClass('show');
            }
        });

        var btn =  $('a[href="#back_to_top"]');

        if ( btn ) {
          btn.on('click', function(e) {
              e.preventDefault();
              $('html, body').animate({scrollTop:0}, '500');
          });
        }
    }
};

/*  -----------------------------------------------------------------------------------------------
  Open & Close Offcanvas
--------------------------------------------------------------------------------------------------- */

chained.coverOpenOffcanvas = {
    init: function() {
      $ = jQuery;
      this.onOpenOffcanvas();
    },

    onOpenOffcanvas: function() {

        var offCanvas_navigation = $('.offcanvas-navigation');

        function closeOverlay() {
            if (!isOpen) {
              return;
            }
           
            $body.removeClass('body-offcanvas-opened');
            offCanvas_navigation.removeClass('is-visible');
            $('.site-header .header-offcanvas_navigation_open').removeClass('pressed');
            isOpen = false;
        }

        function escOffcanvas_navigation(e) {
            if (e.keyCode == 27) {
                closeOverlay();
            }
        }

        $(document).on('click touchstart', '#offcanvas-navigation-open', function(event) {
            $body.addClass('body-offcanvas-opened');
            offCanvas_navigation.addClass('is-visible');
            offCanvas_navigation.attr('tabindex', 1);

            $(document).on('keyup', escOffcanvas_navigation);

            isOpen = true;
        });

        $('.offcanvas-navigation .offcanvas-content .offcanvas-navigation-wrapper .nav--main .toggle').on('click touchstart focus', function (e) {
            e.preventDefault();

            let thisEl = jQuery(this),
                parentEl = thisEl.parent()

            if (parentEl.hasClass('open')) {
                parentEl.toggleClass('open').next().slideToggle()
            } else {
                parentEl.toggleClass('open', false).next().slideToggle()
                parentEl.addClass( 'open' )
            }
        });

        $('#offcanvas-navigation-close, .body__before').on('click touchstart', function(e) {
            e.preventDefault();

            $body.removeClass('body-offcanvas-opened');
            offCanvas_navigation.removeClass('is-visible');
            $('.site-header .header-offcanvas_navigation_open').removeClass('pressed');
             $(document).off('keyup', escOffcanvas_navigation);
        });
    }
};


/*  -----------------------------------------------------------------------------------------------
  Sticky Header
--------------------------------------------------------------------------------------------------- */

chained.coverStickyHeader = {
    init: function() {
      $ = jQuery;
      this.onStickyHeader();
    },

    onStickyHeader: function() {

        $window.scroll(function() {

            if ( $(this).scrollTop() > 1 ) {  
                $('.site-header').addClass("fixed");
            }
            else {
                $('.site-header').removeClass("fixed");
            }

        });
       
    }
};


/*  -----------------------------------------------------------------------------------------------
  Post Type Gallery - Slider
--------------------------------------------------------------------------------------------------- */

chained.coverPostGallery = {
    init: function() {
      $ = jQuery;
      this.onPostGallery();
    },

    onPostGallery: function() {

        var $post_format_gallery_loop   = $('.masonry .wrapper .masonry-panel__content .entry-card.format-gallery .post_gallery_slider')
        var $post_format_gallery_single = $('.single-content .single-content-wrapper .single-content-inner .post .entry-gallery .post_gallery_slider')
        var $widget_gallery             = $('.widget-area .widget.widget_media_gallery .gallery');

        if ( $post_format_gallery_loop.length > 0 || $post_format_gallery_single.length > 0 ) {

            $('.post_gallery_slider').slick({
                dots: false,
                arrows: false,
                infinite: true,
                cssEase: 'ease-out',
                slidesToShow: 1,
                autoplay: true,
                autoplaySpeed: 3100, // options future
                lazyLoad: 'ondemand',
                rtl: is_RTL(),
            });

            $('#gallery_prev_button').on('click', function(){ 
                $(this).parent().parent().find('.slick-slider').slick('slickPrev');
            });

            $('#gallery_next_button').on('click',function(){
                $(this).parent().parent().find('.slick-slider').slick('slickNext');
            });
        }
    }
};

/*  -----------------------------------------------------------------------------------------------
    Post Format Link
--------------------------------------------------------------------------------------------------- */

chained.coverPostFormatLink = {
    init: function() {
      $ = jQuery;
      this.onPostFormatLink();
    },

    onPostFormatLink: function() {
        // Post Format Link;
        $link_on_title = $('.masonry .wrapper .masonry-panel__content article.format-link .entry-header .entry-title');
        $link_on_image = $('.masonry .wrapper .masonry-panel__content article.format-link .entry-image');

        // post format link external add target blank
        $($link_on_title, $link_on_image).filter(function() {
           return this.hostname && this.hostname !== location.hostname;
        }).attr("target", '_blank');
    }
};


/*  -----------------------------------------------------------------------------------------------
    Related Posts Slider Init
--------------------------------------------------------------------------------------------------- */

chained.coverRelatedPostSlider = {
    init: function() {
      $ = jQuery;
      this.onRelatedPostSlider();
    },

    onRelatedPostSlider: function() {

        $related_posts = $('.related-posts-wrapper');

        if ( $related_posts.children().length >= 3 ) {
            $('.related-posts-wrapper').slick({
                dots: false,
                arrows: false,
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                cssEase: 'ease-out',
                lazyLoad: 'ondemand',
                rtl: is_RTL(),
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: false,
                            arrows: false,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            dots: false,
                            arrows: false,
                        }
                    },
                    {
                    breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            dots: false,
                            arrows: false,
                        }
                    }
                ]
            });

            $('.related-posts #related_prev_button').on('click', function(){ 
                $(this).parent().parent().parent().find('.slick-slider').slick('slickPrev');
            });

            $('.related-posts #related_next_button').on('click',function(){
                $(this).parent().parent().parent().find('.slick-slider').slick('slickNext');
            });
        }
    }
};


/*  -----------------------------------------------------------------------------------------------
    Gallery Lightbox
--------------------------------------------------------------------------------------------------- */


chained.coverGalleryLightbox = {
    init: function() {
      $ = jQuery;
      this.onGalleryLightbox();
    },

    onGalleryLightbox: function() {

        if ( $body.hasClass('single-post') || $body.hasClass('page') ) {

            var options = {
                overlay:        true,
                spinner:        false,
                nav:            true,
                captions:       false,
                alertError:     false,
                alertErrorMessage:false,
            }

            // Possible available galleries
            var $gutenburg_gallery_active   = $('.wp-block-gallery');
            var $classic_gallery_active     = $('.gallery');
            var $widget_gallery_active      = $('.widget_media_gallery');

            if ( $gutenburg_gallery_active.length > 0 ) {
                // For Gutenberg Gallery
                $gutenburg_gallery_active.each(function(i) {

                    // var $gallery_image = $(this).find('a');
                    var lightbox_gutenberg = $(this).find('a').simpleLightbox(options);
                    
                });
            }

            if ( $classic_gallery_active.length > 0 ) {
                 // For Classic Editor Gallery
                $classic_gallery_active.each(function(i) {

                    // var $gallery_image = $(this).find('a');
                    var lightbox_default_gallery = $(this).find('a').simpleLightbox(options);
                    
                });
            }

            if ( $widget_gallery_active.length > 0 ) {
                // For Widget Gallery 
                $widget_gallery_active.each(function(i) {

                    // var $gallery_widget = $(this).find('a');
                    var lightbox_widget_gallery = $(this).find('a').simpleLightbox(options);
                    
                });
            }
        }
       
    }
};



/*  -----------------------------------------------------------------------------------------------
    Gallery Lightbox
--------------------------------------------------------------------------------------------------- */


chained.coverNavigationFocus = {
    init: function() {
      $ = jQuery;
      this.onNavigationFocus();
    },

    onNavigationFocus: function() {

        container = document.getElementsByClassName( 'header-left' )[0];
        if ( ! container ) {
            return;
        }

        menu = document.getElementById( 'site-navigation' );

        // Get all the link elements within the primary menu.

        links = menu.getElementsByTagName( 'a' );

        // Each time a menu link is focused or blurred, toggle focus.
        for ( i = 0, len = links.length; i < len; i++ ) {
            links[i].addEventListener( 'focus', toggleFocus, true );
            links[i].addEventListener( 'blur', toggleFocus, true );
        }

        /**
         * Sets or removes .focus class on an element.
         */
        function toggleFocus() {
            var self = this;

            // Move up through the ancestors of the current link until we hit .nav-menu.
            while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

                // On li elements toggle the class .focus.
                if ( 'li' === self.tagName.toLowerCase() ) {

                    if ( -1 !== self.className.indexOf( 'focus' ) ) {
                        self.className = self.className.replace( ' focus', '' );
                    } else {
                        self.className += ' focus';
                    }
                }
                self = self.parentElement;
            }
        }
       
    }   
};

      
       
/* -----------------------------------------------------------------------------------------------
    Init functions
-------------------------------------------------------------------------------------------------*/

(function($) {
  
    $(document).ready(function() {
        // Init the main function
        chained.coverMasonry.init();
        chained.coverSearch.init();
        chained.coverBacktoTop.init();
        chained.coverOpenOffcanvas.init();
        chained.coverStickyHeader.init();
        chained.coverPostGallery.init();
        chained.coverPostFormatLink.init();
        chained.coverRelatedPostSlider.init();
        chained.coverGalleryLightbox.init();
        chained.coverNavigationFocus.init();
    });

})(jQuery);