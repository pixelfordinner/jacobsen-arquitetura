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
  $(window)
    .unbind('gmap-reload')
    .on('gmap-reload', gmaps.iterateElements);

  gmaps.iterateElements();
};

gmaps.iterateElements = function() {
  $('[data-gmap-lat][data-gmap-lng]').each(gmaps.processElement);
};

gmaps.processElement = function(i, element) {
  var $element = $(element);
  googleMapsLoader = googleMapsLoader || require('google-maps');

  googleMapsLoader.KEY = 'AIzaSyDjGDRf-J-EeunUlKzjiowWV6cwjO1l1Pk';

  googleMapsLoader.load(function(google) {
    var coordinates = new google.maps.LatLng(
      $element.attr('data-gmap-lat'),
      $element.attr('data-gmap-lng')
    );

    if (typeof $element.attr('data-gmap') === 'object') {
      gmaps.updateMap($element, coordinates);
    } else {
      gmaps.createMap($element, google, coordinates);
    }
  });
};

gmaps.createMap = function($element, google, coordinates) {
  settings.center = coordinates;

  // Enable marker icon if available
  if ($element.attr('data-gmap-icon')) {
    marker.icon = $element.attr('data-gmap-icon');
    marker.title = $element.attr('data-gmap-icon-title');
  }

  var map = new google.maps.Map($element.get(0), settings);

  var centerMap = function() { map.setCenter(coordinates); };

  // Center on resize
  google.maps.event.clearListeners(window);
  google.maps.event.addDomListener(window, 'resize', centerMap);
  $(window).on('gmap-center', centerMap);

  marker.position = coordinates;
  marker.map = map;

  var mapMarker = new google.maps.Marker(marker);

  $element
    .data('gmap', {map: map, mapMarker: mapMarker});
};

gmaps.updateMap = function($element, coordinates) {
  var gmapData = $element.data('gmap');

  $element
    .removeClass('animation--fadeinfadeout')
    .addClass('animation--fadeinfadeout');

  gmapData.mapMarker.setPosition(coordinates);
  gmapData.mapMarker.setTitle($element.attr('data-gmap-icon-title'));
  gmapData.mapMarker.setIcon($element.attr('data-gmap-icon'));

  gmapData.map.panTo(coordinates);
};

module.exports = gmaps;
