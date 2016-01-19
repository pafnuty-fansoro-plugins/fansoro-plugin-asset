<?php
/**
 *  Asset Plugin
 *
 *  @package Fansoro
 *  @subpackage Plugins
 *  @author Pavel Belousov / pafnuty
 *  @version 2.1.0
 *  @license https://github.com/pafnuty/fansoro-plugin-asset/blob/master/LICENSE MIT
 */

require_once PLUGINS_PATH . '/asset/asset.class.php';

Action::add('asset_folder', function (array $folders = array(), array $excludes = array()) {

	$assetConfig = Fansoro::$plugins['asset'];

	$folders  = array_unique(array_filter(array_merge($folders, (array) $assetConfig['folders'])));
	$excludes = array_unique(array_filter(array_merge($excludes, (array) $assetConfig['excludes'])));

	foreach ($folders as $k => $folder) {
		$folders[$k] = '/themes/' . Fansoro::$site['theme'] . $folder;
	}

	Asset::add(
		$folders,
		$excludes
	);
});

Action::add('asset_file', function ($fileName = '', $attributes = '') {

	if ($fileName != '') {
		$fileName = '/themes/' . Fansoro::$site['theme'] . $fileName;
		Asset::addFile(
			$fileName,
			$attributes
		);
	}
});
