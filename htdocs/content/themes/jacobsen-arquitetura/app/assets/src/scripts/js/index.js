'use strict';

// User modules
var browserFeatures = require('helpers/browser-features');
var fontloader = require('fonts/loader');
var imagesLoading = require('helpers/images-loading');
var keyEvents = require('helpers/key-events');
var gmaps = require('maps/gmaps');
var slickCarousel = require('sliders/slick-carousel');

// Vendor modules
var $ = require('jquery');
var picturefill = require('picturefill');

$(document).ready(function() {
  fontloader();
  browserFeatures();
  picturefill();
  imagesLoading();
  keyEvents();
  gmaps();
  slickCarousel();
});
