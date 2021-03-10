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
}