<?php

/**
 * This is the model class for table "i_category".
 *
 * The followings are the available columns in table 'i_category':
 * @property integer $id
 * @property string $name
 * @property string $desc
 * @property integer $parent_id
 * @property string $path
 * @property integer $sort
 * @property integer $create_time
 */
class Category extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Category the static model class
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
		return 'i_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, desc, path, level, create_time, sort, desc', 'required'),
			array('parent_id, sort, level, create_time', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>80),
            array('name', 'unique'),
			array('desc, path', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, desc, parent_id, path, sort, create_time', 'safe', 'on'=>'search'),
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
			'name' => '名称',
			'desc' => '描述',
			'parent_id' => '父类',
			'path' => '路径',
			'sort' => '排序',
            'level' => '等级',
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
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('path',$this->path,true);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('create_time',$this->create_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * 分类级别
     */
    public function getCategoryLevel(){
        return array('1' => '一级分类', '2' => '二级分类', '3' => '三级分类', '4' => '四级分类');
    }

}