const boutonMenu = document.querySelector('.menuBurger');
const navigation = document.querySelector('nav');

boutonMenu.addEventListener('click', () => {
  navigation.classList.toggle('visible'); // Ajoute/enlève la classe "visible"
  
  // Change l'image du bouton selon l'état
  if (navigation.classList.contains('visible')) {
    boutonMenu.style.backgroundImage = 'url(./images/menuBurgerClosed.png)';
  } else {
    boutonMenu.style.backgroundImage = 'url(./images/menuBurger.png)';
  }
});
