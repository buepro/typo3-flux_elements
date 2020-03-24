<?php

/*
 * This file is part of the package buepro/flux_elements.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

defined('TYPO3_MODE') || die('Access denied.');

(function () {
    TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
        'flux_elements',
        'Configuration/TypoScript',
        'Flux elements'
    );
})();
