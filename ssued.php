<?php
/**
 * Plugin Name: Stupid Simple Update Email Disabler
 * Description: Disables successful auto-update emails for WordPress core, plugins and themes.
 * Version: 1.0.1
 * Author: Dynamic Technologies
 * Author URI: https://bedynamic.tech
 * Plugin URI: https://github.com/bedynamictech/Stupid-Simple-Update-Email-Disabler
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$hooks = [
    'auto_core_update_send_email',
    'auto_plugin_update_send_email',
    'auto_theme_update_send_email',
];

foreach ( $hooks as $hook ) {
    add_filter( $hook, 'ssued_disable_success_email', 10, 4 );
}

function ssued_disable_success_email( $send, $type, $update, $result ) {
    return 'success' !== $type && $send;
}
