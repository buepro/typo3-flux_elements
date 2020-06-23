<?php

/*
 * This file is part of the package buepro/flux_elements.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Buepro\FluxElements\Integration\HookSubscribers;

class TableConfigurationPostProcessor implements \TYPO3\CMS\Core\Database\TableConfigurationPostProcessingHookInterface
{
    /**
     * Unsets autoload and plugAndPlay configuration from flux.
     *
     * @throws \TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationExtensionNotConfiguredException
     * @throws \TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationPathDoesNotExistException
     * @throws \TYPO3\CMS\Core\Exception
     */
    private function reviewFluxConfiguration()
    {
        $changedConfigurations = [];
        $extensionConfiguration = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
            \TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class
        );
        $fluxConfiguration = $extensionConfiguration->get('flux');
        $fluxElementsConfiguration = $extensionConfiguration->get('flux_elements');
        // Leaves in case automatic configuration is disabled
        if ($fluxElementsConfiguration['configureFlux'] === '0') {
            return;
        }
        // Configures autoload
        if ($fluxConfiguration['autoload'] === '1') {
            $extensionConfiguration->set('flux', 'autoload', '0');
            $changedConfigurations[] = 'autoload';
        }
        // Configures plugAndPlay
        if ($fluxConfiguration['plugAndPlay'] === '1') {
            $extensionConfiguration->set('flux', 'plugAndPlay', '0');
            $changedConfigurations[] = 'plugAndPlay';
        }
        // Notifies user regarding the configuration changes
        if ($changedConfigurations) {
            $languageService = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Localization\LanguageService::class);
            $text = sprintf(
                $languageService->sL('LLL:EXT:flux_elements/Resources/Private/Language/locallang.xlf:be.message.config'),
                implode(', ', $changedConfigurations)
            );
            $flashMessage = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
                \TYPO3\CMS\Core\Messaging\FlashMessage::class,
                $text,
                '',
                \TYPO3\CMS\Core\Messaging\FlashMessage::WARNING
            );
            $flashMessageService = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Messaging\FlashMessageService::class);
            $defaultFlashMessageQueue = $flashMessageService->getMessageQueueByIdentifier();
            $defaultFlashMessageQueue->enqueue($flashMessage);
        }
    }

    /**
     * Adjusts content element type selector section title
     */
    private function adjustContentElementTypeSelector()
    {
        $key = array_search(
            ['Buepro.FluxElements', '--div--'],
            $GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'],
            true
        );
        if ($key !== false) {
            $GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'][$key][0] =
                'LLL:EXT:flux_elements/Resources/Private/Language/locallang.xlf:tca.tt_content.CType.sectionTitle';
        }
    }

    /**
     * Disables flux page layouts (TCA)
     */
    private function disableFluxPageLayouts()
    {
        $extensionConfiguration = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
            \TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class
        );
        $fluxConfiguration = $extensionConfiguration->get('flux');
        $dokTypes = $fluxConfiguration['doktypes'];
        foreach ($GLOBALS['TCA']['pages']['types'] as $type => &$typeDetails) {
            if (!\TYPO3\CMS\Core\Utility\GeneralUtility::inList($dokTypes, $type)) {
                continue;
            }
            $search = '--div--;LLL:EXT:flux/Resources/Private/Language/locallang.xlf:pages.tx_fed_page_layoutselect,tx_fed_page_controller_action,tx_fed_page_controller_action_sub';
            if (strpos($typeDetails['showitem'], $search) === false) {
                continue;
            }
            $typeDetails['showitem'] = str_replace(
                $search,
                '',
                $typeDetails['showitem']
            );
        }
        unset($typeDetails);
    }

    /**
     * @throws \TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationExtensionNotConfiguredException
     * @throws \TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationPathDoesNotExistException
     * @throws \TYPO3\CMS\Core\Exception
     * @return void
     */
    public function processData()
    {
        $this->reviewFluxConfiguration();
        $this->adjustContentElementTypeSelector();
        $extensionConfiguration = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
            \TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class
        );
        $fluxElementsConfiguration = $extensionConfiguration->get('flux_elements');
        if ($fluxElementsConfiguration['disableFluxPageLayoutSelector'] === '1') {
            $this->disableFluxPageLayouts();
        }
    }
}
