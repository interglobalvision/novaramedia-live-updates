(function() {
  tinymce.PluginManager.add( 'divider', function( editor, url ) {

    // Add Button to Visual Editor Toolbar
    editor.addButton('divider', {
      title: 'Add liveblog divider',
      cmd: 'divider'
    });

    jQuery('.mce-i-divider').addClass('dashicons-before dashicons-clock');

    // Add Command when Button Clicked
    editor.addCommand('divider', function() {

      var now = new Date();
      var insert = '<h4 class="liveblog-update-heading">Update: ' + now.getHours() + ':' + now.getMinutes() + '</h4>'

      return editor.insertContent(insert);

    });

  });
})();