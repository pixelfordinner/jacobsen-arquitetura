'use strict';

var cookies = window.Cookies;
var $ = require('jquery');

var browserFeatures = function() {
  if (cookies.enabled === false) {
    return;
  }

  if (browserFeatures.hasCache() === true) {
    browserFeatures.loadFromCache();
  } else if (browserFeatures.hasDetection() === true) {
    browserFeatures.cacheFeatures();
  } else {
    console.log('Browser feature detection/loading failure.');
  }
};

browserFeatures._data = {
  prefix: '_feat_',
  cssPrefix: 'feat--',
  features: ['js', 'flexbox', 'touch', 'cssremunit'],
  $element: $(window.document.documentElement)
};

browserFeatures.hasCache = function() {
  return cookies.get(this._data.prefix + 'cache');
};

browserFeatures.loadFromCache = function() {
  var data = this._data;

  data.features.forEach(function(feat) {
    var availability = cookies.get(data.prefix + feat) === true;
    var featureClass = data.prefix + (availability ? '' : 'no-');

    data.$element.addClass(featureClass);

    console.log('Cache retrieval: ' + featureClass);
  });
};

browserFeatures.hasDetection = function() {
  var featureDetection = true;
  var data = this._data;

  data.features.forEach(function(feat) {
    var featSupportedClassName = data.cssPrefix + feat;
    var featUnsupportedClassName = data.cssPrefix + 'no-' + feat;

    if (data.$element.hasClass(featSupportedClassName) === false &&
      data.$element.hasClass(featUnsupportedClassName) === false) {
      console.log('Not found: ' + feat + '(' + featSupportedClassName + ')');
      featureDetection = false;
    }
  });

  return featureDetection;
};

browserFeatures.cacheFeatures = function() {
  var data = this._data;

  data.features.forEach(function(feat) {
    var featSupportedClassName = data.cssPrefix + feat;

    cookies.set(data.prefix + feat,
      data.$element.hasClass(featSupportedClassName),
      518400 // 6 days expiration
    );
  });
};

module.exports = browserFeatures;
