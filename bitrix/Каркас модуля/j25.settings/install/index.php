<?
use Bitrix\Main\Config\Option;
use \Bitrix\Main\Entity\Base;
use \Bitrix\Main\Loader;
use Bitrix\Main\Application;
use J25\settings\SettingTable;

Class j25_settings extends CModule
{
	var $MODULE_ID = "j25.settings";
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;
	var $MODULE_GROUP_RIGHTS = "Y";
	var $PARTNER_NAME;
	var $PARTNER_URI;

	public function __construct()
	{
		$arModuleVersion = [];
		include(__DIR__.'/version.php');
		if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion))
		{
			$this->MODULE_VERSION = $arModuleVersion["VERSION"];
			$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
			$this->MODULE_NAME = GetMessage("J25_SETTINGS_MODULE_NAME");
			$this->MODULE_DESCRIPTION = GetMessage("J25_SETTINGS_MODULE_DESCRIPTION");
			$this->PARTNER_NAME = GetMessage("J25_SETTINGS_PARTNER_NAME");
			$this->PARTNER_URI = GetMessage("J25_SETTINGS_PARTNER_URL");
		}
	}

	/**
	* Do install the module
	* @return void
	*/
	function DoInstall()
	{
		RegisterModule($this->MODULE_ID);
		$this->installFiles();
		$this->installDB();
	}

	/**
	* Do uninstall the module
	* @return void
	*/
	function DoUninstall()
	{
		$this->unInstallDB();
		$this->uninstallFiles();
		UnRegisterModule($this->MODULE_ID);
	}

	/**
	 * Install DB, events, etc.
	 * @return bool
	 */
	public function installDB(): bool
	{
		Loader::includeModule($this->MODULE_ID);
		Base::getInstance(SettingTable::class)->getDBTableName();
		if (!Application::getConnection(SettingTable::getConnectionName())->isTableExists(Base::getInstance(SettingTable::class)->getDBTableName())) {
			Base::getInstance(SettingTable::class)->createDbTable();
		}
		return true;
	}

	/**
	 * Unnstall DB, events, etc.
	 * @return bool
	 */
	public function unInstallDB(): bool
	{
		Loader::includeModule($this->MODULE_ID);
		Application::getConnection(SettingTable::getConnectionName())->queryExecute('DROP TABLE IF EXISTS ' . Base::getInstance(SettingTable::class)->getDBTableName());
		Option::delete($this->MODULE_ID);
		return true;
	}

	/**
	 * Install files
	 * @return bool
	 */
	function installFiles()
	{
		CopyDirFiles(
			__DIR__ . "/admin",
			$_SERVER["DOCUMENT_ROOT"] . "/bitrix/admin",
			true, 
			true  
		);
		return true;
	}

	/**
	 * Uninstall files
	 * @return bool
	 */
	function unInstallFiles()
	{
		DeleteDirFiles(
			__DIR__ . "/admin",
			$_SERVER["DOCUMENT_ROOT"] . "/bitrix/admin"
		);
		return true;
	}
}