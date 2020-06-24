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
     * @todo Becomes obsolete with core change as proposed under https://review.typo3.org/c/Packages/TYPO3.CMS/+/64068
     * @param array $parameters
     * @param null $ref
     */
    public function colPosListItemProcFunc(array $parameters, $ref = null)
    {
        // The resulting item list
        $items = [];
        // Get entries from gridelements
        if (ExtensionManagementUtility::isLoaded('gridelements')) {
            GeneralUtility::callUserFunction(
                \GridElementsTeam\Gridelements\Backend\ItemsProcFuncs\ColPosList::class . '->itemsProcFunc',
                $parameters,
                $ref
            );
            $items = $parameters['items'];
        }
        // Get entries from flux
        parent::colPosListItemProcFunc($parameters);
        // Merge items
        foreach ($parameters['items'] as $item) {
            if (!in_array($item, $items)) {
                $items[] = $item;
            }
        }
        $parameters['items'] = $items;
    }
}
