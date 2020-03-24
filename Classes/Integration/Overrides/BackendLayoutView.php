<?php

/*
 * This file is part of the package buepro/flux_elements.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Buepro\FluxElements\Integration\Overrides;

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class BackendLayoutView extends \FluidTYPO3\Flux\Integration\Overrides\BackendLayoutView
{
    /**
     * Workaround for flux issue #1743.
     * Combines items in the colPos field from tt_content with the ones from gridelements and flux.
     *
     * @param array $parameters
     * @param null $ref
     */
    public function colPosListItemProcFunc(array $parameters, $ref = null)
    {
        if (ExtensionManagementUtility::isLoaded('gridelements')) {
            // Gets entries from gridelements
            GeneralUtility::callUserFunction(
                \GridElementsTeam\Gridelements\Backend\ItemsProcFuncs\ColPosList::class . '->itemsProcFunc',
                $parameters,
                $ref
            );
        } else {
            // Gets entries from core
            GeneralUtility::callUserFunction(
                \TYPO3\CMS\Backend\View\BackendLayoutView::class . '->colPosListItemProcFunc',
                $parameters,
                $ref
            );
        }
        // Gets entries from flux
        parent::colPosListItemProcFunc($parameters);
    }
}
