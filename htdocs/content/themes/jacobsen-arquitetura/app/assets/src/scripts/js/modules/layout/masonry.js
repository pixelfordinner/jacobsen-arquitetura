'use strict';

var Masonry = require('masonry-layout');
var $ = require('jquery');

var layoutMasonry = function() {
  $('[data-masonry-options]').each(layoutMasonry.iterateElements);
};

layoutMasonry._data = {
  classes: {
    fadein: 'animation--fadein'
  },
  selectors: {
    item: '.content-grid__item'
  }
};

layoutMasonry.iterateElements = function(i, element) {
  var $element = $(element);
  var msnry = new Masonry(element, $element.data('masonry-options'));

  layoutMasonry.onComplete($element);

  $(window).on('content-grid-item-add', function() {
    msnry.reloadItems();
    setTimeout(function() { msnry.layout(); }, 100);
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
