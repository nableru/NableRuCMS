<?php

/**
 * This is the model class for table "{{entity_field}}".
 *
 * The followings are the available columns in table '{{entity_field}}':
 * @property string $id
 * @property string $entity_id
 * @property string $shortname
 * @property string $name
 * @property string $vartype
 * @property string $type
 * @property string $searchable
 * @property string $required
 * @property integer $sorting
 * @property string $hidden
 * @property string $protected
 * @property string $config
 * @property integer $multilang
 */
class EntityField extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EntityField the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{entity_field}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('entity_id, shortname, name, vartype, type, config', 'required'),
			array('sorting, multilang', 'numerical', 'integerOnly'=>true),
			array('entity_id', 'length', 'max'=>10),
			array('shortname', 'length', 'max'=>100),
			array('name', 'length', 'max'=>255),
			array('vartype', 'length', 'max'=>6),
			array('type', 'length', 'max'=>12),
			array('searchable, required, hidden, protected', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, entity_id, shortname, name, vartype, type, searchable, required, sorting, hidden, protected, config, multilang', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'entity_id' => 'Entity',
			'shortname' => 'Shortname',
			'name' => 'Name',
			'vartype' => 'Vartype',
			'type' => 'Type',
			'searchable' => 'Searchable',
			'required' => 'Required',
			'sorting' => 'Sorting',
			'hidden' => 'Hidden',
			'protected' => 'Protected',
			'config' => 'Config',
			'multilang' => 'Multilang',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('entity_id',$this->entity_id,true);
		$criteria->compare('shortname',$this->shortname,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('vartype',$this->vartype,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('searchable',$this->searchable,true);
		$criteria->compare('required',$this->required,true);
		$criteria->compare('sorting',$this->sorting);
		$criteria->compare('hidden',$this->hidden,true);
		$criteria->compare('protected',$this->protected,true);
		$criteria->compare('config',$this->config,true);
		$criteria->compare('multilang',$this->multilang);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}