<?php
declare(strict_types = 1);

/**
 * @class StorageClient
 * @package App\Client
 */

namespace App\Client;

use App\Dictionaries\LanguagesCodesDictionary;
use App\Exceptions\NotFoundLanguageFolderException;
use App\Exceptions\NotFoundStorageFolderException;
use App\Models\BaseLanguageModel;

class StorageClient
{
    /**
     * @var string
     */
    protected const STORAGE_FOLDER_NAME = 'storage';

    /**
     * @var string
     */
    protected const STORAGE_PATH = __DIR__ . '/../../' . self::STORAGE_FOLDER_NAME;

    /**
     * @var string
     */
    protected const LOCALIZATION_FILENAME = 'i18n.json';

    /**
     * @var BaseLanguageModel
     */
    protected $currentLanguage;

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

    /**
     * @param BaseLanguageModel $currentLanguage
     * @return self
     */
    public function __construct(BaseLanguageModel $currentLanguage)
    {
        $this->setCurrentLanguage($currentLanguage);
    }

    /**
     * @return bool
     */
    public function initialize(): bool
    {
        try {
            $this->checkStorageRootFolder();

            $this->checkLanguageFolder();

            $this->getLocalization($this->getCurrentLanguage()->getCode(), true);

            return true;
        }
        catch(NotFoundStorageFolderException $e)
        {
            print_r($e);
            return false;
        }
    }

    /**
     * @param bool $triedMakeFolder = false
     * @return bool
     * @throws NotFoundStorageFolderException
     */
    protected function checkStorageRootFolder(bool $triedMakeFolder = false): bool
    {
        if(file_exists(self::STORAGE_PATH)) {
            return true;
        }
        else if($triedMakeFolder === false)
        {
            mkdir(self::STORAGE_PATH);
            return $this->checkStorageRootFolder(true);
        }

        throw new NotFoundStorageFolderException('Can\'t find "'.self::STORAGE_FOLDER_NAME.'" folder in root of plugin');
    }

    /**
     * @param bool $triedMakeFolder = false
     * @return bool
     * @throws NotFoundLanguageFolderException
     */
    protected function checkLanguageFolder(bool $triedMakeFolder = false): bool
    {
        $languageFolderPath = self::STORAGE_PATH 
            . '/'
            . $this->getCurrentLanguage()->getCode();

        if(file_exists($languageFolderPath)) {
            return true;
        }
        else if($triedMakeFolder === false)
        {
            mkdir($languageFolderPath);
            return $this->checkLanguageFolder(true);
        }

        throw new NotFoundLanguageFolderException('Can\'t find "'.$languageFolderPath.'" folder');
    }

    /**
     * @param string $code
     * @param bool $createIfNotExist = false
     * @return array|bool
     */
    public function getLocalization(string $code, bool $createIfNotExist = false)
    {
        $localizationFilePath = self::STORAGE_PATH 
            . '/'
            . $code
            . '/'
            . self::LOCALIZATION_FILENAME;

        if(file_exists($localizationFilePath)) {
            return (array) json_decode(file_get_contents($localizationFilePath));
        }

        if($createIfNotExist === true) {
            file_put_contents($localizationFilePath, json_encode('{}'));
            return [];
        }

        return false;
    }

    /**
     * @return array
     */
    public function getLanguages(): array
    {
        $files = scandir(self::STORAGE_PATH);
        $languages = [];

        foreach($files as $index => $file) {
            if($file === '.' || $file === '..') {
                unset($files[$index]);
            }
            else if(isset(LanguagesCodesDictionary::LIST[$file])) {
                $languages[] = array_merge(LanguagesCodesDictionary::LIST[$file], [
                    'localization' => $this->getLocalization($file) 
                        ? $this->getLocalization($file)
                        : []
                ]);
            }
        }

        return $languages;
    }
}