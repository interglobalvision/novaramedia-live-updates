NovaraLiveUpdates = {
  init: function() {
    var _this = this;

    // Settings
    _this.interval = 60000;
    
    // Set interval
    setInterval( function() {
      _this.fetch();
    }, _this.interval);
  },

  fetch: function() {
    var _this = this;

    jQuery.get(document.location.href, _this.updateContent);
  },

  updateContent: function(data, status) {
    if ( status === 'success' ) {
      $oldContent = $('#updatable-content');
      $newContent = $(data).find('#updatable-content');

      if( $oldContent.html() !== $newContent.html() ) {
        $oldContent.html( $newContent.html() );
      }
    }
  }
};

(function( $ ) {
	'use strict';

  NovaraLiveUpdates.init();
  
})( jQuery );
