<?php

/**
 * This is the model class for table "i_item".
 *
 * The followings are the available columns in table 'i_item':
 * @property integer $id
 * @property string $item_name
 * @property string $item_sn
 * @property string $item_point
 * @property string $item_price
 * @property integer $category_one
 * @property integer $category_two
 * @property integer $category_three
 * @property integer $brand_id
 * @property integer $share
 * @property integer $view
 * @property integer $volume
 * @property integer $collect
 * @property integer $is_shelve
 * @property integer $is_delete
 * @property integer $is_free_postage
 * @property integer $recommend
 * @property string $desc
 * @property integer $keyword_id
 * @property integer $create_time
 */
class Item extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Item the static model class
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
		return 'i_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('item_name, item_sn, item_price, category_one, category_two, category_three, brand_id, desc, create_time', 'required'),
			array('category_one, category_two, category_three, brand_id, share, view, volume, collect, is_shelve, is_delete, is_free_postage, recommend, keyword_id, create_time', 'numerical', 'integerOnly'=>true),
			array('item_name, item_sn', 'length', 'max'=>255),
			array('item_point, item_price', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, item_name, item_sn, item_point, item_price, category_one, category_two, category_three, brand_id, share, view, volume, collect, is_shelve, is_delete, is_free_postage, recommend, desc, keyword_id, create_time', 'safe', 'on'=>'search'),
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
			'item_name' => 'Item Name',
			'item_sn' => 'Item Sn',
			'item_point' => 'Item Point',
			'item_price' => 'Item Price',
			'category_one' => 'Category One',
			'category_two' => 'Category Two',
			'category_three' => 'Category Three',
			'brand_id' => 'Brand',
			'share' => 'Share',
			'view' => 'View',
			'volume' => 'Volume',
			'collect' => 'Collect',
			'is_shelve' => 'Is Shelve',
			'is_delete' => 'Is Delete',
			'is_free_postage' => 'Is Free Postage',
			'recommend' => 'Recommend',
			'desc' => 'Desc',
			'keyword_id' => 'Keyword',
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
		$criteria->compare('item_name',$this->item_name,true);
		$criteria->compare('item_sn',$this->item_sn,true);
		$criteria->compare('item_point',$this->item_point,true);
		$criteria->compare('item_price',$this->item_price,true);
		$criteria->compare('category_one',$this->category_one);
		$criteria->compare('category_two',$this->category_two);
		$criteria->compare('category_three',$this->category_three);
		$criteria->compare('brand_id',$this->brand_id);
		$criteria->compare('share',$this->share);
		$criteria->compare('view',$this->view);
		$criteria->compare('volume',$this->volume);
		$criteria->compare('collect',$this->collect);
		$criteria->compare('is_shelve',$this->is_shelve);
		$criteria->compare('is_delete',$this->is_delete);
		$criteria->compare('is_free_postage',$this->is_free_postage);
		$criteria->compare('recommend',$this->recommend);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('keyword_id',$this->keyword_id);
		$criteria->compare('create_time',$this->create_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}