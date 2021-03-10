<?php
declare(strict_types = 1);

/**
 * @class AdminPageController
 * @package App\Controllers
 */

namespace App\Controllers;

use App\Client\LocalizationClient;

class AdminPageController
{
    /**
     * @return array
     */
    public static function list(): array
    {
        $client = new LocalizationClient();
        return $client->languages();
    }

    /**
     * @param array $localization
     * @return bool
     */
    public static function store(array $localization): bool
    {
        $client = new LocalizationClient();
        return $client->storeLocalization($localization);
    }
}