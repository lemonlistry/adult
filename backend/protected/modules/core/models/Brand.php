<?php

/**
 * This is the model class for table "i_brand".
 *
 * The followings are the available columns in table 'i_brand':
 * @property integer $id
 * @property string $name
 * @property string $desc
 * @property string $logo
 * @property integer $sort
 * @property integer $recommend
 * @property integer $create_time
 */
class Brand extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Brand the static model class
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
		return 'i_brand';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, desc, sort, recommend, create_time', 'required'),
			array('sort, recommend, create_time', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>80),
			array('logo', 'length', 'max'=>255),
            //图片上传最大1M
            array('logo', 'file', 'allowEmpty' => true, 'types' => 'jpg, gif, png', 'maxSize' => 1024 * 1024),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, desc, logo, sort, recommend, create_time', 'safe', 'on'=>'search'),
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
			'id' => '编码',
			'name' => '名称',
			'desc' => '描述',
			'logo' => '上传Logo',
			'sort' => '排序',
			'recommend' => '是否推荐',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('recommend',$this->recommend);
		$criteria->compare('create_time',$this->create_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * 获取品牌是否推荐
     */
    public function getBrandRecommend($index = ''){
        $recommend = array('否', '是');
        return $index === '' ? $recommend : $recommend[$index];
    }

}