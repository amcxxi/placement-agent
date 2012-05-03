<?php

/**
 * This is the model base class for the table "continent".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Continent".
 *
 * Columns in table "continent" available as properties of the model,
 * followed by relations of table "continent" available as properties of the model.
 *
 * @property string $id
 * @property string $name
 *
 * @property Employeescontinent[] $employeescontinents
 * @property Firmcontinent[] $firmcontinents
 * @property Officecontinent[] $officecontinents
 */
abstract class BaseContinent extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'continent';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Continent|Continents', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('name', 'required'),
			array('name', 'length', 'max'=>50),
			array('id, name', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'employeescontinents' => array(self::HAS_MANY, 'Employeescontinent', 'continent_id'),
			'firmcontinents' => array(self::HAS_MANY, 'Firmcontinent', 'continent_id'),
			'officecontinents' => array(self::HAS_MANY, 'Officecontinent', 'continent_id'),
            'lpcontinents' => array(self::HAS_MANY, 'Lpcontinent', 'continent_id'),
            'lps' => array(self::MANY_MANY, 'Lp', 'lpcontinent(continent_id, lp_id)'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'name' => Yii::t('app', 'Name'),
			'employeescontinents' => null,
			'firmcontinents' => null,
			'officecontinents' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('name', $this->name, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}
