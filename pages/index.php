<?php

/**
 * Addon
 *
 * @author 
 *
 * 
 */

$addon = rex_addon::get('nldesginer');

echo rex_view::title($addon->i18n('nld_title'));

rex_be_controller::includeCurrentPageSubPath();
