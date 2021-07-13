<?php

/*
 * This file is part of the package buepro/flux_elements.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

$EM_CONF[$_EXTKEY] = [
    'title'            => 'Flux elements',
    'description'      => 'Provides content elements powered by flux and bootstrap. Available elements: container, columns, tabs, accordion, tile unit and card.',
    'category'         => 'misc',
    'version'          => '1.3.1',
    'state'            => 'stable',
    'clearCacheOnLoad' => 1,
    'author'           => 'Roman Büchler',
    'author_email'     => 'rb@buechler.pro',
    'constraints'      => [
        'depends'   => [
            'typo3'                 => '10.4.11-10.4.99',
            'flux'                  => '9.3.0-9.99.99',
            'vhs'                   => '6.0.5-6.99.99',
        ],
        'conflicts' => [],
        'suggests'  => [
            'gridelements'          => '',
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Buepro\\FluxElements\\' => 'Classes'
        ],
    ],
];
