<?php
/*
Plugin Name: Go_To_Blank
Plugin URI: http://const.fr/gotoblank
Description: Force external links to open in a new tab/window
Author: Constantin Guay
Version: 1.0
Author URI: http://const.fr

Changelog : 
            1.0.0 : . First beta
*/

function add_blank_script() {
    // get domain name
    $this_domain = get_option('siteurl');
    ?>
    <script>
        jQuery('a[href^="http"]:not([href^="<?php echo($this_domain); ?>"])') 
            .add('a:not([href^="<?php echo($this_domain); ?>"])').attr('target','_blank');
    </script>
    <?php
}

add_action('wp_footer', add_blank_script);