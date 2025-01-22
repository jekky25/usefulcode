<?php
namespace J25\settings;

use Bitrix\Main;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\StringField;
use Bitrix\Main\ORM\Fields\TextField;

class SettingTable extends Main\Entity\DataManager
{
	/**
	 * Returns DB table name for entity.
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return 'j25_settings';
	}

	/**
	 * Returns entity map definition.
	 *
	 * @return array
	 * @throws Main\SystemException
	 */
	public static function getMap()
	{
		return array(
			new IntegerField('ID', array(
				'primary' => true,
				'autocomplete' => true,
				'title' => Loc::getMessage('SECTION_ENTITY_ID_FIELD'),
			)),
			new StringField('NAME', array(
				'validation' => array(__CLASS__, 'validateName'),
				'title' => Loc::getMessage('SECTION_ENTITY_NAME_FIELD'),
			)),
			new TextField('VALUE', array(
				'title' => Loc::getMessage('SECTION_ENTITY_DESCRIPTION_FIELD'),
			)),
			new StringField('TITLE', array(
				'validation' => array(__CLASS__, 'validateName'),
				'title' => Loc::getMessage('SECTION_ENTITY_NAME_FIELD'),
			)),
		);
	}


	/**
	 * Returns validators for NAME field.
	 *
	 * @return array
	 */
	public static function validateName()
	{
		return array(
			new Main\Entity\Validator\Length(null, 255),
		);
	}
}