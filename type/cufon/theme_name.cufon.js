Drupal.behaviors.cufon = function (context) {
  Cufon.replace('h2.title', {
    textShadow: '-2px -1px #3b291e'
  });
  Cufon.replace('.primary-menu-inner ul.sf-menu a', {
    hover: true,
    textShadow: '-2px -1px #3b291e'
  });
};