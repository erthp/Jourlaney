(function($) {
    "use strict";
  
    $("body").on("input propertychange", ".floating-label-form-group", function(e) {
      $(this).toggleClass("floating-label-form-group-with-value", !!$(e.target).val());
    }).on("focus", ".floating-label-form-group", function() {
      $(this).addClass("floating-label-form-group-with-focus");
    }).on("blur", ".floating-label-form-group", function() {
      $(this).removeClass("floating-label-form-group-with-focus");
    });

    var MQL = 992;
  
    if ($(window).width() > MQL) {
      var headerHeight = $('#่jourlaNav').height();
      $(window).on('scroll', {
          previousTop: 0
        },
        function() {
          var currentTop = $(window).scrollTop();
          if (currentTop < this.previousTop) {
            if (currentTop > 0 && $('#jourlaNav').hasClass('is-fixed')) {
              $('#jourlaNav').addClass('is-visible');
            } else {
              $('#jourlaNav').removeClass('is-visible is-fixed');
            }
          } else if (currentTop > this.previousTop) {
            $('#jourlaNav').removeClass('is-visible');
            if (currentTop > headerHeight && !$('#jourlaNav').hasClass('is-fixed')) $('#jourlaNav').addClass('is-fixed');
          }
          this.previousTop = currentTop;
        });
    }
})(jQuery);