<?php

/*
 * This file is part of the package buepro/flux_elements.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

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

    /**
     * Upgrade wizards
     */
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update'][\Buepro\FluxElements\Updates\CardContentElementUpdate::class]
        = \Buepro\FluxElements\Updates\CardContentElementUpdate::class;
})();
