'use strict';

var $ = require('jquery');
require('window.requestanimationframe');

var menu = function() {
  var $toggle = $(menu._data.selectors.menuToggle);
  $toggle
    .unbind('click')
    .click(menu.click.bind(menu));

  if (menu._data.states.watching === false) {
    menu.watcher();
  }
};

menu._data = {
  selectors: {
    menuContent: '[data-menu-content]',
    menuToggle: '[data-menu-toggle]'
  },
  classes: {
    menuContentClose: 'menu-content--close',
    menuContentOpen: 'menu-content--open',
    menuToggleOpen: 'menu-toggle--open',
    menuToggleFaded: 'menu-toggle--faded'
  },
  attributes: {
    animationDuration: 'menu-content-anim-duration'
  },
  states: {
    watching: false,
    animating: false,
    scrollY: null
  }
};

menu.click = function() {
  // If there's already an animation going on, let's finish it.
  if (this._data.states.animating) {
    return;
  }

  return this.isOpen() ? this.close() : this.open();
};

menu.isOpen = function() {
  return $(this._data.selectors.menuToggle)
    .hasClass(this._data.classes.menuToggleOpen);
};

menu.open = function() {
  var $toggle = $(this._data.selectors.menuToggle);
  var $content = $(this._data.selectors.menuContent);
  var animDuration = parseInt(
    $content.data(this._data.attributes.animationDuration)
  );

  this.freezePage();
  this.animate(animDuration);

  $toggle
    .addClass(this._data.classes.menuToggleOpen)
    .blur();
  $content
    .addClass(this._data.classes.menuContentOpen)
    .css('visibility', 'visible');
};

menu.close = function() {
  var $toggle = $(this._data.selectors.menuToggle);
  var $content = $(this._data.selectors.menuContent);
  var animDuration = parseInt(
    $content.data(this._data.attributes.animationDuration)
  );

  this.unfreezePage();

  $content
    .addClass(this._data.classes.menuContentClose)
    .removeClass(this._data.classes.menuContentOpen);

  $toggle
    .removeClass(this._data.classes.menuToggleOpen)
    .blur();

  this.animate(animDuration);

  setTimeout(function() {
    $content
    .css('visibility', 'hidden')
    .removeClass(this._data.classes.menuContentClose);
  }.bind(this), animDuration);
};

menu.freezePage = function() {
  $('body').css('overflow', 'hidden');
};

menu.unfreezePage = function() {
  $('body').css('overflow', 'visible');
};

menu.animate = function(time) {
  this._data.states.animating = true;

  setTimeout(
    function() {
     this._data.states.animating = false;
   }.bind(this),
    time
  );
};

menu.watcher = function() {
  this._data.states.watching = true;
  var wScrollY = $(window).scrollTop();

  if (this._data.states.scrollY !== wScrollY) {
    if (this._data.states.scrollY === null || this._data.states.scrollY < 0) {
      this._data.states.scrollY = wScrollY;
    }

    if (this._data.states.scrollY >= wScrollY) {
      $(menu._data.selectors.menuToggle)
        .removeClass(this._data.classes.menuToggleFaded);
    } else {
      $(menu._data.selectors.menuToggle)
        .addClass(this._data.classes.menuToggleFaded);
    }

    this._data.states.scrollY = wScrollY;
  }

  window.requestAnimationFrame(
    function() { menu.watcher(); }
  );
};

module.exports = menu;
