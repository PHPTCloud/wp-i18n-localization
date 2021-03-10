<?php

use App\Client\LocalizationClient;
use App\Controllers\AdminPageController;

const PLUGIN_NAME = 'i18n-localization';

/**
 * Plugin activation
 */
function i18nl__activation(): bool
{
    return true;
}

/**
 * Plugin deactivation
 */
function i18nl__deactivation(): bool
{
    return true;
}

/**
 * Register admin menu subpage
 */
function i18nl__register_admin_menu_page()
{
    $options = [
        'options-general.php',
        'i18n plugin settings',
        'i18n localization',
        'manage_options',
        'i18n-plugin-settings-page',
        'i18nl__admin_menu_page_view',
    ];
    add_submenu_page(...$options);    
}

/**
 * Function for view admin menu page content
 */
function i18nl__admin_menu_page_view() {
    $languages = AdminPageController::list();
    require_once __DIR__ . '/views/admin-page.php';
}

/**
 * Get localized word
 * 
 * @param string $index
 * @return string
 */
function i18nl__get(string $index, bool $capitalize): string
{
    $i18nClient = new LocalizationClient();
    return $i18nClient->i18n($index);
}

/**
 * @return string
 */
function i18nl_path()
{
    return plugins_url(PLUGIN_NAME);
}

/**
 * @param string $chunk
 * @return string
 */
function i18nl_assets(string $chunk)
{
    return plugins_url(PLUGIN_NAME) . '/views/assets/' . $chunk;
}