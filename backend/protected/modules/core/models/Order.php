<?php

/**
 * This is the model class for table "i_order".
 *
 * The followings are the available columns in table 'i_order':
 * @property integer $id
 * @property string $no
 * @property integer $uid
 * @property string $discount_price
 * @property string $discount
 * @property string $normal_price
 * @property integer $item_num
 * @property integer $status
 * @property integer $pay_type
 * @property integer $create_time
 * @property integer $success_time
 */
class Order extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Order the static model class
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
		return 'i_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('no, uid, discount_price, discount, normal_price, item_num, status, pay_type, create_time, success_time', 'required'),
			array('uid, item_num, status, pay_type, create_time, success_time', 'numerical', 'integerOnly'=>true),
			array('no', 'length', 'max'=>24),
			array('discount_price, discount, normal_price', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, no, uid, discount_price, discount, normal_price, item_num, status, pay_type, create_time, success_time', 'safe', 'on'=>'search'),
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
			'no' => 'No',
			'uid' => 'Uid',
			'discount_price' => 'Discount Price',
			'discount' => 'Discount',
			'normal_price' => 'Normal Price',
			'item_num' => 'Item Num',
			'status' => 'Status',
			'pay_type' => 'Pay Type',
			'create_time' => 'Create Time',
			'success_time' => 'Success Time',
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
		$criteria->compare('no',$this->no,true);
		$criteria->compare('uid',$this->uid);
		$criteria->compare('discount_price',$this->discount_price,true);
		$criteria->compare('discount',$this->discount,true);
		$criteria->compare('normal_price',$this->normal_price,true);
		$criteria->compare('item_num',$this->item_num);
		$criteria->compare('status',$this->status);
		$criteria->compare('pay_type',$this->pay_type);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('success_time',$this->success_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * 获取订单状态
     */
    public function getOrderStatus($index = ''){
        $status = array('未付款', '已付款', '已发货', '确认收货', '换货', '退货', '交易成功');
        return $index === '' ? $status : $status[$index];
    }

    /**
     * 获取支付方式
     */
    public function getPayType($index = ''){
        $pay_type = array('支付宝', '电子钱包', '线下转账', '礼品卡', 'paypal');
        return $index === '' ? $pay_type : $pay_type[$index];
    }
}