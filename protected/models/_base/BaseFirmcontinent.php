<?php

/**
 * This is the model base class for the table "firmcontinent".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Firmcontinent".
 *
 * Columns in table "firmcontinent" available as properties of the model,
 * followed by relations of table "firmcontinent" available as properties of the model.
 *
 * @property string $id
 * @property string $firm_id
 * @property string $continent_id
 *
 * @property Continent $continent
 * @property Firm $firm
 */
abstract class BaseFirmcontinent extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'firmcontinent';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Firmcontinent|Firmcontinents', $n);
	}

	public static function representingColumn() {
		return 'id';
	}

	public function rules() {
		return array(
			array('firm_id, continent_id', 'required'),
			array('firm_id, continent_id', 'length', 'max'=>10),
			array('id, firm_id, continent_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'continent' => array(self::BELONGS_TO, 'Continent', 'continent_id'),
			'firm' => array(self::BELONGS_TO, 'Firm', 'firm_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'firm_id' => null,
			'continent_id' => null,
			'continent' => null,
			'firm' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('firm_id', $this->firm_id);
		$criteria->compare('continent_id', $this->continent_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}