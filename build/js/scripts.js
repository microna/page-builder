// Mobile burger menu
// function burgerMenu() {
//   const burger = document.querySelector(".burger");
//   const menu = document.querySelector(".menu");
//   const body = document.querySelector("body");
//   burger.addEventListener("click", () => {
//     if (!menu.classList.contains("active")) {
//       menu.classList.add("active");
//       burger.classList.add("active");
//       body.classList.add("locked");
//     } else {
//       menu.classList.remove("active");
//       burger.classList.remove("active");
//       body.classList.remove("locked");
//     }
//   });
//   // Here is the place where we change breakpoint
//   window.addEventListener("resize", () => {
//     if (window.innerWidth > 991.98) {
//       menu.classList.remove("active");
//       burger.classList.remove("active");
//       body.classList.remove("locked");
//     }
//   });
// }
// burgerMenu();

// Аккордеон
function faq() {
  const items = document.querySelectorAll(".faq__item-trigger");
  console.log(items);
  items.forEach((item) => {
    item.addEventListener("click", () => {
      console.log("click");
      const parent = item.parentNode;
      if (parent.classList.contains("faq__item-active")) {
        parent.classList.remove("faq__item-active");
      } else {
        document
          .querySelectorAll(".faq__item")
          .forEach((child) => child.classList.remove("faq__item-active"));
        parent.classList.add("faq__item-active");
      }
    });
  });
}
faq();
