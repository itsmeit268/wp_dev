//Upload this file in your theme folder, subfolder js
//eg. <theme_folder>/js/admin.js
jQuery(document).ready(function ($) {
    var frame;
    $('#upload_button').click(function() {
        
        event.preventDefault();

        // If the media frame already exists, reopen it.
        if ( frame ) {
          frame.open();
          return;
        }

        // Create a new media frame
        frame = wp.media({
          title: 'Select or Upload Image',
          button: {
            text: 'Use this Image'
          },
          multiple: false  // Set to true to allow multiple files to be selected
        });


        // When an image is selected in the media frame...
        frame.on( 'select', function() {

          // Get media attachment details from the frame state
          var attachment = frame.state().get('selection').first().toJSON();

          // Send the attachment id to our input field
          $('#wb_additional_file').val( attachment.url );
        });
    });

});