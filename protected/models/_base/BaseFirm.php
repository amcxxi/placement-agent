<?php

/**
 * This is the model base class for the table "firm".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Firm".
 *
 * Columns in table "firm" available as properties of the model,
 * followed by relations of table "firm" available as properties of the model.
 *
 * @property string $id
 * @property string $name
 * @property string $user_id
 * @property string $firmtype_id
 * @property string $description
 * @property string $website
 * @property string $rank
 *
 * @property Firmtype $firmtype
 * @property User $user
 * @property Firmcontinent[] $firmcontinents
 * @property Firmdocument[] $firmdocuments
 * @property Firmregion[] $firmregions
 * @property Office[] $offices
 */
abstract class BaseFirm extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'firm';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Firm|Firms', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('name, user_id, firmtype_id, website, rank', 'required'),
			array('name', 'length', 'max'=>50),
			array('user_id, firmtype_id', 'length', 'max'=>10),
			array('website', 'length', 'max'=>100),
			array('rank', 'length', 'max'=>1),
			array('description', 'safe'),
			array('description', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, name, user_id, firmtype_id, description, website, rank', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'firmtype' => array(self::BELONGS_TO, 'Firmtype', 'firmtype_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'firmcontinents' => array(self::HAS_MANY, 'Firmcontinent', 'firm_id'),
			'firmdocuments' => array(self::HAS_MANY, 'Firmdocument', 'firm_id'),
			'firmregions' => array(self::HAS_MANY, 'Firmregion', 'firm_id'),
			'offices' => array(self::HAS_MANY, 'Office', 'firm_id'),
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
			'user_id' => null,
			'firmtype_id' => null,
			'description' => Yii::t('app', 'Description'),
			'website' => Yii::t('app', 'Website'),
			'rank' => Yii::t('app', 'Rank'),
			'firmtype' => null,
			'user' => null,
			'firmcontinents' => null,
			'firmdocuments' => null,
			'firmregions' => null,
			'offices' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('firmtype_id', $this->firmtype_id);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('website', $this->website, true);
		$criteria->compare('rank', $this->rank, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}