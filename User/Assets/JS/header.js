// JS for headers of all pages
document.addEventListener("DOMContentLoaded", () => {
   const reg_ul = document.querySelector(".reg_ul");
   const user_icon = document.querySelector(".user_icon");
   const user_icon_fa = document.querySelector(".fa-user");
   let userIconClickCount = 0;

   user_icon.addEventListener("click", () => {
      if (userIconClickCount == 0 || userIconClickCount % 2 == 0) {
         reg_ul.style.display = "block";
         user_icon_fa.style.color = "#fff";
      } else {
         reg_ul.style.display = "none";
         user_icon_fa.style.color = "#A09C9C";
      }
      userIconClickCount++;
   });
})
