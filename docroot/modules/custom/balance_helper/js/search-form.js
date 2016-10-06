
(function ($) {
  Drupal.behaviors.ghsaSearchForm = {
    attach: function (context, settings) {

      // Add placeholder to search form and change button text.
      $('#search-block-form .form-search').attr('placeholder', 'search');
      $('#search-block-form .button').attr('value', 'Search Query');
    }
  };
}(jQuery));
