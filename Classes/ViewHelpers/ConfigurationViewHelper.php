<?php

declare(strict_types=1);

namespace StudioMitte\FriendlyCaptcha\ViewHelpers;

use StudioMitte\FriendlyCaptcha\Configuration;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class ConfigurationViewHelper extends AbstractViewHelper
{
    protected $escapeOutput = false;

    public function render(): array
    {
        $configuration = new Configuration();
        return [
            'languageIsoCode' => $this->getLanguageIsoCode(),
            'siteKey' => $configuration->getSiteKey(),
            'verifyUrl' => $configuration->getVerifyUrl(),
            'puzzleUrl' => $configuration->getPuzzleUrl(),
            'jsPath' => $configuration->getJsPath(),
            'enabled' => $configuration->isEnabled(),
        ];
    }

    protected function getLanguageIsoCode(): string
    {
        $language = $GLOBALS['TYPO3_REQUEST']->getAttribute('language');
        if (!$language) {
            return '';
        }
        return $language->getLocale()->getLanguageCode();
    }
}
