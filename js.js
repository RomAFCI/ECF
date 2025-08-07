const boutonMenu = document.querySelector(".menuBurger");
const navigation = document.querySelector("nav");

boutonMenu.addEventListener("click", () => {
  navigation.classList.toggle("visible");

  if (navigation.classList.contains("visible")) {
    boutonMenu.style.backgroundImage = "url(./images/menuBurgerClosed.png)";
  } else {
    boutonMenu.style.backgroundImage = "url(./images/menuBurger.png)";
  }
});

document.querySelector(".formFlex").addEventListener("submit", function (e) {
  e.preventDefault();
});
