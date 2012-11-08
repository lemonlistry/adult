<?php

/**
 * This is the model class for table "i_ad".
 *
 * The followings are the available columns in table 'i_ad':
 * @property integer $id
 * @property string $title
 * @property string $position
 * @property string $href
 * @property string $path
 * @property integer $category
 * @property integer $type
 * @property integer $status
 * @property integer $create_time
 */
class Ad extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ad the static model class
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
		return 'i_ad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, position, href, category, type, status, create_time', 'required'),
			array('category, type, status, create_time, position', 'numerical', 'integerOnly'=>true),
			array('title, href, path', 'length', 'max'=>255),
            //图片上传最大1M
            array('path', 'file', 'allowEmpty' => true, 'types' => 'jpg, gif, png', 'maxSize' => 1024 * 1024),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, position, href, path, category, type, status, create_time', 'safe', 'on'=>'search'),
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
			'title' => '名称',
			'position' => '位置',
			'href' => '链接地址',
			'path' => '上传图片',
			'category' => '类别',
			'type' => '类型',
			'status' => '状态',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('href',$this->href,true);
		$criteria->compare('path',$this->path,true);
		$criteria->compare('category',$this->category);
		$criteria->compare('type',$this->type);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * 获取广告位置
     */
    public function getAdPosition($index = ''){
        $position = array('首页');
        return $index === '' ? $position : $position[$index];
    }

    /**
     * 获取广告类别
     */
    public function getAdCategory($index = ''){
        $category = array('首页');
        return $index === '' ? $category : $category[$index];
    }

    /**
     * 获取广告类型
     */
    public function getAdType($index = ''){
        $type = array('图片', '文字');
        return $index === '' ? $type : $type[$index];
    }

    /**
     * 获取广告状态
     */
    public function getAdStatus($index = ''){
        $status = array('无效', '有效');
        return $index === '' ? $status : $status[$index];
    }

}