window.addEventListener('load', () => {
   var footer = document.querySelector('.footer');
   var main = document.querySelector('.main');

   function setFooterPosition() {
      var windowHeight = window.innerHeight;
      var mainHeight = main.offsetHeight;
      var footerHeight = footer.offsetHeight;
      var mainTop = main.offsetTop;
      if (mainHeight + mainTop < windowHeight - footerHeight) {
         footer.style.position = 'absolute';
         footer.style.bottom = 0;
      } else {
         footer.style.position = 'static';
         footer.style.marginTop = '30px';
      }
   }

   setFooterPosition();
   window.addEventListener('scroll', setFooterPosition);
})