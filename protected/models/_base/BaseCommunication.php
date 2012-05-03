<?php

/**
 * This is the model base class for the table "communication".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Communication".
 *
 * Columns in table "communication" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $firm_id
 * @property integer $gp_id
 * @property integer $lp_id
 * @property integer $status_id
 * @property integer $client_mandate_id
 * @property integer $user_id
 * @property integer $employees_id
 *
 */
abstract class BaseCommunication extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'communication';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Communication|Communications', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('name', 'required'),
			array('firm_id, gp_id, lp_id, status_id, client_mandate_id, user_id, employees_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('description', 'safe'),
			array('description, firm_id, gp_id, lp_id, status_id, client_mandate_id, user_id, employees_id', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, name, description, firm_id, gp_id, lp_id, status_id, client_mandate_id, user_id, employees_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
          'communicationtags' => array(self::HAS_MANY, 'CommunicationTag', 'communication_id'),
          'user' => array(self::BELONGS_TO, 'User', 'user_id'),
          'firm' => array(self::BELONGS_TO, 'Firm', 'firm_id'),
          'status' => array(self::BELONGS_TO, 'Status', 'status_id'),
          'client_mandate' => array(self::BELONGS_TO, 'ClientMandate', 'client_mandate_id'),
          'employee' => array(self::BELONGS_TO, 'Employees', 'employees_id'),
          'tags' => array(self::MANY_MANY, 'Tag', 'communication_tag(communication_id, tag_id)'),
		);
	}

	public function pivotModels() {
		return array(
            'tags' => 'CommunicationTag',
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'name' => Yii::t('app', 'Name'),
			'description' => Yii::t('app', 'Description'),
			'firm_id' => Yii::t('app', 'Firm'),
			'gp_id' => Yii::t('app', 'Gp'),
			'lp_id' => Yii::t('app', 'Lp'),
			'status_id' => Yii::t('app', 'Status'),
			'client_mandate_id' => Yii::t('app', 'Client Mandate'),
			'user_id' => Yii::t('app', 'User'),
			'employees_id' => Yii::t('app', 'Employees'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('firm_id', $this->firm_id);
		$criteria->compare('gp_id', $this->gp_id);
		$criteria->compare('lp_id', $this->lp_id);
		$criteria->compare('status_id', $this->status_id);
		$criteria->compare('client_mandate_id', $this->client_mandate_id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('employees_id', $this->employees_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}