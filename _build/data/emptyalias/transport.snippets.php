<?php
/**
 * snippets transport file for EmptyAlias extra
 *
 * Copyright 2012-2017 by Bob Ray <https://bobsguides.com>
 * Created on 12-15-2012
 *
 * @package emptyalias
 * @subpackage build
 */

if (! function_exists('stripPhpTags')) {
    function stripPhpTags($filename) {
        $o = file_get_contents($filename);
        $o = str_replace('<' . '?' . 'php', '', $o);
        $o = str_replace('?>', '', $o);
        $o = trim($o);
        return $o;
    }
}
/* @var $modx modX */
/* @var $sources array */
/* @var xPDOObject[] $snippets */


$snippets = array();

$snippets[1] = $modx->newObject('modSnippet');
$snippets[1]->fromArray(array(
    'id' => '1',
    'property_preprocess' => '',
    'name' => 'EmptyAlias',
    'description' => 'Utility snippet to report Resources with empty aliases',
    'properties' => '',
), '', true, true);
$snippets[1]->setContent(file_get_contents($sources['source_core'] . '/elements/snippets/emptyalias.snippet.php'));

return $snippets;
