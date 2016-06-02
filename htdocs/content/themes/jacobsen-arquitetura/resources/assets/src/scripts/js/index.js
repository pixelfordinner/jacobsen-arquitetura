'use strict';

// Vendor modules
var $ = require('jquery');
window.jQuery = $;
var picturefill = require('picturefill');

// User modules
var fontloader = require('fonts/loader');
var keyEvents = require('helpers/key-events');
var menu = require('helpers/menu');
var gmaps = require('maps/gmaps');
var slickCarousel = require('sliders/slick-carousel');
var pageTransitions = require('helpers/page-transitions');
var projectsNav = require('content-grid');
var layoutMasonry = require('layout/masonry');
var socialInstagram = require('social/instagram');
var svg4everybody = require('svg4everybody');

// User pages
var pageContact = require('page/contact');

$(document).ready(function() {
  var baseModules = function() {
    fontloader();
    keyEvents();
    pageTransitions();
  };

  var contentModules = function() {
    gmaps();
    picturefill();
    menu();
    slickCarousel();
    projectsNav();
    layoutMasonry();
    socialInstagram();
    svg4everybody();
    pageContact();
  };

  baseModules();
  contentModules();

  $(window).on('base-modules', contentModules);
  $(window).on('content-modules', contentModules);
});
