jQuery(function () {

    // padding top
    var menuHeight = jQuery('header').outerHeight();
    jQuery('main').css('padding-top', menuHeight + 'px');
    jQuery(window).on('resize', function(){
        var menuHeight = jQuery('header').outerHeight();
        jQuery('main').css('padding-top', menuHeight + 'px');
    });

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