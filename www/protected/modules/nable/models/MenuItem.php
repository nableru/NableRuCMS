<?php

/**
 * This is the model class for table "{{menu_item}}".
 *
 * The followings are the available columns in table '{{menu_item}}':
 * @property integer $id
 * @property integer $menu_num
 * @property integer $sorting
 * @property string $hidden
 * @property string $url
 * @property integer $level
 * @property string $name_active
 * @property string $name_passive
 * @property string $nable_pages_id
 * @property integer $nable_langs_id
 * @property string $data
 * @property string $external
 */
class MenuItem extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{menu_item}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nable_langs_id, data', 'required'),
			array('menu_num, sorting, level, nable_langs_id', 'numerical', 'integerOnly'=>true),
			array('hidden, external', 'length', 'max'=>5),
			array('url', 'length', 'max'=>255),
			array('name_active, name_passive', 'length', 'max'=>100),
			array('nable_pages_id', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, menu_num, sorting, hidden, url, level, name_active, name_passive, nable_pages_id, nable_langs_id, data, external', 'safe', 'on'=>'search'),
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
			'menu_num' => 'Menu Num',
			'sorting' => 'Sorting',
			'hidden' => 'Hidden',
			'url' => 'Url',
			'level' => 'Level',
			'name_active' => 'Name Active',
			'name_passive' => 'Name Passive',
			'nable_pages_id' => 'Nable Pages',
			'nable_langs_id' => 'Nable Langs',
			'data' => 'Data',
			'external' => 'External',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('menu_num',$this->menu_num);
		$criteria->compare('sorting',$this->sorting);
		$criteria->compare('hidden',$this->hidden,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('level',$this->level);
		$criteria->compare('name_active',$this->name_active,true);
		$criteria->compare('name_passive',$this->name_passive,true);
		$criteria->compare('nable_pages_id',$this->nable_pages_id,true);
		$criteria->compare('nable_langs_id',$this->nable_langs_id);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('external',$this->external,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MenuItem the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
