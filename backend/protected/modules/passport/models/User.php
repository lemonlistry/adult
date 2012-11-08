<?php

/**
 * This is the model class for table "i_b_account".
 *
 * The followings are the available columns in table 'i_b_account':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $role_id
 * @property integer $create_time
 */
class User extends ActiveRecord
{
    private $__identity;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Account the static model class
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
		return 'i_b_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('id, username, password, role_id, create_time', 'required', 'on' => 'insert, update'),
            array('username, password', 'required', 'on' => 'search'),
			array('role_id, create_time', 'numerical', 'integerOnly'=>true),
            array('username', 'unique', 'on' => 'insert, update'),
			array('username', 'length', 'max'=>20),
			array('password', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, role_id, create_time', 'safe', 'on'=>'search'),
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
			'id' => '编号',
			'username' => '用户名称',
			'password' => '密码',
			'role_id' => '角色',
			'create_time' => '创建时间',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('create_time',$this->create_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function login() {
        if ($this->__identity === null) {
            $this->__identity = new UserIdentity($this->username, $this->password);
            $this->__identity->authenticate();
        }
        if ($this->__identity->errorCode === UserIdentity::ERROR_NONE) {
            Yii::app()->user->login($this->__identity);
            return true;
        }else{
            return false;
        }
    }

}