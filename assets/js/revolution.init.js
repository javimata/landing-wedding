/******************************************
    -   PREPARE PLACEHOLDER FOR SLIDER  -
******************************************/

jQuery(function($) {


    $("#banner-main").show().revolution({
        sliderType: "standard",
        sliderLayout: "fullwidth",
        scrollbarDrag: "true",
        dottedOverlay: "none",
        delay: 9000,
        navigation: {
            keyboardNavigation: "on",
            keyboard_direction: "horizontal",
            mouseScrollNavigation: "off",
            mouseScrollReverse: "default",
            onHoverStop: "on",
            arrows: {
                style: "hesperiden",
                enable: false,
                hide_onmobile: false,
                hide_onleave: false,
                tmp: '',
                left: {
                    h_align: "left",
                    v_align: "center",
                    h_offset: 20,
                    v_offset: 0
                },
                right: {
                    h_align: "right",
                    v_align: "center",
                    h_offset: 20,
                    v_offset: 0
                }
            },
            bullets: {
                enable: true,
                style: 'hermes',
                tmp: '',
                direction: 'horizontal',
                rtl: false,
                container: 'slider',
                h_align: 'center',
                v_align: 'bottom',
                h_offset: 0,
                v_offset: 20,
                space: 5,
                hide_onleave: false,
                hide_onmobile: false,
                hide_under: 0,
                hide_over: 9999,
                hide_delay: 200,
                hide_delay_mobile: 1200
            },
            touch: {

                touchenabled: 'on',
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: 'horizontal',
                drag_block_vertical: true

            }
        },
        parallax: {
            type: 'mouse+scroll',
            origo: 'slidercenter',
            speed: 400,
            levels: [5, 10, 15, 20, 25, 30, 35, 40,
                45, 46, 47, 48, 49, 50, 51, 55],
            disable_onmobile: 'on'
        },
        gridwidth: 1120,
        gridheight: 600,
        lazyType: "none",
        shadow: 0,
        spinner: "spinner4",
        stopLoop: "off",
        stopAfterLoops: -1,
        stopAtSlide: -1,
        shuffle: "on",
        autoHeight: "off",
        disableProgressBar: "on",
        hideThumbsOnMobile: "off",
        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        debugMode: false,
        fallbacks: {
            simplifyAll: "off",
            nextSlideOnWindowFocus: "off",
            disableFocusListener: false,
        },
        visibilityLevels: [1120, 1024, 778, 480],
        responsiveLevels: [1120, 1024, 778, 480],
        gridwidth: [1120, 1024, 778, 480],
        gridheight: [600, 550, 550, 520]
    });


});