'use strict';

var $ = require('jquery');
require('smoothstate');

$.extend($.easing, {
  easeInOutCubic: function(x, t, b, c, d) {
    if ((t /= d / 2) < 1) {
      return c / 2 * t * t * t + b;
    }
    return c / 2 * ((t -= 2) * t * t + 2) + b;
  }
});

var pageTransitions = function() {
  var $body = $('body');
  var $content = $('#content-wrapper');
  var anchor = null;

  var smoothstate = $content.smoothState({
    debug: true,
    blacklist: '.page-transition--none',
    prefetch: false,
    cacheLength: 16,
    onBefore: function($currentTarget) {
      var targetAnchor = $currentTarget.attr('data-page-transition-anchor');
      if (targetAnchor !== 'undefined') {
        anchor = targetAnchor;
      }
    },
    onStart: {
      duration: 300,
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
    },
    onAfter: function() {
      $(window).trigger('content-grid_page_update');

      if ($('#main').hasClass('no-caching')) {
        smoothstate.clear(window.location);
      }
    }
  }).data('smoothState');
};

module.exports = pageTransitions;
