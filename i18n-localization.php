<?php
/**
 * Plugin Name: i18n WordPress localization
 * Description: "i18n WordPress localization" provide simple functionality to make your web-site multilingual
 * Version: 1.0.0
 * Author: Yudov Alexei
 * Author URI: https://github.com/PHPTCloud
 * License: GPL 2.0
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html#SEC1
 */

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/functions.php';

/**
 * Install plugin hook
 */
register_activation_hook(__FILE__, 'i18nl__activation');

/**
 * Uninstall plugin hook
 */
register_deactivation_hook(__FILE__, 'i18nl__deactivation');

/**
 * Register admin menu subpage
 */
add_action('admin_menu', 'i18nl__register_admin_menu_page');