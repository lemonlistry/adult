<?php

/**
 * 分页类
 */
class Pages {

    /**
     * SQL分页 获取pages对象和结果集数组
     * @param string $sql SQL语句
     * @param int $page_size 默认每页20条
     * @param array $param 绑定参数数组
     * @return array
     */
    public static function initSqlQuery($sql, $param = array(), $page_size = 20) {
        $criteria = new CDbCriteria();
        $result = Yii::app()->db->createCommand($sql)->query($param);
        $pages = new CPagination($result->rowCount);
        $pages->pageSize = $page_size;
        $pages->applyLimit($criteria);
        $list = Yii::app()->db->createCommand($sql)->limit($pages->pageSize,($pages->currentPage * $pages->pageSize))->queryAll(true,$param);
        return array('pages' => $pages , 'list' => $list);
    }

    /**
     * SQL查询对象分页 获取pages对象和结果集数组
     * @param string $obj SQL查询对象
     * @param int $page_size 默认每页20条
     * @return array
     */
    public static function initObjQuery($obj, $page_size = 20){
        $object = clone $obj;
        $criteria = new CDbCriteria();
        $result = $object->query();
        $pages = new CPagination($result->rowCount);
        $pages->pageSize = $page_size;
        $pages->applyLimit($criteria);
        $list = $obj->limit($pages->pageSize,($pages->pageSize * $pages->currentPage))->queryAll();
        return array('pages' => $pages , 'list' => $list);
    }

    /**
     * 数组分页 获取pages对象和结果集数组
     * @param array $result SQL查询返回的数组结果集
     * @param int $page_size 默认每页20条
     * @return array
     */
    public static function initArray($result, $page_size = 20){
        $criteria = new CDbCriteria();
        $num = count($result);
        $pages = new CPagination($num);
        $pages->pageSize = $page_size;
        $pages->applyLimit($criteria);
        $list = array();
        if($num){
            $index = $pages->currentPage;
            $result = array_chunk($result, $pages->pageSize); 
            $list = $result[$index];
        }
        return array('pages' => $pages , 'list' => $list);
    }
    
}
