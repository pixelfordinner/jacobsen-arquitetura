'use strict';

var $ = require('jquery');
var cookies = require('cookies-js');

var contentGrid = function() {
  if ($(contentGrid._data.selectors.contentGrid).length > 0) {
    // Set grid name
    contentGrid._data.values.gridName =
      $(contentGrid._data.selectors.contentGrid)
        .attr(contentGrid._data.attributes.contentGrid);
    // Bindings
    contentGrid.bindButtons();
  }
};

contentGrid._data = {
  selectors: {
    buttonNext: '[data-content-grid-next]',
    buttonFilter: '[data-content-grid-filter]',
    contentGrid: '[data-content-grid]',
    filterParameter: '[data-content-grid-filter-parameter]',
    filterGroup: '[data-content-grid-filter-group]',
    menuLanguageItem: '.menu-content__language-list__item',
    contentGridItem: '.content-grid__item'
  },
  classes: {
    buttonLoading: 'button--loading',
    buttonTransparent: 'button--transparent',
    buttonActive: 'button--active',
    contentGridLoading: 'content-grid--loading'
  },
  attributes: {
    filter: 'data-content-grid-filter',
    filterGroup: 'data-content-grid-filter-group',
    contentGrid: 'data-content-grid',
    buttonNext: 'data-content-grid-next',
  },
  values: {
    gridName: ''
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

      // Set pagination cookie
      cookies.set(
          '_' + _this._data.values.gridName + '_paged',
          $this.attr(_this._data.attributes.buttonNext),
          10800 // 3 hours
        );
    });

  // Filter buttons
  $(this._data.selectors.buttonFilter)
    .unbind('click')
    .click(function(e) {
      var $this = $(this);
      var filters = [];
      e.preventDefault();

      // Unset active state for buttons of the same group
      var groupData = $this.attr(_this._data.attributes.filterGroup);
      if (typeof groupData !== 'undefined') {
        if ($this.hasClass(_this._data.classes.buttonActive) === false) {
          $('[' + _this._data.attributes.filterGroup + '="' + groupData + '"]')
            .removeClass(_this._data.classes.buttonActive);
        }
      }

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
        .addClass(_this._data.classes.contentGridLoading);

      // Make the request
      var filterParameter = $(_this._data.selectors.filterParameter)
                              .attr('data-content-grid-filter-parameter');
      var data = {};

      cookies.set('_' + _this._data.values.gridName + '_paged');

      if (filters.length > 0) {
        data[filterParameter] = filters.join(',');
        cookies.set(
          '_' + _this._data.values.gridName + '_filters',
          data[filterParameter],
          10800 // 3 hours
        );
      } else {
        cookies.set('_' + _this._data.values.gridName + '_filters');
      }

      _this.fetchContent(window.location.href, data, _this.replaceContent);
    });

  // Language buttons
  $(this._data.selectors.menuLanguageItem)
    .unbind('click')
    .click(function() {
      cookies.set('_' + _this._data.values.gridName + '_paged');
      cookies.set('_' + _this._data.values.gridName + '_filters');
    });

  // Grid Item bookmark
  $(this._data.selectors.contentGridItem)
    .unbind('click')
    .click(function() {
      cookies.set(
        '_' + _this._data.values.gridName + '_anchor',
        $(this).attr('id'),
        10800 // 3 hours
      );
    });

  // Scroll to bookmarked project
  $(window)
    .unbind('content-grid_page_update')
    .on('content-grid_page_update', function() {
      var anchor = cookies.get('_' + _this._data.values.gridName + '_anchor');

      if (anchor !== undefined && $('#' + anchor).length > 0) {
        setTimeout(function() {
          $('html, body').animate({
            scrollTop: $('#' + anchor).offset().top
          }, 750, 'easeInOutCubic');
          anchor = null;
        }, 300);

        cookies.set('_' + _this._data.values.gridName + '_anchor');
      }
    });
};

contentGrid.setLoadingState = function(loading, href, html, page) {
  if (loading === true) {
    $(this._data.selectors.buttonNext)
      .addClass(this._data.classes.buttonLoading)
      .blur()
      .removeAttr('href')
      .unbind('click');
  } else {
    setTimeout((function() {
      $(this._data.selectors.buttonNext)
        .removeClass(this._data.classes.buttonLoading)
        .attr('href', href)
        .attr(this._data.attributes.buttonNext, page)
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
  setTimeout((function() {
    $(this._data.selectors.contentGrid)
      .removeClass(this._data.classes.contentGridLoading);
  }).bind(this), 300);

  if ($buttonNext.length > 0 && $buttonNext.attr('href') !== '#') {
    // Morph back the button with updated data from new content
    this.setLoadingState(false, $buttonNext.attr('href'),
      $buttonNext.html(), $buttonNext.attr(this._data.attributes.buttonNext));
    this.bindButtons();
    $(this._data.selectors.buttonNext)
      .removeClass(this._data.classes.buttonTransparent);
  } else {
    // Hide the button if we're at the last page
    $(this._data.selectors.buttonNext)
      .addClass(this._data.classes.buttonTransparent);
    this.setLoadingState(false, '#', '', 1);
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
