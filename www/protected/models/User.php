<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property string $id
 * @property integer $nable_role_id
 * @property string $username
 * @property string $password
 * @property string $fullname
 * @property string $email
 * @property string $phone
 * @property string $expire
 * @property string $comment
 * @property string $nets
 * @property string $adddate
 * @property string $langs
 * @property string $userdata
 * @property integer $protected
 * @property string $hosts
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nets, langs, userdata, hosts', 'required'),
			array('nable_role_id, protected', 'numerical', 'integerOnly'=>true),
			array('username, fullname, email, hosts', 'length', 'max'=>255),
			array('password', 'length', 'max'=>32),
			array('phone, expire, comment, adddate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nable_role_id, username, password, fullname, email, phone, expire, comment, nets, adddate, langs, userdata, protected, hosts', 'safe', 'on'=>'search'),
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
			'nable_role_id' => 'Nable Role',
			'username' => 'Username',
			'password' => 'Password',
			'fullname' => 'Fullname',
			'email' => 'Email',
			'phone' => 'Phone',
			'expire' => 'Expire',
			'comment' => 'Comment',
			'nets' => 'Nets',
			'adddate' => 'Adddate',
			'langs' => 'Langs',
			'userdata' => 'Userdata',
			'protected' => 'Protected',
			'hosts' => 'Hosts',
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
		$criteria->compare('nable_role_id',$this->nable_role_id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('fullname',$this->fullname,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('expire',$this->expire,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('nets',$this->nets,true);
		$criteria->compare('adddate',$this->adddate,true);
		$criteria->compare('langs',$this->langs,true);
		$criteria->compare('userdata',$this->userdata,true);
		$criteria->compare('protected',$this->protected);
		$criteria->compare('hosts',$this->hosts,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}