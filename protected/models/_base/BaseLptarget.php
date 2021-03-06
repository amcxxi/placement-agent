<?php

/**
 * This is the model base class for the table "lptarget".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Lptarget".
 *
 * Columns in table "lptarget" available as properties of the model,
 * followed by relations of table "lptarget" available as properties of the model.
 *
 * @property string $id
 * @property string $lp_id
 * @property string $target_id
 *
 * @property Lp $lp
 * @property Target $target
 */
abstract class BaseLptarget extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'lptarget';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Lptarget|Lptargets', $n);
	}

	public static function representingColumn() {
		return 'id';
	}

	public function rules() {
		return array(
			array('lp_id, target_id', 'required'),
			array('lp_id, target_id', 'length', 'max'=>10),
			array('id, lp_id, target_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'lp' => array(self::BELONGS_TO, 'Lp', 'lp_id'),
			'target' => array(self::BELONGS_TO, 'Target', 'target_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'lp_id' => null,
			'target_id' => null,
			'lp' => null,
			'target' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('lp_id', $this->lp_id);
		$criteria->compare('target_id', $this->target_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}