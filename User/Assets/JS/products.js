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
      }
   }

   setFooterPosition();
   window.addEventListener('scroll', setFooterPosition);
});

let addToCard = document.querySelectorAll('.btn_add_to_card');

for (let i = 0; i < addToCard.length; i++) {
   addToCard[i].addEventListener('click', () => {
      addToCard[i].innerHTML = 'Добавлено в корзину';
      addToCard[i].style.backgroundColor = '#ECE6E6';
      addToCard[i].style.color = "#ab7a7a";
      addToCard[i].style.cursor = "auto";
      addToCard[i].setAttribute('disabled', '');
   });
}