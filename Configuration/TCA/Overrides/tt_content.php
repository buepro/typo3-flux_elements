<?php

/*
 * This file is part of the package buepro/flux_elements.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

defined('TYPO3_MODE') || die('Access denied.');

$GLOBALS['TCA']['tt_content']['columns']['colPos']['config']['itemsProcFunc'] =
    \Buepro\FluxElements\Integration\Overrides\BackendLayoutView::class . '->colPosListItemProcFunc';
