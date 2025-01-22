<?php

IncludeModuleLangFile(__FILE__);
if ($APPLICATION->GetGroupRight("j25.settings") != "D")
{
	$aMenu = [];
	$aMenu[] = array(
		'parent_menu' => 'global_menu_services',
		'section'     => 'abtest',
		'sort'        => 300,
		'text'        => GetMessage('J25_SETTINGS_TEXT'),
		'title'       => GetMessage('J25_SETTINGS_TEXT'),
		'url'         => 'j25_settings_settings.php?lang='.LANG,
		'icon'        => 'j25_setting_menu_icon',
		'page_icon'   => 'j25_setting_menu_icon',
		'items_id'    => 'menu_abtest',
		'items'       => []
	);
}
return !empty($aMenu) ? $aMenu : false;
