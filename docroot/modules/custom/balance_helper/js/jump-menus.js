
(function ($) {
  Drupal.behaviors.ghsaJumpMenusForm = {
    attach: function (context, settings) {

      // Autosubmit for JumpMenusForm
      $(".balance-helper-jump-menus-form #edit-state").change(function() {
          window.location = $(".balance-helper-jump-menus-form #edit-state option:selected").val();
      });
      $(".balance-helper-jump-menus-form #edit-issues").change(function() {
          window.location = $(".balance-helper-jump-menus-form #edit-issues option:selected").val();
      });

    }
  };
}(jQuery));
