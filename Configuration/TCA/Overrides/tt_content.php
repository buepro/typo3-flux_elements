<?php
defined ('TYPO3_MODE') || die('Access denied.');

$GLOBALS['TCA']['tt_content']['columns']['colPos']['config']['itemsProcFunc'] =
    \Buepro\FluxElements\Integration\Overrides\BackendLayoutView::class . '->colPosListItemProcFunc';
