'use strict';

var $ = require('jquery');

var contentGrid = function() {
  contentGrid.bindButtons();
};

contentGrid._data = {
  selectors: {
    buttonNext: '[data-content-grid-next]',
    buttonFilter: '[data-content-grid-filter]',
    contentGrid: '[data-content-grid]',
    filterParameter: '[data-content-grid-filter-parameter]'
  },
  classes: {
    buttonLoading: 'button--loading',
    buttonTransparent: 'button--transparent',
    buttonActive: 'button--active',
    contentGridLoading: 'content-grid--loading'
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
      _this.fetchContent($this.attr('href'), {}, _this.appendContent);

      // Morph the button into loader
      _this.setLoadingState(true);
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

      $(_this._data.selectors.contentGrid)
        .addClass(_this._data.classes.contentGridLoading)
        .css('min-height', $(_this._data.selectors.contentGrid).outerHeight());

      // Make the request
      var filterParameter = $(_this._data.selectors.filterParameter)
                              .attr('data-content-grid-filter-parameter');
      var data = {};

      if (filters.length > 0) {
        data[filterParameter] = filters.join(',');
      }

      _this.fetchContent(window.location.href, data, _this.replaceContent);
    });
};

contentGrid.setLoadingState = function(loading, href, html) {
  if (loading === true) {
    $(this._data.selectors.buttonNext)
      .addClass(this._data.classes.buttonLoading)
      .removeAttr('href')
      .unbind('click');
  } else {
    setTimeout((function() {
      $(this._data.selectors.buttonNext)
      .removeClass(this._data.classes.buttonLoading)
      .attr('href', href)
      .html(html);
    }).bind(this), 500);
  }
};

contentGrid.nextPage = function(data, replaceContent) {
  var $data = $(data);
  var $buttonNext = $data.find(this._data.selectors.buttonNext);

  // Append/Replace new content
  if (replaceContent === true) {
    $(this._data.selectors.contentGrid)
      .html($data.find(this._data.selectors.contentGrid).html());
  } else {
    $(this._data.selectors.contentGrid)
      .append($data.find(this._data.selectors.contentGrid).html());
  }

  // Trigger item-add event
  $(window).trigger('content-grid-item-add');

  // Remove loading state on content-grid
  $(this._data.selectors.contentGrid)
    .removeClass(this._data.classes.contentGridLoading)
    .css('min-height', 'auto');

  if ($buttonNext.length > 0) {
    // Morph back the button with updated data from new content
    this.setLoadingState(false, $buttonNext.attr('href'), $buttonNext.html());
    this.bindButtons();
    $(this._data.selectors.buttonNext)
      .removeClass(this._data.classes.buttonTransparent);
  } else {
    // Hide the button if we're at the last page
    $(this._data.selectors.buttonNext)
      .addClass(this._data.classes.buttonTransparent);
    this.setLoadingState(false, '#', '');
  }
};

contentGrid.appendContent = function(data) {
  this.nextPage(data, false);
};

contentGrid.replaceContent = function(data) {
  this.nextPage(data, true);
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
