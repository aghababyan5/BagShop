$(function () {
   $("#contacts").click(function () {
      $('html, body').animate({
         scrollTop: $(".contacts_sec").offset().top,
      }, 50, 'linear');
   });

   $('.angle-down').click(function () {
      $('html, body').animate({
         scrollTop: $(".newprods_sec2").offset().top,
      }, 30, 'linear');
   });

   $(window).scroll(function () {
      var $scroll = $(window).scrollTop() + ($(window).height() - 400);
      // console.log($(window).scrollTop());
      var $offset = $('.contacts_sec').offset().top;

      if ($scroll >= $offset) {
         $('#contacts').css('color', 'white');
         $('#contacts').mouseover(function () {
            $(this).css('color', 'white');
         });
         $('#contacts').mouseout(function () {
            $(this).css('color', 'white');
         });
      } else {
         $('#contacts').css({
            'color': '#A09C9C',
            'transition': '.2s'
         });
         $('#contacts').mouseover(function () {
            $(this).css('color', 'white');
         });
         $('#contacts').mouseout(function () {
            $(this).css('color', '#A09C9C');
         });
      }
   })
})