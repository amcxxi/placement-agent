<?php

/**
 * This is the model base class for the table "gpcontinent".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Gpcontinent".
 *
 * Columns in table "gpcontinent" available as properties of the model,
 * followed by relations of table "gpcontinent" available as properties of the model.
 *
 * @property string $id
 * @property string $gp_id
 * @property string $continent_id
 *
 * @property Continent $continent
 * @property Gp $gp
 */
abstract class BaseGpcontinent extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'gpcontinent';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Gpcontinent|Gpcontinents', $n);
	}

	public static function representingColumn() {
		return 'id';
	}

	public function rules() {
		return array(
			array('gp_id, continent_id', 'required'),
			array('gp_id, continent_id', 'length', 'max'=>10),
			array('id, gp_id, continent_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'continent' => array(self::BELONGS_TO, 'Continent', 'continent_id'),
			'gp' => array(self::BELONGS_TO, 'Gp', 'gp_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'gp_id' => null,
			'continent_id' => null,
			'continent' => null,
			'gp' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('gp_id', $this->gp_id);
		$criteria->compare('continent_id', $this->continent_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}