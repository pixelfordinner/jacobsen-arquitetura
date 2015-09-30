'use strict';

var $ = require('jquery');

var contentGrid = function() {
  contentGrid.bindButtons();
};

contentGrid._data = {
  selectors: {
    buttonNext: '[data-content-grid-next]',
    buttonFilter: '[data-content-grid-filter]',
    contentGrid: '[data-content-grid]'
  },
  classes: {
    buttonLoading: 'button--loading',
    buttonTransparent: 'button--transparent',
    buttonActive: 'button--active'
  },
  attributes: {
    filter: 'data-content-grid-filter'
  }
};

contentGrid.bindButtons = function() {
  var _this = this;

  // Next page button
  $(this._data.selectors.buttonNext)
    .unbind('click')
    .click(function(e) {
      var $this = $(this);
      e.preventDefault();

      // Make the request
      _this.fetchContent($this.attr('href'), {}, _this.nextPage);

      // Morph the button into loader
      $this
        .addClass(_this._data.classes.buttonLoading)
        .html('<span></span>')
        .removeAttr('href')
        .unbind('click');
    });

  // Filter buttons
  $(this._data.selectors.buttonFilter)
    .unbind('click')
    .click(function(e) {
      var $this = $(this);
      var filters = [];
      e.preventDefault();

      // Set/Unset active state
      $this
        .toggleClass(_this._data.classes.buttonActive)
        .blur();

      // Compile list of active filter(s)
      $(_this._data.selectors.buttonFilter +
          '.' + _this._data.classes.buttonActive)
        .each(function(i, el) {
          filters.push($(el).attr(_this._data.attributes.filter));
        });

    });
};

contentGrid.nextPage = function(data) {
  var $data = $(data);
  var $buttonNext = $data.find(this._data.selectors.buttonNext);

  // Append new content to the grid
  this.appendContent($data);

  if ($buttonNext.length > 0) {
    // Morph back the button with updated data from new content
    $(this._data.selectors.buttonNext)
      .removeClass(this._data.classes.buttonLoading)
      .html($buttonNext.html())
      .attr('href', $buttonNext.attr('href'));

    this.bindButtons();
  } else {
    // Hide the button if we're at the last page
    $(this._data.selectors.buttonNext)
      .addClass(this._data.classes.buttonTransparent);
  }
};

contentGrid.appendContent = function($data) {
  $(this._data.selectors.contentGrid)
    .append($data.find(this._data.selectors.contentGrid).html());
};

contentGrid.replaceContent = function($data) {
  $(this._data.selectors.contentGrid)
    .html($data.find(this._data.selectors.contentGrid).html());
};

contentGrid.fetchContent = function(url, data, cb) {
  $.ajax(url, {
    error: function(xhr, status, error) {
      console.log(xhr, status, error);
    },
    data: data,
    success: cb.bind(this)
  });
};

module.exports = contentGrid;
