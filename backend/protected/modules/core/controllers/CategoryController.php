<?php

class CategoryController extends Controller
{

    /**
     * 分类列表
     */
    public function actionIndex()
    {
        $title = '分类列表';
        $parent_id = intval($this->getParam('parent_id'));
        $list = Category::model()->findAllByAttributes(array('parent_id' => $parent_id));
        if (Yii::app()->request->isAjaxRequest) {
            $result = array();
            if(count($list)){
                foreach ($list as $k => $v) {
                    $result[$k]['name'] = $v->name;
                    $result[$k]['parent_name'] = Util::getCategoryAttribute($v->parent_id);
                    $result[$k]['desc'] = $v->desc;
                    $result[$k]['sort'] = $v->sort;
                    $result[$k]['delete_url'] = $this->createUrl('/core/category/deletecategory', array('id' => $v['id']));
                    $result[$k]['update_url'] = $this->createUrl('/core/category/updatecategory', array('id' => $v['id']));
                    $result[$k]['create_time'] = date('Y-m-d H:i:s', $v->create_time);
                }
            }
            echo json_encode($result);
            Yii::app()->end();
        }else{
           $this->render('index', array('title' => $title, 'list' => $list));
        }
    }

    /**
     * AJAX 请求获取分类树形结构
     */
    public function actionAjaxCategoryTree()   {
        if (Yii::app()->request->isAjaxRequest) {
            $parent_id = 0;
            if(isset($_GET['root']) && $_GET['root'] != 'source'){
                $parent_id = intval($this->getParam('root'));
            }
            $sql = "SELECT m1.id, m1.name AS text, m2.id IS NOT NULL AS hasChildren FROM i_category AS m1 LEFT JOIN i_category AS m2 ON m1.id=m2.parent_id WHERE m1.parent_id <=> $parent_id GROUP BY m1.id ORDER BY m1.sort ASC";
            $children = Yii::app()->db->createCommand($sql)->queryAll();
            if(count($children)){
                foreach ($children as $k => $v) {
                    $url = $this->createUrl('/core/category/index', array('parent_id' => $v['id']));
                    $children[$k]['text'] = '<a data-target="' . $url . '" href="#">' . $v['text'] . '</a>';
                }
            }
            echo str_replace('"hasChildren":"0"', '"hasChildren":false', CTreeView::saveDataAsJson($children));
        }
        Yii::app()->end();
    }

    /**
     * 添加分类
     */
    public function actionAddCategory(){
        $model = new Category();
        if(Yii::app()->request->isPostRequest){
            $param = $this->getParam('Category');
            $param['create_time'] = time();
            if($param['parent_id'] == 0){
                $param['path'] = 0;
            }else{
                $parent_path = Util::getCategoryAttribute($param['parent_id'], 'path');
                $param['path'] = $parent_path . ',' . $param['parent_id'];
            }
            $model->attributes = $param;
            if($model->validate()){
                $model->save();
                Util::log('分类添加成功', 'core', __FILE__, __LINE__);
                Util::header($this->createUrl('/core/category/index'));
            }
        }
        $this->renderPartial('_add_category', array('model' => $model), false, true);
    }

    /**
     * 更新分类
     */
    public function actionUpdateCategory(){
        if(Yii::app()->request->isPostRequest){
            $param = $this->getParam('Category');
            $model = $this->loadModel($param['id'], 'Category');
            $model->attributes = $param;
            if($model->validate()){
                $model->save();
                Util::log('分类更新成功', 'core', __FILE__, __LINE__);
                Util::header($this->createUrl('/core/category/index'));
            }
        }else{
            $id = $this->getParam('id');
            $model = $this->loadModel($id , 'Category');
        }
        $this->renderPartial('_add_category', array('model' => $model), false, true);

    }

    /**
     * 删除分类
     */
   public function actionDeleteCategory(){
        if(Yii::app()->request->isAjaxRequest){
            $id = $this->getParam('id');
            //删除子类
            $criteria = new CDbCriteria();
            $criteria->addSearchCondition('path', ',' . $id);
            Category::model()->deleteAll($criteria);
            //删除本身
            Category::model()->findByPk($id)->delete();
            Util::log('分类删除成功', 'core', __FILE__, __LINE__);
            echo json_encode(array('status' => 1, 'location' => $this->createUrl('/core/category/index')));
            Yii::app()->end();
        }else{
            throw new CHttpException('无效的请求...');
        }
    }

    /**
     * 根据等级获取分类
     */
    public function actionGetCategoryByLevel(){
        if(Yii::app()->request->isAjaxRequest){
            $result = array();
            $level = $this->getParam('level');
            if($level > 1){
                $level--;
                $list = Category::model()->findAllByAttributes(array('level' => $level));
                if(count($list)){
                    foreach ($list as $value) {
                        $result[] = array('id' => $value->id, 'name' => $value->name);
                    }
                }
            }else{
                $result[] = array('id' => 0, 'name' => '无上级分类');
            }
            echo json_encode($result);
            Yii::app()->end();
        }else{
            throw new CHttpException('无效的请求...');
        }
    }

}