
(function ($) {
  Drupal.behaviors.ghsaJumpMenusForm = {
    attach: function (context, settings) {

      // Autosubmit for JumpMenusForm
      // $("#page-changer select").change(function() {
      //     window.location = $("#page-changer select option:selected").val();
      // });
      $('.balance-helper-jump-menus-form').css({'background':'red'});
      alert('WORKS!');

    }
  };
}(jQuery));
