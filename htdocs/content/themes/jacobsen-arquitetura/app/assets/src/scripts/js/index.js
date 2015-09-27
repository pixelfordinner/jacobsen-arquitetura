'use strict';

// Vendor modules
var $ = require('jquery');
window.jQuery = $;
var picturefill = require('picturefill');

// User modules
var browserFeatures = require('helpers/browser-features');
var fontloader = require('fonts/loader');
var imagesLoading = require('helpers/images-loading');
var keyEvents = require('helpers/key-events');
var gmaps = require('maps/gmaps');
var slickCarousel = require('sliders/slick-carousel');
var pageTransitions = require('helpers/page-transitions');

$(document).ready(function() {
  var baseModules = function() {
    fontloader();
    browserFeatures();
    keyEvents();
  };

  var contentModules = function() {
    gmaps();
    picturefill();
    imagesLoading();
    slickCarousel();
    pageTransitions();
  };

  baseModules();
  contentModules();

  $(window).on('base-modules', contentModules);
  $(window).on('content-modules', contentModules);
});
