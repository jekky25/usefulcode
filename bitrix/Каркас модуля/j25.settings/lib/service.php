<?php
namespace J25\settings;

use J25\settings\SettingTable;

class Service
{
	private ?array $setting = null;

	public function __construct()
	{
		if ($this->setting === null) $this->getAll();
	}

	/**
	* Update data in the model
	* @param array $data
	* @return void
	*/
	public function updateData(array $data = null)
	{
		if ($data === null) return false;
		foreach ($data as $key => $value)
		{
			SettingTable::update($key, ['VALUE' => $value]);
		}
	}

	/**
	* Get the all list of the settings
	* @return array
	*/
	public function getAll() 
	{
		$res = SettingTable::getList(['select' => ['*']]);
		$items = [];
		while ($arItem = $res->fetch()) {
			$items[$arItem['NAME']] = $arItem;
		}
		$this->setting = $items;
		return $this->setting;
	}

	/**
	* Get a message by the code
	* @param string $name
	* @return string|void
	*/
	public function getMessage($name)
	{
		$val = $this->setting[$name]['VALUE'];
		if (empty($val)) return null;
		return $val;
	}
}