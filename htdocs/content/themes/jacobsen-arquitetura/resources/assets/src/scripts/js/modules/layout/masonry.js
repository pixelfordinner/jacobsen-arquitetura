'use strict';

var Masonry = require('masonry-layout');
var $ = require('jquery');

var layoutMasonry = function() {
  $('[data-masonry-options]').each(layoutMasonry.processElement);
};

layoutMasonry._data = {
  classes: {
    fadein: 'animation--fadein'
  },
  selectors: {
    item: '.content-grid__item'
  }
};

layoutMasonry.processElement = function(i, element) {
  var $element = $(element);
  var msnry = new Masonry(element, $element.data('masonry-options'));

  element.addEventListener('load', function() { msnry.layout(); }, true);
  layoutMasonry.onComplete($element);

  $(window)
    .unbind('content-grid-item-add')
    .on('content-grid-item-add', function() {
      msnry.reloadItems();
      element.addEventListener('load', function() { msnry.layout(); }, true);
    });

  msnry.on('layoutComplete', function() {
    layoutMasonry.onComplete($element);
  });
};

layoutMasonry.onComplete = function($element) {
  $element
    .children(
      this._data.selectors.item + ':not(.' + this._data.classes.fadein + ')'
    ).addClass(this._data.classes.fadein)
    .css('visibility', 'visible');

};

module.exports = layoutMasonry;
