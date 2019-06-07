(function ($, Drupal) {

  "use strict";

  Drupal.behaviors.toggleMenu = {
    attach: function (context, settings) {
      $('.menu--main', context).append('<div><i class="hamburger"></i></div>');
      $('.hamburger', context).click(function () {
        $('.menu--main', context).toggleClass('responsive');
      });
    }
  };

})(jQuery, Drupal);
