/* global Typekit */
'use strict';

var cookies = require('cookies-js');
var loadJS = require('helpers/load-js');

var typekitService = function(availableClass, unavailableClass) {
  if (!cookies.enabled ||
    typeof cookies.get(typekitService._data.key) !== 'string') {
    typekitService.loadJS(availableClass, unavailableClass);
  }
};

typekitService._data = {
  kitId: 'idx2gzm',
  key: '_fonts_typekit_url',
  element: window.document.documentElement,
  selector: 'link[rel="stylesheet"][href*="use.typekit.net"]'
};

typekitService.loadJS = function(availableClass, unavailableClass) {
  var _this = this;

  loadJS('//use.typekit.net/' + this._data.kitId + '.js', function() {
    try {
      Typekit.load({
        id: _this._data.kitId,
        active: function() { _this.eventHandler(availableClass, true); },
        inactive: function() { _this.eventHandler(unavailableClass); }
      });
    } catch (e) {
      console.log('Unable to load Typekit: [' + e + ']');
    }
  });
};

typekitService.eventHandler = function(appendClass, cacheCSS) {
  this._data.element.className += ' ' + appendClass;

  if (cacheCSS === true) {
    this.cacheCSS();
  }
};

typekitService.cacheCSS = function() {
  // Typekit cache
  // See http://fvsch.com/code/typekit-url-cache/#urlcache
  var linkElement = window.document.querySelector(this._data.selector);

  if (cookies.enabled && typeof linkElement === 'object') {
    cookies.set('_fonts_typekit_url',
      linkElement.href,
      {expires: 259200} // 3 days expiration
    );
  }
};

module.exports = typekitService;
