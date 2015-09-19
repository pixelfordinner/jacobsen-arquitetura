'use strict';

var $ = require('jquery');

var keyEvents = function() {

  // Display horizontal grid (1rem) on keypress

  $(window.document.documentElement)
    .keyup(function(e) {
      e = e || window.event;

      switch (e.keyCode) {
        case 71: // G
          $('body').toggleClass('type__grid');
        break;
      }
    });
};

module.exports = keyEvents;
