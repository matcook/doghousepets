/**
 * @file
 * 
 * Contains JS functions
 */

(function ($, Drupal, drupalSettings) {
  'use strict';
  Drupal.behaviors.initMap = {
    attach: function (context, settings) {
      function generateMap() {
        var location = {
          lat: parseFloat(drupalSettings.map_location_block.latitude),
          lng: parseFloat(drupalSettings.map_location_block.longitude)
        };
        var map = new google.maps.Map(document.getElementById('map'), {
          center: location,
          zoom: 16
        });
        var marker = new google.maps.Marker({
          position: location,
          map: map,
          title: 'Doghouse Pets'
        });
      }
      generateMap();
      console.log('ran')
    }
  }
})(jQuery, Drupal, drupalSettings);
