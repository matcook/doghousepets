(function ($, Drupal) {

  "use strict";

  Drupal.behaviors.toggleMenu = {
    attach: function (context, settings) {
      $('.js-menu--main', context).append('<div><i class="hamburger"></i></div>');
      $('.hamburger', context).click(function () {
        $('.js-menu--main', context).toggleClass('is-open');
      });
    }
  };

})(jQuery, Drupal);
