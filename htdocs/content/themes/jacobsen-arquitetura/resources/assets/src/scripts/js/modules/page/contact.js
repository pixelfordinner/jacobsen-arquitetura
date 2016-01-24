'use strict';

var $ = require('jquery');

var contact = function() {
  contact.iterateElements();
};

contact._data = {
  selectors: {
    target: '[data-target-element]',
    locationActive: '.contact-office__location-link--active',
    location: '.contact-office__location-link'
  },
  classes: {
    locationActive: 'contact-office__location-link--active'
  },
  attributes: {
    map: [
      'data-target-lat',
      'data-target-lng',
      'data-target-icon',
      'data-target-icon-title'
    ]
  }
};

contact.iterateElements = function() {
  if ($(contact._data.selectors.target).length > 0) {
    $('[data-target-lat][data-target-lng]').each(contact.processElement);
  }
};

contact.processElement = function(i, element) {
  var $element = $(element);

  $element.unbind('click').click(contact.updateTarget);

  if ($element.hasClass(contact._data.classes.locationActive)) {
    $element.trigger('click');
  }
};

contact.updateTarget = function(e) {
  e.preventDefault();

  var $element = $(this);
  var $target = $(contact._data.selectors.target);

  $(contact._data.selectors.location)
    .removeClass(contact._data.classes.locationActive);

  contact._data.attributes.map.forEach(function(attribute) {
    $target.attr(attribute.replace(/target/g, 'gmap'), $element.attr(attribute));
  });

  $(window).trigger('gmap-reload');

  $element.addClass(contact._data.classes.locationActive);
};

module.exports = contact;
