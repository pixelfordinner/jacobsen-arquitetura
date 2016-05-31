'use strict';

var Instafeed = require('instafeed.js');
var $ = require('jquery');

var instagram = function() {
  $('[data-instagram]').each(instagram.processElement);
};

instagram.processElement = function(i, element) {
  var $element = $(element);
  var settings = $element.data('instagram');

  settings.target = element;
  settings.after = function() {
    setTimeout(function() { $(window).trigger('gmap-center'); }, 800);
    setTimeout(function() { $(window).trigger('gmap-center'); }, 1200);
    setTimeout(function() { $(window).trigger('gmap-center'); }, 1800);
  };

  var feed = new Instafeed(settings);
  feed.run();
};

module.exports = instagram;
