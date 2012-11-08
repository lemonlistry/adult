<?php

/**
 * This is the model class for table "i_href".
 *
 * The followings are the available columns in table 'i_href':
 * @property integer $id
 * @property string $title
 * @property string $target
 * @property integer $position
 * @property integer $type
 * @property string $path
 * @property integer $status
 * @property integer $create_time
 */
class Href extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Href the static model class
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
		return 'i_href';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, target, position, type, status, create_time', 'required'),
			array('position, type, status, create_time', 'numerical', 'integerOnly'=>true),
			array('title, target, path', 'length', 'max'=>255),
            //图片上传最大1M
            array('path', 'file', 'allowEmpty' => true, 'types' => 'jpg, gif, png', 'maxSize' => 1024 * 1024),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, target, position, type, path, status, create_time', 'safe', 'on'=>'search'),
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
			'id' => '序号',
			'title' => '标题',
			'target' => '链接地址',
			'position' => '链接位置',
			'type' => '链接类型',
			'path' => '上传图片',
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
		$criteria->compare('target',$this->target,true);
		$criteria->compare('position',$this->position);
		$criteria->compare('type',$this->type);
		$criteria->compare('path',$this->path,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

     /**
     * 获取友情链接位置
     */
    public function getHrefPosition($index = ''){
        $position = array('首页');
        return $index === '' ? $position : $position[$index];
    }

    /**
     * 获取友情链接类型
     */
    public function getHrefType($index = ''){
        $type = array('图片', '文字');
        return $index === '' ? $type : $type[$index];
    }

    /**
     * 获取广告状态
     */
    public function getHrefStatus($index = ''){
        $status = array('无效', '有效');
        return $index === '' ? $status : $status[$index];
    }

}