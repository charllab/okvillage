jQuery(function () {

    // https://stackoverflow.com/questions/30293784/smooth-scroll-to-anchor-after-loading-new-page
    // your current click function
    jQuery('.scroll').on('click', function(e) {
        e.preventDefault();
        jQuery('html, body').animate({
            scrollTop: jQuery(jQuery(this).attr('href')).offset().top + 'px'
        }, 1000, 'swing');
    });
    // *only* if we have anchor on the url
    if(window.location.hash) {
        // smooth scroll to the anchor id
        jQuery('html, body').animate({
            scrollTop: jQuery(window.location.hash).offset().top + 'px'
        }, 1000, 'swing');
    }

    paddingTop();

    // padding top
    jQuery(window).on('load', function(){
        paddingTop();
    });

    jQuery(window).on('resize', function(){
        paddingTop();
    });

    function paddingTop() {
        var menuHeight = jQuery('header').outerHeight();
        jQuery('main').css('padding-top', menuHeight + 'px');
        return this;
    };

    // removing page flicker on js
    // https://stackoverflow.com/questions/11966137/removing-the-page-flicker-when-loading-javascript-css
    jQuery("body").css({visibility:'visible'});


    // BIG Slide
    var menuLink = jQuery('.menu-link').bigSlide({
        side: 'right',
        menuWidth: '13rem',
        easyClose: true,
        afterOpen: function () {
            jQuery('body').toggleClass('noscroll');
        },
        afterClose: function () {
            jQuery('body').toggleClass('noscroll');
        }
    });

    AOS.init();

    // enable bootstrap tooltips
    jQuery('[data-toggle="tooltip"]').tooltip()

    // prevent scroll
    jQuery('#mobileBurger').on('click', function () {
        jQuery('body').toggleClass('noscroll');
        jQuery('#mobileOverlay').toggleClass('show');
    });

    // ie11 object-fit fallback
    if (!Modernizr.objectfit || !Modernizr.smil) {
        $('.js-img-obj-fit__container').each(function () {
            var $container = $(this),
                imgUrl = $container.find('img').prop('src');
            if (imgUrl) {
                $container
                    .css('backgroundImage', 'url(' + imgUrl + ')')
                    .addClass('compat-object-fit');
            }
        });
    }

    // Remove WP Block element iframe classes
    if (jQuery('.wp-block-embed-youtube').length) {
        jQuery('.wp-block-embed-youtube').removeClass().addClass('embed-responsive-item');
    }

    // Scrolling anchors
    jQuery('.scrollable-anchor').on('click', function (e) {
        e.preventDefault();

        jQuery('html,body').animate({
            scrollTop: jQuery(this.hash).offset().top
        }, 1000);
    });
});

var trackEvent = function (name, options) {
    trackGA(name, options);
    trackPixel(name, options);
};

var trackGA = function (name, options) {
    if (typeof gtag !== 'undefined') {
        gtag('event', name, {
            'event_category': options.category,
            'event_label': options.label,
            'value': options.value || 0
        });
    }
};

var trackPixel = function (name, options) {
    if (typeof gtag !== 'undefined') {
        fbq('track', 'Lead', {
            'event_category': options.category,
            'event_action': name,
            'value': options.value || 0,
            'currency': 'CAD'
        });
    }
};

var targetBlankExternalLinks = function () {
    var internalLinkRegex = new RegExp('^((((http:\\/\\/|https:\\/\\/)(www\\.)?)?'
        + window.location.hostname
        + ')|(localhost:\\d{4})|(\\/.*))(\\/.*)?$', '');

    jQuery('a').filter(function () {
        var href = jQuery(this).attr('href');
        return !internalLinkRegex.test(href);
    })
        .each(function () {
            jQuery(this).attr('target', '_blank');
        });
};

// https://stackoverflow.com/questions/30293784/smooth-scroll-to-anchor-after-loading-new-page
// to top right away
if ( window.location.hash ) scroll(0,0);
// void some browsers issue
setTimeout( function() { scroll(0,0); }, 1);