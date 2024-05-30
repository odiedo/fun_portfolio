$(document).ready(function() {
    $(window).scroll(function() {
      $('.section').each(function() {
        var position = $(this).offset().top;
        var scrollPosition = $(window).scrollTop();
        if (position <= scrollPosition + 450) {
          $(this).addClass('animate');
        }
      });
    });
});
  

