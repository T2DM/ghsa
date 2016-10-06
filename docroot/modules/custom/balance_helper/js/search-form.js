
(function ($) {
  Drupal.behaviors.ghsaSearchForm = {
    attach: function (context, settings) {

      // Add placeholder to search form
      $('#search-block-form input').attr('placeholder', 'search');

    }
  };
}(jQuery));
