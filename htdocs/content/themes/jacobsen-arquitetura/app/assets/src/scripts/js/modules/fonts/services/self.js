/* global FontFaceObserver */
'use strict';

require('fontfaceobserver');
var cookies = require('cookies-js');

var selfService = function(availableClass, unavailableClass) {
  var availableFonts = selfService._data.element.className.split(' ');

  if (availableFonts.indexOf(availableClass) === -1) {
    selfService.observeFonts(availableClass, unavailableClass);
  }
};

selfService._data = {
  element: window.document.documentElement,
  key: '_fonts_self_loaded'
};

selfService.observeFonts = function(availableClass, unavailableClass) {
  var _this = this;
  var geogrotesque300 = new FontFaceObserver('geogrotesque', {weight:300});
  var geogrotesque400 = new FontFaceObserver('geogrotesque', {weight:400});
  var geogrotesque600 = new FontFaceObserver('geogrotesque', {weight:600});

  Promise.all([
      geogrotesque300.check(),
      geogrotesque400.check(),
      geogrotesque600.check()
    ]).then(function() {
      _this._data.element.className += ' ' + availableClass;
      _this.cacheCSS();
    }, function() {
      _this._data.element.className += ' ' + unavailableClass;
    });
};

selfService.cacheCSS = function() {
  if (cookies.enabled) {
    cookies.set(this._data.key, true, {expires: 604800});
  }
};

module.exports = selfService;
