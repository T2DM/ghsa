
(function ($) {
  Drupal.behaviors.ghsaJumpMenusForm = {
    attach: function (context, settings) {

      // Autosubmit for JumpMenusForm
      $('.balance-helper-jump-menus-form #edit-state').change(function() {
        window.location = '/state-laws/by-state/' + $('option:selected', this).val().toLowerCase();
      });

      $('.balance-helper-jump-menus-form #edit-issues').change(function() {
        window.location = '/state-laws/by-issue/' + $('option:selected', this).val().toLowerCase();
      });

    }
  };
}(jQuery));
