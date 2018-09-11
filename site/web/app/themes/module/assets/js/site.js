//@codekit-prepend 'onScreen.js'
//@codekit-prepend 'localScroll.js'
////@codekit-prepend 'scrollTo.js'

jQuery(document).ready(function($) {

    // Home Page SVG Animation
    if ($('.js-home-pay').length != 0 ){
        var os = new OnScreen({debounce: 0});
        os.on('enter', '.js-home-pay', (element, event) => {
            var svg = document.getElementById('js-home-assembly');
            svg.classList.add('animate');
        });

        os.on('leave', '.js-home-pay', (element, event) => {
            var svg = document.getElementById('js-home-assembly');
            svg.classList.remove('animate');
        });
    }

    //Collapsable Navigation
    $('.js-nav-toggle').on('click touchstart',function (e) {
        e.preventDefault();
        $('.nav-primary__collapse').slideToggle();
    });

    // Home Page Scroll Down
    $('#js-scroll').localScroll({
        duration: 100,
        offset: 100
    });

    // Terms and Conditions Modal
    $(function() {
        $("#modal-terms").on("change", function() {
            if ($(this).is(":checked")) {
                $("body").addClass("modal-open");
            } else {
                $("body").removeClass("modal-open");
            }
        });

        $(".modal-fade-screen, .modal-close").on("click", function() {
            $(".modal-state:checked").prop("checked", false).change();
        });

        $(".modal-inner").on("click", function(e) {
            e.stopPropagation();
        });
    });


    // Model Tabs
    $('a[data-tab]').click(function(e) {
        e.preventDefault();
        var tabName = $(this).attr('data-tab');
        $('a[data-tab]').removeClass('active');
        $(this).addClass('active');

        var tabContent = $('[data-tab-content="' + tabName + '"]');
        $('[data-tab-content]').hide();
        tabContent.fadeIn();
    });

});


/* Header Logo Scaling */
jQuery(window).scroll(function($) {
    var head = jQuery('.js-nav-primary__home');
    if (jQuery(this).scrollTop() > 70) {
       head.addClass('js-active');
    } else {
       head.removeClass('js-active');
    }
});


/* Normalize Parallel Child Heights */
function normalizeHeights() {
  var maxHeight = [];
  jQuery('.normalizeWrapper').each( function() {
    // Determine max-height of each element number
    jQuery(this).find('.normalizeContainer').each( function() {
      var n = 0;
      jQuery(this).find('.normalizeElement').each( function() {
        n++;
        jQuery(this).css('height','');
        var height = this.clientHeight;
        if( height >= maxHeight[n] || !maxHeight[n] ) {
          maxHeight[n] = height;
        }
      });
    });
    // foreach Element Number, apply the maxHeight as the height
    var items = maxHeight.length - 1;
    while(items > 0) {
      jQuery(this).find(".normalizeElement-"+items).each( function() {
        jQuery(this).css('height',maxHeight[items]);
      });
      items--;
    }
  });
}
jQuery(document).ready( function() { normalizeHeights(); });
jQuery(window).resize( function() { normalizeHeights(); });
