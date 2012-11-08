<?php

/**
 * This is the MongoDB Document model class based on table "bl_log".
 */
class Log extends MongoDocument
{
    public $id;
    public $module;
    public $level;
    public $url;
    public $type;
    public $browse;
    public $client_ip;
    public $file_name;
    public $line_number;
    public $msg;
    public $param;
    public $server_ip;
    public $operator;
    public $create_time;
    
    /**
     * Returns the static model of the specified AR class.
     * @return Log the static model class
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
        return 'bl_log';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('module, level, url, type, browse, client_ip, file_name, line_number, msg, param, create_time, server_ip, operator, id', 'required'),
            array('create_time', 'numerical', 'integerOnly'=>true),
            array('module, file_name', 'length', 'max'=>255),
            array('level, type, line_number', 'length', 'max'=>100),
            array('url, browse', 'length', 'max'=>255),
            array('client_ip, server_ip', 'length', 'max'=>20),
            array('operator', 'length', 'max'=>25),
            array('msg, param', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, module, level, url, type, browse, client_ip, file_name, line_number, msg, param, server_ip, operator, create_time', 'safe', 'on'=>'search'),
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
            'url' => 'Url',
            'type' => 'Type',
            'browse' => 'Browse',
            'client_ip' => 'Client Ip',
            'file_name' => 'File Name',
            'line_number' => 'Line Number',
            'msg' => 'Msg',
            'param' => 'Param',
            'server_ip' => 'Server Ip',
            'operator' => 'Operator',
            'create_time' => 'Create Time',
        );
    }
    
    /**
     * 根据字段 降序 搜索
     * @param string $field
     */
    public function bySearch($param)
    {
        $begintime = strtotime($param['begintime']);
        $endtime = strtotime($param['endtime']);
        $criteria = new EMongoCriteria();
        if(!empty($param['operator'])){
            $criteria->operator('==', $param['operator']);
        }
        if(!empty($begintime)){
            $criteria->create_time('>=', $begintime);
        }
        if(!empty($endtime)){
            $criteria->create_time('<=', $endtime);
        }
        $criteria->sort('id', EMongoCriteria::SORT_DESC);
        $this->setDbCriteria($criteria);
        return $this;
    }
    
}