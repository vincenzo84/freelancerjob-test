<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id_user
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $password
 * @property string $address
 * @property string $city
 * @property integer $cap
 * @property integer $nation
 * @property integer $telephone
 * @property string $username
 * @property integer $confirm
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, surname, email, password, address, city, cap, nation, telephone, username', 'required'),
			array('cap, nation, telephone, confirm', 'numerical', 'integerOnly'=>true),
			array('name, surname, password', 'length', 'max'=>64),
			array('email, city', 'length', 'max'=>128),
			array('address', 'length', 'max'=>264),
			array('username', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_user, name, surname, email, password, address, city, cap, nation, telephone, username, confirm', 'safe', 'on'=>'search'),
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
			'id_user' => 'Id User',
			'name' => 'Name',
			'surname' => 'Surname',
			'email' => 'Email',
			'password' => 'Password',
			'address' => 'Address',
			'city' => 'City',
			'cap' => 'Cap',
			'nation' => 'Nation',
			'telephone' => 'Telephone',
			'username' => 'Username',
			'confirm' => 'Confirm',
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

		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('cap',$this->cap);
		$criteria->compare('nation',$this->nation);
		$criteria->compare('telephone',$this->telephone);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('confirm',$this->confirm);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
