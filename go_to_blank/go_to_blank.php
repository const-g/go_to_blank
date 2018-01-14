<?php
/*
Plugin Name: Cog_g's Go To Blank
Plugin URI: https://const.fr/gotoblank
Description: Force external links to open in a new tab/window
Author: Constantin Guay
Version: 1.2.0
Author URI: https://const.fr

Changelog :
    1.2.0 : . add noopener to protect external links
            . more info on https://mathiasbynens.github.io/rel-noopener/
    1.1.0 : . Do not modify # links or relative links
            . Add an class to be target by css in the theme
    1.0.1 : . Removed the .add() who were not needed.
    1.0.0 : . First beta
*/

function add_blank_script() {
    // get domain name
    $this_domain = get_option('siteurl');
    ?>
    <script>
        jQuery('a[href^="http"]:not( [href^="<?php echo($this_domain); ?>"] ):not( [href^=\'#\'] ):not( [href^=\'/\'] )')
            .attr('target','_blank')
            .attr('rel', 'noopener')
            .addClass('external-link');
    </script>
    <?php
}

add_action('wp_footer', 'add_blank_script');
