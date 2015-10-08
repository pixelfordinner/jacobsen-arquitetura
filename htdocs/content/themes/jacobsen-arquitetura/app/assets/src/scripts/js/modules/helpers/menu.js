'use strict';

var $ = require('jquery');

var menu = function() {
  $('[data-menu-toggle]')
    .unbind('click')
    .click(function() {
      var $target = $('[data-menu-content]');
      var $this = $(this);

      if ($this.hasClass('menu-toggle--open')) {
        $this
          .removeClass('menu-toggle--open')
          .blur();

        $target
          .addClass('menu-content--close')
          .removeClass('menu-content--open');

        setTimeout(function() {
          $target
            .css('visibility', 'hidden')
            .removeClass('menu-content--close');
        }, 450);
      } else {
        $this
          .addClass('menu-toggle--open')
          .blur();

        $target
          .addClass('menu-content--open')
          .css('visibility', 'visible');
      }
    });
};

module.exports = menu;
