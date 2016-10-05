
(function ($) {
  Drupal.behaviors.teiExposedFilters = {
    attach: function (context, settings) {
      $('.bef-datepicker').attr('placeholder', 'mm/dd/yyyy');
      $('.form-item-date-max label').text('To');
      // $('.bef-datepicker').attr('type', 'date');
      // $('.bef-datepicker').datepicker();

      // Fix for reset button on views exposed filters.
      $(document).delegate('.views-exposed-form [value="Reset"]', 'click', function (event) {
        window.location = window.location.href.split('?')[0];
        return false;
      });

    }
  };
}(jQuery));
