// JS for headers of all pages
document.addEventListener("DOMContentLoaded", () => {
   const reg_ul = document.querySelector(".reg_ul");
   const user_icon = document.querySelector(".user_icon");
   const user_icon_fa = document.querySelector(".fa-user");
   let userIconIsClicked = false;

   user_icon.addEventListener("click", () => {
      if (userIconIsClicked == false) {
         userIconIsClicked = true;
         reg_ul.style.display = "block";
         user_icon_fa.style.color = "#fff";
      } else {
         userIconIsClicked = false;
         reg_ul.style.display = "none";
         user_icon_fa.style.color = "#A09C9C";
      }
      userIconIsClicked++;
   });
})
