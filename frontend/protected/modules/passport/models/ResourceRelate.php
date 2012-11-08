<?php

/**
 * This is the MongoDB Document model class based on table "bl_resource_relate".
 */
class ResourceRelate extends MongoDocument
{
    public $id;
    public $resource_id;
    public $path;

    /**
     * Returns the static model of the specified AR class.
     * @return ResourceRelate the static model class
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
        return 'bl_resource_relate';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id', 'required'),
            array('id, resource_id', 'numerical', 'integerOnly'=>true),
            array('path', 'length', 'max'=>100),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, resource_id, path', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'resource_id' => '资源类型',
            'path' => '资源路径',
        );
    }
}