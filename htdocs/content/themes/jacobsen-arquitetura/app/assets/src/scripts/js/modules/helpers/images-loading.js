'use strict';

var $ = require('jquery');
var imagesLoaded = require('imagesloaded');

var imagesLoading = function() {
  var images = imagesLoaded($('.image--loading'));

  images.on('progress', function(instance, image) {
    if (image.isLoaded) {
      console.log(image);
      $(image.img).removeClass('image--loading');
    }
  });
};

module.exports = imagesLoading;
