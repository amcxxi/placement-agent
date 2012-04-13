<?php

/**
 * This is the model base class for the table "officeregion".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Officeregion".
 *
 * Columns in table "officeregion" available as properties of the model,
 * followed by relations of table "officeregion" available as properties of the model.
 *
 * @property string $id
 * @property string $office_id
 * @property string $region_id
 *
 * @property Region $region
 * @property Office $office
 */
abstract class BaseOfficeregion extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'officeregion';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Officeregion|Officeregions', $n);
	}

	public static function representingColumn() {
		return 'id';
	}

	public function rules() {
		return array(
			array('office_id, region_id', 'required'),
			array('office_id, region_id', 'length', 'max'=>10),
			array('id, office_id, region_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'region' => array(self::BELONGS_TO, 'Region', 'region_id'),
			'office' => array(self::BELONGS_TO, 'Office', 'office_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'office_id' => null,
			'region_id' => null,
			'region' => null,
			'office' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('office_id', $this->office_id);
		$criteria->compare('region_id', $this->region_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}