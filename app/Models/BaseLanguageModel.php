<?php
declare(strict_types = 1);

/**
 * @class BaseLanguageModel
 * @package App\Models
 */

namespace App\Models;

use App\Dictionaries\LanguagesCodesDictionary;

class BaseLanguageModel
{
    /**
     * @var string
     */
    protected const WORDPRESS_LANGUAGE_SEPARATOR = '-';

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $title;

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string $code 
     * @return self
     */
    public function setCode(string $code): self
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param string $country 
     * @return self
     */
    public function setCountry(string $country): self
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title 
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function __construct(string $language)
    {
        $language = explode(self::WORDPRESS_LANGUAGE_SEPARATOR, $language);
        $this->setCode(LanguagesCodesDictionary::LIST[$language[0]]['code']);
        $this->setTitle(LanguagesCodesDictionary::LIST[$language[0]]['title']);
        $this->setCountry($language[1]);
    }
}