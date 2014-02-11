<?php

/**
 * This is the model class for table "{{e_jdeals}}".
 *
 * The followings are the available columns in table '{{e_jdeals}}':
 * @property string $balance
 * @property string $symbol
 * @property string $otime
 * @property string $ctime
 * @property string $oprice
 * @property string $cprice
 * @property string $swap
 * @property string $lot
 * @property string $osl
 * @property string $csl
 * @property string $otp
 * @property string $ctp
 * @property string $lpips
 * @property string $ppips
 * @property string $dealrisk
 * @property string $oreason
 * @property string $creason
 * @property string $analysis
 * @property string $id
 * @property integer $addedby
 * @property integer $updatedby
 * @property integer $nable_user_id
 * @property integer $nable_role_id
 * @property integer $modifydate
 * @property integer $adddate
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
 *
 * The followings are the available model relations:
 * @property EForexSymbol $symbol0
 */
class EJdeals extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EJdeals the static model class
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
		return '{{e_jdeals}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('orderId, balance, symbol, otime, oprice, cprice, swap, lot, osl, csl, otp, ctp, lpips, ppips, dealrisk, addedby, updatedby, nable_user_id, nable_role_id, modifydate, adddate', 'required'),
			array('orderId, addedby, updatedby, nable_user_id, nable_role_id, modifydate, adddate, isString, isText, isInt, isFloat, isBool, isCost, isImage, isFile, isDate, isTime, isSingle, isMulti', 'numerical', 'integerOnly'=>true),
			array('balance', 'length', 'max'=>11),
			array('symbol', 'length', 'max'=>20),
			array('oprice, cprice, swap, osl, csl, otp, ctp', 'length', 'max'=>8),
			array('lot, lpips, ppips, dealrisk', 'length', 'max'=>5),
			array('ctime, oreason, creason, analysis', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('balance, symbol, otime, ctime, oprice, cprice, swap, lot, osl, csl, otp, ctp, lpips, ppips, dealrisk, oreason, creason, analysis, id, addedby, updatedby, nable_user_id, nable_role_id, modifydate, adddate, isString, isText, isInt, isFloat, isBool, isCost, isImage, isFile, isDate, isTime, isSingle, isMulti', 'safe', 'on'=>'search'),
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
			'forexSymbol' => array(self::BELONGS_TO, 'EForexSymbol', 'symbol'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
            'orderId' => 'Order ID',
			'balance' => 'Balance',
			'symbol' => 'Symbol',
			'otime' => 'Otime',
			'ctime' => 'Ctime',
			'oprice' => 'Oprice',
			'cprice' => 'Cprice',
			'swap' => 'Swap',
			'lot' => 'Lot',
			'osl' => 'Osl',
			'csl' => 'Csl',
			'otp' => 'Otp',
			'ctp' => 'Ctp',
			'lpips' => 'Lpips',
			'ppips' => 'Ppips',
			'dealrisk' => 'Dealrisk',
			'oreason' => 'Oreason',
			'creason' => 'Creason',
			'analysis' => 'Analysis',
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

		$criteria->compare('orderId',$this->orderId,true);
        $criteria->compare('balance',$this->balance,true);
		$criteria->compare('symbol',$this->symbol,true);
		$criteria->compare('otime',$this->otime,true);
		$criteria->compare('ctime',$this->ctime,true);
		$criteria->compare('oprice',$this->oprice,true);
		$criteria->compare('cprice',$this->cprice,true);
		$criteria->compare('swap',$this->swap,true);
		$criteria->compare('lot',$this->lot,true);
		$criteria->compare('osl',$this->osl,true);
		$criteria->compare('csl',$this->csl,true);
		$criteria->compare('otp',$this->otp,true);
		$criteria->compare('ctp',$this->ctp,true);
		$criteria->compare('lpips',$this->lpips,true);
		$criteria->compare('ppips',$this->ppips,true);
		$criteria->compare('dealrisk',$this->dealrisk,true);
		$criteria->compare('oreason',$this->oreason,true);
		$criteria->compare('creason',$this->creason,true);
		$criteria->compare('analysis',$this->analysis,true);
		$criteria->compare('id',$this->id,true);
		$criteria->compare('addedby',$this->addedby);
		$criteria->compare('updatedby',$this->updatedby);
		$criteria->compare('nable_user_id',$this->nable_user_id);
		$criteria->compare('nable_role_id',$this->nable_role_id);
		$criteria->compare('modifydate',$this->modifydate);
		$criteria->compare('adddate',$this->adddate);
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getAll()
    {

    }
}
