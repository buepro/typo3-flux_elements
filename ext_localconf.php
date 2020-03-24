<?php

defined('TYPO3_MODE') || die('Access denied.');

(function () {

    /**
     * Registers provider for content elements
     */
    \FluidTYPO3\Flux\Core::registerProviderExtensionKey(
        'Buepro.FluxElements',
        'Content'
    );

    /**
     * Registers hook to modify TCA (after flux modified it)
     */
    if (TYPO3_MODE === 'BE') {
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['GLOBAL']['extTablesInclusion-PostProcessing']['flux_elements'] =
            \Buepro\FluxElements\Integration\HookSubscribers\TableConfigurationPostProcessor::class;
    }
})();
