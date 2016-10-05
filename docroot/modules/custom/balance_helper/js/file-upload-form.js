(function ($) {
  Drupal.behaviors.teiFileUploadForm = {
    attach: function (context, settings) {
      $('.layout-region-node-secondary').hide();
      $('.layout-region-node-main').css({'float':'none', 'width':'100%'});
      $('.field--name-title').hide();
      $('.dropbutton-widget').hide();
      $('.dropbutton-wrapper').html( '<a href="/admin/content/files" class="button button--primary">See all files</a>' );
      $('.breadcrumb li:nth-child(5)').html(' Add');
    }
  };
}(jQuery));
