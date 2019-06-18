/**
 * @file
 *
 * Contains JS functions
 */

(function ($, Drupal, drupalSettings) {
  'use strict';
  Drupal.behaviors.initMap = {
    attach: function (context, settings) {
      $('#map-container', context).once('generateMap')
        .each(function () {
          var location = {
            lat: parseFloat(drupalSettings.mapLocationBlock.latitude),
            lng: parseFloat(drupalSettings.mapLocationBlock.longitude),
          };
          var map = new google.maps.Map(document.getElementById('map'), {
            center: location,
            zoom: 16,
          });
          var marker = new google.maps.Marker({
            position: location,
            map: map,
            title: 'Doghouse Pets',
          });
        });
    }
  }
})(jQuery, Drupal, drupalSettings);
