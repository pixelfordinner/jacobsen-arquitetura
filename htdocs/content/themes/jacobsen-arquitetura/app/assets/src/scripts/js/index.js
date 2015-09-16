'use strict';

// User modules
var browserFeatures = require('helpers/browser-features');
var fontloader = require('fonts/loader');
var keyEvents = require('helpers/key-events');
var gmaps = require('maps/gmaps');

// Vendor modules
var $ = require('jquery');
var picturefill = require('picturefill');

$(document).ready(function() {
  fontloader();
  browserFeatures();
  picturefill();
  keyEvents();
  gmaps();
});
