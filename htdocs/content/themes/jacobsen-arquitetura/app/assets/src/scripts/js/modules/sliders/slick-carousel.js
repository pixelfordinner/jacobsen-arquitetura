'use strict';

require('slick-carousel');
var $ = require('jquery');

var slickCarousel = function() {
  $('[data-slick]').each(slickCarousel.iterateElements);
};

slickCarousel.iterateElements = function(i, element) {
  console.log($(element).slick());
};

module.exports = slickCarousel;