<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();

$arComponentParameters = array(
	"GROUPS" => array(
		"PICTURE" => array(
			"NAME" => GetMessage("PICTURE"),
			"SORT" => "200"
		),
		"FILTER" => array(
			"NAME" => GetMessage("FILTER"),
			"SORT" => "180"
		),
	),
	"PARAMETERS" => array(
		"ELEMENTS_COUNT" => array(
			 "PARENT" => "FILTER",
			 "NAME" => GetMessage("ELEMENTS_COUNT"),
			 "TYPE" => "STRING",
			 "DEFAULT" => "20"
		),
		"PICTURE_WIDTH" => array(
			 "PARENT" => "PICTURE",
			 "NAME" => GetMessage("PICTURE_WIDTH"),
			 "TYPE" => "STRING",
			 "DEFAULT" => "200"
		),
		"PICTURE_HEIGHT" => array(
			 "PARENT" => "PICTURE",
			 "NAME" => GetMessage("PICTURE_HEIGHT"),
			 "TYPE" => "STRING",
			 "DEFAULT" => "140"
		),
		"CACHE_TIME" => Array("DEFAULT" => "3600000"),
	)
);
?>