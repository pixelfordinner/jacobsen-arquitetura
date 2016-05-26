'use strict';

var $ = require('jquery');
require('smoothstate');

var pageTransitions = function() {
  var $body = $('body');
  var $content = $('#content-wrapper').smoothState({
    debug: true,
    blacklist: '.page-transition--none',
    // prefetch: true,
    // cacheLength: 16,
    onStart: {
      duration: 500,
      render: function() {
        $content.addClass('page-transition--exiting');
        $body.css('overflow', 'visible');
      }
    },
    onReady: {
      duration: 0,
      render: function($container, $newContent) {
        $container.html($newContent);
        $container.removeClass('page-transition--exiting');
        $(window).trigger('content-modules');
      }
    }
  });
};

module.exports = pageTransitions;
