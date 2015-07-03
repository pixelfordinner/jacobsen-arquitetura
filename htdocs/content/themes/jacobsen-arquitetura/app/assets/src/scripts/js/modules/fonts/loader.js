'use strict';

var typekit = require('./services/typekit');
var self = require('./services/self');

var fontLoader = function() {
  // Load Typekit hosted fonts (Body)
  typekit(
    fontLoader._data.body.availableClass,
    fontLoader._data.body.unavailableClass
  );

  // Load self hosted fonts (Headings)
  self(
    fontLoader._data.heading.availableClass,
    fontLoader._data.heading.unavailableClass
  );
};

fontLoader._data = {
  body: {
    availableClass: 'type__body--available',
    unavailableClass: 'type__body--unavailable'
  },
  heading: {
    availableClass: 'type__heading--available',
    unavailableClass: 'type__heading--unavailable'
  }
};

module.exports = fontLoader;
