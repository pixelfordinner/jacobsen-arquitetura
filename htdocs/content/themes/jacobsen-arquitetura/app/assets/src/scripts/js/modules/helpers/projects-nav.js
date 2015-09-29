'use strict';

var $ = require('jquery');

var projectsNav = function() {
  $('[data-next-projects]').click(function(e) {
    e.preventDefault();
    var $this = $(this);

    $.ajax($this.attr('href'), {
      error: function(xhr, status, error) {
        console.log(xhr, status, error);
      },
      success: function(data) {
        var $data = $(data);
        var $nextPage = $data.find('data-next-projects');

        $('[data-projects-grid]').append(
          $data.find('[data-projects-grid]').html()
        );

        if ($nextPage.length > 0) {
          $this.removeClass('button--loading')
            .html($nextPage.html())
            .attr('href', $nextPage.attr('href'))
            .click(projectsNav);
        } else {
          $this.addClass('button--transparent');
        }
      }
    });

    $this.addClass('button--loading')
      .html('<span></span>')
      .removeAttr('href')
      .unbind('click');
  });
};

module.exports = projectsNav;
