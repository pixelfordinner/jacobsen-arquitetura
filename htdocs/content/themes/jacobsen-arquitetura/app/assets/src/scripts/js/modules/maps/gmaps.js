'use strict';

var $ = require('jquery');
var googleMapsLoader = null;

var settings = {
  zoom: 12,
  scrollwheel: false,
  draggable: false,
  disableDefaultUI: true,
  disableDoubleClickZoom: true,
  keyboardShortcuts: false,
  styles: [{
    'featureType': 'landscape',
    'elementType': 'labels',
    'stylers': [{
      'visibility': 'off'
    }]
  }, {
    'featureType': 'transit',
    'elementType': 'labels',
    'stylers': [{
      'visibility': 'off'
    }]
  }, {
    'featureType': 'poi',
    'elementType': 'labels',
    'stylers': [{
      'visibility': 'off'
    }]
  }, {
    'featureType': 'water',
    'elementType': 'labels',
    'stylers': [{
      'visibility': 'off'
    }]
  }, {
    'featureType': 'road',
    'elementType': 'labels.icon',
    'stylers': [{
      'visibility': 'off'
    }]
  }, {
    'stylers': [{
      'hue': '#00aaff'
    }, {
      'saturation': -100
    }, {
      'gamma': 2.15
    }, {
      'lightness': 12
    }]
  }, {
    'featureType': 'road',
    'elementType': 'labels.text.fill',
    'stylers': [{
      'visibility': 'on'
    }, {
      'lightness': 24
    }]
  }, {
    'featureType': 'road',
    'elementType': 'geometry',
    'stylers': [{
      'lightness': 57
    }]
  }]
};

var marker = {
  draggable: false,
  raiseOnDrag: false
};

var gmaps = function() {
  $('[data-gmap-lat][data-gmap-lng]').each(gmaps.iterateMaps);
};

gmaps.iterateMaps = function(i, element) {
  var $element = $(element);
  googleMapsLoader = googleMapsLoader || require('google-maps');

  googleMapsLoader.load(function(google) {
    var coordinates = new google.maps.LatLng(
      $element.data('gmap-lat'),
      $element.data('gmap-lng')
    );

    settings.center = coordinates;

    if ($element.data('gmap-icon')) {
      marker.icon = $element.data('gmap-icon');
      marker.title = $element.data('gmap-icon-title');
    }

    var map = new google.maps.Map($element.get(0), settings);

    // Center on resize
    google.maps.event.addDomListener(window, 'resize', function() {
      map.setCenter(coordinates);
    });

    marker.position = coordinates;
    marker.map = map;

    new google.maps.Marker(marker);

  });
};

module.exports = gmaps;
