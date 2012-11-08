<?php

/**
 * This is the model class for table "i_logistics".
 *
 * The followings are the available columns in table 'i_logistics':
 * @property integer $id
 * @property string $order_id
 * @property string $express_name
 * @property string $express_number
 * @property string $note
 * @property integer $send_time
 * @property integer $create_time
 */
class Logistics extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Logistics the static model class
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
		return 'i_logistics';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_id, express_name, express_number, send_time, create_time', 'required'),
			array('send_time, create_time', 'numerical', 'integerOnly'=>true),
			array('order_id, express_name, express_number, note', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, order_id, express_name, express_number, note, send_time, create_time', 'safe', 'on'=>'search'),
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
			'order_id' => '订单号',
			'express_name' => '快递公司',
			'express_number' => '快递单号',
			'note' => '备注',
			'send_time' => '发送时间',
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
		$criteria->compare('order_id',$this->order_id,true);
		$criteria->compare('express_name',$this->express_name,true);
		$criteria->compare('express_number',$this->express_number,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('send_time',$this->send_time);
		$criteria->compare('create_time',$this->create_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * 快递公司
     */
    public function getLogisticsExpressName(){
        return array('顺丰' => '顺丰', '申通' => '申通', '韵达' => '韵达');
    }

}