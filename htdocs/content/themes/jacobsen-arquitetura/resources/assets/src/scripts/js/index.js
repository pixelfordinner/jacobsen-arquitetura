'use strict';

// Vendor modules
var $ = require('jquery');
window.jQuery = $;
var picturefill = require('picturefill');

// User modules
var browserFeatures = require('helpers/browser-features');
var fontloader = require('fonts/loader');
var keyEvents = require('helpers/key-events');
var menu = require('helpers/menu');
var gmaps = require('maps/gmaps');
var slickCarousel = require('sliders/slick-carousel');
var pageTransitions = require('helpers/page-transitions');
var projectsNav = require('content-grid');
var layoutMasonry = require('layout/masonry');
var socialInstagram = require('social/instagram');

// User pages
var pageContact = require('page/contact');

$(document).ready(function() {
  var baseModules = function() {
    fontloader();
    browserFeatures();
    keyEvents();
  };

  var contentModules = function() {
    gmaps();
    picturefill();
    menu();
    slickCarousel();
    pageTransitions();
    projectsNav();
    layoutMasonry();
    socialInstagram();

    pageContact();
  };

  baseModules();
  contentModules();

  $(window).on('base-modules', contentModules);
  $(window).on('content-modules', contentModules);
});
