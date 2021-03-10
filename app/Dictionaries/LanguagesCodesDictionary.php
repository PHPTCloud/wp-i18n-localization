<?php
declare(strict_types = 1);

/**
 * @class LanguagesCodesDictionary
 * @package App\Dictionaries
 */

namespace App\Dictionaries;

class LanguagesCodesDictionary 
{
    /**
     * @var string
     */
    public const CODE_IT = 'it';
    public const CODE_RU = 'ru';
    public const CODE_EN = 'en';

    /**
     * @var string
     */
    public const TITLE_IT = 'italian';
    public const TITLE_RU = 'russian';
    public const TITLE_EN = 'english';

    /**
     * @var array
     */
    public const LIST = [
        self::CODE_IT => [
            'code' => self::CODE_IT,
            'title' => self::TITLE_IT,
        ],
        self::CODE_RU => [
            'code' => self::CODE_RU,
            'title' => self::TITLE_RU,
        ],
        self::CODE_EN => [
            'code' => self::CODE_EN,
            'title' => self::TITLE_EN,
        ],
    ];
}