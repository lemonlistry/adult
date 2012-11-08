<?php

/**
 * This is the model class for table "i_b_log".
 *
 * The followings are the available columns in table 'i_b_log':
 * @property integer $id
 * @property string $module
 * @property string $level
 * @property string $request_url
 * @property string $request_type
 * @property string $browse
 * @property string $client_ip
 * @property string $file_name
 * @property integer $line_number
 * @property string $msg
 * @property string $param
 * @property string $operator
 * @property integer $create_time
 */
class Log extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Log the static model class
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
		return 'i_b_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('module, level, request_url, request_type, browse, client_ip, file_name, line_number, msg, param, operator, create_time', 'required'),
			array('line_number, create_time', 'numerical', 'integerOnly'=>true),
			array('module, client_ip', 'length', 'max'=>20),
			array('level, request_type', 'length', 'max'=>10),
			array('request_url, browse, file_name, msg, operator', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, module, level, request_url, request_type, browse, client_ip, file_name, line_number, msg, param, operator, create_time', 'safe', 'on'=>'search'),
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
			'module' => 'Module',
			'level' => 'Level',
			'request_url' => 'Request Url',
			'request_type' => 'Request Type',
			'browse' => 'Browse',
			'client_ip' => 'Client Ip',
			'file_name' => 'File Name',
			'line_number' => 'Line Number',
			'msg' => 'Msg',
			'param' => 'Param',
			'operator' => 'Operator',
			'create_time' => 'Create Time',
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
		$criteria->compare('module',$this->module,true);
		$criteria->compare('level',$this->level,true);
		$criteria->compare('request_url',$this->request_url,true);
		$criteria->compare('request_type',$this->request_type,true);
		$criteria->compare('browse',$this->browse,true);
		$criteria->compare('client_ip',$this->client_ip,true);
		$criteria->compare('file_name',$this->file_name,true);
		$criteria->compare('line_number',$this->line_number);
		$criteria->compare('msg',$this->msg,true);
		$criteria->compare('param',$this->param,true);
		$criteria->compare('operator',$this->operator,true);
		$criteria->compare('create_time',$this->create_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * 根据字段 降序 搜索
     * @param string $field
     */
    public function bySearch($param)
    {
        $criteria = new CDbCriteria();
        $criteria->order = 'id DESC';
        if(!empty($param['operator'])){
            $criteria->addCondition('operator = :operator');
            $criteria->params[':operator'] = $param['operator'];
        }
        if(!empty($param['begintime'])){
            $begintime = strtotime($param['begintime']);
            $criteria->addCondition('create_time >= :begintime');
            $criteria->params[':begintime'] = $begintime;
        }
        if(!empty($param['endtime'])){
            $endtime = strtotime($param['endtime']);
            $criteria->addCondition('create_time <= :endtime');
            $criteria->params[':endtime'] = $endtime;
        }
        if (!empty($param['moudel'])){
            $criteria->addCondition('moudel = :moudel');
            $criteria->params[':moudel'] = $param['moudel'];
        }
        $this->setDbCriteria($criteria);
        return $this;
    }
}