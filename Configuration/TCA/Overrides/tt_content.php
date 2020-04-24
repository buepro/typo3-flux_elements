<?php

/*
 * This file is part of the package buepro/flux_elements.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

defined('TYPO3_MODE') || die('Access denied.');

// Correct colPos entries (merge entries from core, gridelements and flux)
$GLOBALS['TCA']['tt_content']['columns']['colPos']['config']['itemsProcFunc'] =
    \Buepro\FluxElements\Integration\Overrides\BackendLayoutView::class . '->colPosListItemProcFunc';

// Enable images to be exported by impexp-plugin
$GLOBALS['TCA']['tt_content']['columns']['pi_flexform']['config']['ds']['*,fluxelements_card'] =
    'FILE:EXT:flux_elements/Configuration/FlexForms/Card.xml';
