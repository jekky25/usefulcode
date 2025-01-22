<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");
use Bitrix\Main\Localization\Loc;
use J25\settings\SettingTable;
use J25\settings\Service;

$MODULE_ID = "j25.settings";
Loc::loadMessages(__FILE__);
$module_mode = CModule::IncludeModuleEx($MODULE_ID);

$APPLICATION->SetTitle(Loc::getMessage('J25_SETTTINGS_TITLE'));
$service = new Service;

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");

$right = $APPLICATION->GetGroupRight($MODULE_ID);

if (!$USER->IsAdmin() && $right < "W") $APPLICATION->AuthForm(GetMessage("ACCESS_DENIED"));

if($REQUEST_METHOD=="POST" && $_POST['saveperm'] == 'Y' && check_bitrix_sessid())
{
	$service->updateData($_POST['data']);
}

$itemsRes = SettingTable::getList([
	'select' => ['*']
]);
?>
<form method="POST" action="<?= $APPLICATION->GetCurPage()?>?lang=<?= LANGUAGE_ID?>" name="st_access_form">
<input type="hidden" name="site" value="<?= htmlspecialcharsbx($site) ?>">
<input type="hidden" name="saveperm" value="Y">
<input type="hidden" id="bxst_clear_all" name="clear_all" value="N">
<input type="hidden" name="lang" value="<?= LANGUAGE_ID?>">
<?= bitrix_sessid_post()?>
<?
$aTabs = [
	["DIV" => "j25.settings_settings", "TAB" => GetMessage("J25_ST_SETTINGS"), "ICON" => "fileman", "TITLE" => GetMessage("J25_ST_SETTINGS_TITLE")],
];

$tabControl = new CAdminTabControl("tabControl", $aTabs);
$tabControl->Begin();
$tabControl->BeginNextTab();?>
<tr>
	<td colspan="2">
		<table>
<?
while ($arItem = $itemsRes->fetch()) {
?>
	<tr>
		<td class="adm-detail-content-cell-l" width="40%"><?=$arItem['TITLE']?></td>
		<td class="adm-detail-content-cell-r" width="60%"><textarea cols="60" rows="5" name="data[<?=$arItem['ID']?>]"><?=$arItem['VALUE']?></textarea></td>
	</tr>
<?
}
?>
		</table>
	</td>
</tr>
<?$tabControl->EndTab();
$tabControl->Buttons(
	array(
		"disabled" => false,
		"back_url" => "/bitrix/admin/?lang=".LANGUAGE_ID."&".bitrix_sessid_get()
	)
);
$tabControl->End();?>
</form>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
