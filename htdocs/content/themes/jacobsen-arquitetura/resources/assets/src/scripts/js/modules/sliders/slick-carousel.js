'use strict';

require('slick-carousel');
var $ = require('jquery');

var slickCarousel = function() {
  $('[data-slick]').each(slickCarousel.processElement);
};

slickCarousel.processElement = function(i, element) {
  $(element).slick();
};

module.exports = slickCarousel;
