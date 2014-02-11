<?php

/**
 * This is the model class for table "{{e_page_i18n}}".
 *
 * The followings are the available columns in table '{{e_page_i18n}}':
 * @property string $id
 * @property string $lang
 * @property string $title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $h1
 * @property string $content
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
 * @property string $columns
 */
class EPageI18n extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EPageI18n the static model class
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
		return '{{e_page_i18n}}';
	}
/*
    public function primaryKey()
    {
        return array('id', 'lang');
    }
*/
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, lang', 'required'),
			array('id', 'length', 'max'=>20),
			array('lang, isString, isText, isInt, isFloat, isBool, isCost, isImage, isFile, isDate, isTime, isSingle, isMulti', 'length', 'max'=>5),
			array('title, h1', 'length', 'max'=>100),
			array('meta_description, meta_keywords', 'length', 'max'=>255),
			array('columns', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, lang, title, meta_description, meta_keywords, h1, content, isString, isText, isInt, isFloat, isBool, isCost, isImage, isFile, isDate, isTime, isSingle, isMulti, columns', 'safe', 'on'=>'search'),
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
			'lang' => 'Lang',
			'title' => 'Title',
			'meta_description' => 'Meta Description',
			'meta_keywords' => 'Meta Keywords',
			'h1' => 'H1',
			'content' => 'Content',
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
			'columns' => 'Columns',
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
		$criteria->compare('lang',$this->lang,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('h1',$this->h1,true);
		$criteria->compare('content',$this->content,true);
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
		$criteria->compare('columns',$this->columns,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
