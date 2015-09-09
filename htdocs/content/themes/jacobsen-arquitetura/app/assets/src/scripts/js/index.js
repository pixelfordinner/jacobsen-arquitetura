'use strict';

var browserFeatures = require('helpers/browser-features');
var fontloader = require('fonts/loader');
var keyEvents = require('helpers/key-events');
var gmaps = require('maps/gmaps');

browserFeatures();
fontloader();
keyEvents();
gmaps();
