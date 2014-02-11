<?php

/**
 * This is the model class for table "{{e_page}}".
 *
 * The followings are the available columns in table '{{e_page}}':
 * @property string $id
 * @property integer $addedby
 * @property integer $updatedby
 * @property string $user_id
 * @property string $role_id
 * @property string $page_pid
 * @property integer $hidden
 * @property string $modifydate
 * @property string $adddate
 * @property string $isString
 * @property string $isText
 * @property string $isInt
 * @property string $isFloat
 * @property string $isBool
 * @property string $isCost
 * @property string $isImage
 * @property string $isFile
 * @property string $isDate
 * @property string $isTime
 * @property string $isSingle
 * @property string $isMulti
 */
class EPage extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EPage the static model class
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
		return '{{e_page}}';
	}

    public function primaryKey()
    {
        return 'id';
    }
    

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('addedby, updatedby, user_id, role_id, modifydate', 'required'),
			array('addedby, updatedby, hidden', 'numerical', 'integerOnly'=>true),
			array('user_id, role_id, page_pid', 'length', 'max'=>10),
			array('isString, isText, isInt, isFloat, isBool, isCost, isImage, isFile, isDate, isTime, isSingle, isMulti', 'length', 'max'=>5),
			array('adddate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, addedby, updatedby, user_id, role_id, page_pid, hidden, modifydate, adddate, isString, isText, isInt, isFloat, isBool, isCost, isImage, isFile, isDate, isTime, isSingle, isMulti', 'safe', 'on'=>'search'),
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
			'addedby' => 'Addedby',
			'updatedby' => 'Updatedby',
			'user_id' => 'User',
			'role_id' => 'Role',
			'page_pid' => 'Page Pid',
			'hidden' => 'Hidden',
			'modifydate' => 'Modifydate',
			'adddate' => 'Adddate',
			'isString' => 'Is String',
			'isText' => 'Is Text',
			'isInt' => 'Is Int',
			'isFloat' => 'Is Float',
			'isBool' => 'Is Bool',
			'isCost' => 'Is Cost',
			'isImage' => 'Is Image',
			'isFile' => 'Is File',
			'isDate' => 'Is Date',
			'isTime' => 'Is Time',
			'isSingle' => 'Is Single',
			'isMulti' => 'Is Multi',
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
		$criteria->compare('addedby',$this->addedby);
		$criteria->compare('updatedby',$this->updatedby);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('role_id',$this->role_id,true);
		$criteria->compare('page_pid',$this->page_pid,true);
		$criteria->compare('hidden',$this->hidden);
		$criteria->compare('modifydate',$this->modifydate,true);
		$criteria->compare('adddate',$this->adddate,true);
		$criteria->compare('isString',$this->isString,true);
		$criteria->compare('isText',$this->isText,true);
		$criteria->compare('isInt',$this->isInt,true);
		$criteria->compare('isFloat',$this->isFloat,true);
		$criteria->compare('isBool',$this->isBool,true);
		$criteria->compare('isCost',$this->isCost,true);
		$criteria->compare('isImage',$this->isImage,true);
		$criteria->compare('isFile',$this->isFile,true);
		$criteria->compare('isDate',$this->isDate,true);
		$criteria->compare('isTime',$this->isTime,true);
		$criteria->compare('isSingle',$this->isSingle,true);
		$criteria->compare('isMulti',$this->isMulti,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
