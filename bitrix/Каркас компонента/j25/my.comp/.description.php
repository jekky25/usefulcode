<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
$arComponentDescription = array(
	'NAME' => GetMessage('NAME'),
	'DESCRIPTION' => GetMessage('DESCRIPTION'),
	'ICON' => '/images/icon.gif',
	'SORT' => 20,
	'CACHE_PATH' => 'Y',
	"PATH" => array(
		"ID" => "J25",
		"CHILD" => array(
			"ID" => "security",
			"NAME" => getMessage("NAME")
		)
	),
);