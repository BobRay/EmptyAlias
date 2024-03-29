<?php
/**
 * EmptyAlias snippet for EmptyAlias extra
 *
 * Copyright 2012-2023 Bob Ray <https://bobsguides.com>
 * Created on 12-15-2012
 *
 * EmptyAlias is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * EmptyAlias is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * EmptyAlias; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package emptyalias
 */

/**
 * Description
 * -----------
 * Utility snippet to report Resources with empty aliases
 *
 * Variables
 * ---------
 * @var $modx modX
 * @var $scriptProperties array
 *
 * @package emptyalias
 **/

$prefix = $modx->getVersionData()['version'] >= 3
    ? 'MODX\Revolution\\'
    : '';

$modx->lexicon->load('emptyalias:default');

$resources = $modx->getCollection($prefix . 'modResource', array('alias' => ''));

$output = '';
if (empty($resources)) {
    $output .= '<p>' . $modx->lexicon('ea_no_empty_aliases'). '</p>';
} else {
    /* @var $resource modResource */
}
$output .= "\n<ul>";
foreach($resources as $resource) {
    $pagetitle = $resource->get('pagetitle');
    $resource->set('alias', $resource->cleanAlias($pagetitle));
    $resource->save();
    $output .= "\n<li>" . $pagetitle . ' (' . $resource->get('id') . ') -- ' . $modx->lexicon('fixed') . '</li>';
}
$output .= "\n</ul>";
$output .= "\n<p>" . $modx->lexicon('ea_finished') . '</p>';

return $output;