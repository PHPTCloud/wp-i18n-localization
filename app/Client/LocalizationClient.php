<?php
declare(strict_types = 1);

/**
 * @class LocalizationController
 * @package App\Client
 */

namespace App\Client;

use App\Models\BaseLanguageModel;

class LocalizationClient
{
    /**
     * @var StorageClient
     */
    protected $storage;

    /**
     * @var BaseLanguageModel
     */
    protected $currentLanguage;

    /**
     * @return StorageClient|null
     */
    public function getStorage(): ?StorageClient
    {
        return $this->storage;
    }

    /**
     * @return BaseLanguageModel|null
     */
    public function getCurrentLanguage(): ?BaseLanguageModel
    {
        return $this->currentLanguage;
    }

    /**
     * @param BaseLanguageModel $currentLanguage 
     * @return self
     */
    public function setCurrentLanguage(BaseLanguageModel $currentLanguage): self
    {
        $this->currentLanguage = $currentLanguage;
        return $this;
    }

    public function __construct()
    {
        $language = new BaseLanguageModel(get_bloginfo('language'));
        $this->currentLanguage = $language;
        $this->storage = new StorageClient($language);

        $this->storage->initialize();
    }

    /**
     * @param string $index
     * @return string
     */
    public function i18n(string $index): string
    {
        $code = $this->getCurrentLanguage()->getCode();
        $i18n = $this->getStorage()->getLocalization($code);
        return isset($i18n[$index]) ? $i18n[$index] : '';
    }

    /**
     * @return array
     */
    public function languages(): array
    {
        return $this->getStorage()->getLanguages();
    }

    /**
     * @param array $localization
     * @return bool
     */
    public function storeLocalization(array $localization): bool
    {
        return $this->getStorage()->storeLocalization($localization);
    }
}