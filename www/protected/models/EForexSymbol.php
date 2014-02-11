<?php

/**
 * This is the model class for table "{{e_forexSymbol}}".
 *
 * The followings are the available columns in table '{{e_forexSymbol}}':
 * @property string $id
 * @property integer $addedby
 * @property integer $updatedby
 * @property integer $nable_user_id
 * @property integer $nable_role_id
 * @property string $modifydate
 * @property string $adddate
 * @property integer $isString
 * @property integer $isText
 * @property integer $isInt
 * @property integer $isFloat
 * @property integer $isBool
 * @property integer $isCost
 * @property integer $isImage
 * @property integer $isFile
 * @property integer $isDate
 * @property integer $isTime
 * @property integer $isSingle
 * @property integer $isMulti
 * @property string $symbol
 * @property string $spread
 * @property string $swap_long
 * @property string $swap_short
 *
 * The followings are the available model relations:
 * @property EJdeals[] $eJdeals
 */
class EForexSymbol extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EForexSymbol the static model class
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
		return '{{e_forexSymbol}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('modifydate, symbol, spread, swap_long, swap_short', 'required'),
			array('addedby, updatedby, nable_user_id, nable_role_id, isString, isText, isInt, isFloat, isBool, isCost, isImage, isFile, isDate, isTime, isSingle, isMulti', 'numerical', 'integerOnly'=>true),
			array('symbol', 'length', 'max'=>6),
			array('spread, swap_long, swap_short', 'length', 'max'=>4),
			array('adddate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, addedby, updatedby, nable_user_id, nable_role_id, modifydate, adddate, isString, isText, isInt, isFloat, isBool, isCost, isImage, isFile, isDate, isTime, isSingle, isMulti, symbol, spread, swap_long, swap_short', 'safe', 'on'=>'search'),
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
			'eJdeals' => array(self::HAS_MANY, 'EJdeals', 'symbol'),
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
			'nable_user_id' => 'Nable User',
			'nable_role_id' => 'Nable Role',
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
			'symbol' => 'Symbol',
			'spread' => 'Spread',
			'swap_long' => 'Swap Long',
			'swap_short' => 'Swap Short',
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
		$criteria->compare('nable_user_id',$this->nable_user_id);
		$criteria->compare('nable_role_id',$this->nable_role_id);
		$criteria->compare('modifydate',$this->modifydate,true);
		$criteria->compare('adddate',$this->adddate,true);
		$criteria->compare('isString',$this->isString);
		$criteria->compare('isText',$this->isText);
		$criteria->compare('isInt',$this->isInt);
		$criteria->compare('isFloat',$this->isFloat);
		$criteria->compare('isBool',$this->isBool);
		$criteria->compare('isCost',$this->isCost);
		$criteria->compare('isImage',$this->isImage);
		$criteria->compare('isFile',$this->isFile);
		$criteria->compare('isDate',$this->isDate);
		$criteria->compare('isTime',$this->isTime);
		$criteria->compare('isSingle',$this->isSingle);
		$criteria->compare('isMulti',$this->isMulti);
		$criteria->compare('symbol',$this->symbol,true);
		$criteria->compare('spread',$this->spread,true);
		$criteria->compare('swap_long',$this->swap_long,true);
		$criteria->compare('swap_short',$this->swap_short,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public static function getSymbols()
    {
        $cr = new CDbCriteria;
        $cr->order = 'symbol ASC';
        $l = self::model()->findAll($cr);
        $result = array();
        foreach($l as $v)
            $result[$v->id] = $v->symbol;

        return $result;
    }
}
