'use strict';

var $ = require('jquery');
require('smoothstate');

var pageTransitions = function() {
  var $body = $('html', 'body');
  var $content = $('#content-wrapper').smoothState({
    debug: true,
    //prefetch: true,
    //cacheLength: 4,
    onStart: {
      duration: 500,
      render: function() {
        $content.addClass('page-transition--exiting');
        $body.animate({scrollTop: 0}, 500);
      }
    },
    onReady: {
      duration: 0,
      render: function($container, $newContent) {
        $container.html($newContent);
        $(window).trigger('content-modules');
        $container.removeClass('page-transition--exiting');
      }
    }
  });
};

module.exports = pageTransitions;
