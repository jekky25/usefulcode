<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)
{
	die();
}

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class MyTestComponent extends \CBitrixComponent
{
	protected $errors = array();

	protected function prepareResult()
	{
		
	}

	protected function checkParams()
	{

		return true;
	}

	public function executeComponent()
	{
		global $APPLICATION;

		if (!$this->checkModules())
		{
			$this->showErrors();
			return;
		}

		if (!$this->checkParams())
		{
			$this->showErrors();
			return;
		}

		$this->prepareResult();
		$this->includeComponentTemplate();
	}

	protected function checkModules()
	{
		$errors = [];
		if(!empty($errors))
			$this->errors = array_merge($this->errors, $errors);

		return empty($errors);
	}

	protected function hasErrors()
	{
		return (count($this->errors) > 0);
	}

	protected function showErrors()
	{
		if(count($this->errors) <= 0)
			return;

		foreach($this->errors as $error)
			ShowError($error);
	}
}
