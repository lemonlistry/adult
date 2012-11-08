<?php

/**
 * This is the MongoDB Document model class based on table "{{resource}}".
 */
class Resource extends MongoDocument
{
    public $id;
    public $name;
    public $tag;
    public $desc;
    public $create_time;

    /**
     * Returns the static model of the specified AR class.
     * @return Resource the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * returns the primary key field for this model
     */
    public function primaryKey()
    {
        return 'id';
    }

    /**
     * @return string the associated collection name
     */
    public function getCollectionName()
    {
        return 'bl_resource';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id, name, tag, desc, create_time', 'required'),
            array('name, tag', 'EMongoUniqueValidator'),
            array('tag, name, desc', 'length', 'max'=>20),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, tag, name, desc, create_time', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'tag' => '标签',
            'name' => '资源名称',
            'desc' => '资源描述',
        	'create_time' => 'Create Time',
        );
    }
}