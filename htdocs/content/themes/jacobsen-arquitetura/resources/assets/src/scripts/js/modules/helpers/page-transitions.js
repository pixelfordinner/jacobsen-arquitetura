'use strict';

var $ = require('jquery');
require('smoothstate');

var pageTransitions = function() {
  var $body = $('body');
  var $content = $('#content-wrapper');

  var smoothstate = $content.smoothState({
    debug: true,
    blacklist: '.page-transition--none',
    prefetch: false,
    cacheLength: 16,
    onStart: {
      duration: 400,
      render: function() {
        $content.addClass('page-transition--exiting');
        $body.css('overflow', 'visible');
      }
    },
    onReady: {
      duration: 100,
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

      if (typeof window.ga !== 'undefined' &&
          typeof window.location.pathname !== 'undefined') {
        window.ga('send', 'pageview',window.location.pathname);
      }

      $('[data-preload]').each(function(i, element) {
        var $element = $(element);
        var delay = parseInt($element.attr('data-preload'));

        if (delay > 0) {
          setTimeout(function() {
            smoothstate.fetch($element.attr('href'));
          }, delay);
        }
      });
    }
  }).data('smoothState');
};

module.exports = pageTransitions;
