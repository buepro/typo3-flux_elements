<?php

/*
 * This file is part of the package buepro/flux_elements.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

$EM_CONF[$_EXTKEY] = [
    'title'            => 'Flux element',
    'description'      => 'Provides content elements powered by flux and bootstrap. Available elements: container, columns, tabs, accordion, tile unit and card.',
    'category'         => 'misc',
    'version'          => '1.0.0',
    'state'            => 'stable',
    'clearCacheOnLoad' => 1,
    'author'           => 'Roman Büchler',
    'author_email'     => 'rb@buechler.pro',
    'constraints'      => [
        'depends'   => [
            'typo3'                 => '9.5.0-10.2.99',
            'flux'                  => '9.3.2-9.99.99',
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
