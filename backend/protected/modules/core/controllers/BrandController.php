<?php

class BrandController extends Controller
{

    /**
     * 品牌列表
     */
    public function actionIndex()
    {
        $title = '品牌列表';
        $list = Brand::model()->findAll();
        $this->render('index', array('title' => $title, 'list' => $list));
    }

    /**
     * 添加品牌
     */
    public function actionAddBrand(){
        $model = new Brand();
        if(Yii::app()->request->isPostRequest){
            $param = $this->getParam('Brand');
            $param['create_time'] = time();
            $model->attributes = $param;
            if($model->validate()){
                $image = CUploadedFile::getInstance($model, 'logo');
                if (is_object($image) && get_class($image) === 'CUploadedFile'){
                    $model->logo = '/brand/' . date('YmdHis') . rand(1000, 9999) . '.jpg';
                    $save_path = Yii::app()->params['uploadPath'] . $model->logo;
                    $image->saveAs($save_path);
                }
                $model->save();
                Util::log('品牌添加成功', 'core', __FILE__, __LINE__);
                Util::header($this->createUrl('/core/brand/index'));
            }
        }
        $this->renderPartial('_add_brand', array('model' => $model), false, true);
    }

    /**
     * 更新品牌
     *
     */
    public function actionUpdateBrand(){
        if(Yii::app()->request->isPostRequest){
            $param = $this->getParam('Brand');
            $model = $this->loadModel($param['id'], 'Brand');
            $logo = $model->logo;
            $model->attributes = $param;
            if($model->validate()){
                $image = CUploadedFile::getInstance($model, 'logo');
                if (is_object($image) && get_class($image) === 'CUploadedFile'){
                    $filename = Yii::app()->params['uploadPath'] . $logo;
                    if(file_exists($filename)){
                       unlink($filename);
                    }
                    $model->logo = '/brand/' . date('YmdHis') . rand(1000, 9999) . '.jpg';
                    $save_path = Yii::app()->params['uploadPath'] . $model->logo;
                    $image->saveAs($save_path);
                }else{
                    $model->logo = $logo;
                }
                $model->save();
                Util::log('品牌更新成功', 'core', __FILE__, __LINE__);
                Util::header($this->createUrl('/core/brand/index'));
            }
        }else{
            $id = $this->getParam('id');
            $model = $this->loadModel($id , 'Brand');
        }
        $this->renderPartial('_add_brand', array('model' => $model), false, true);

    }

    /**
     * 删除品牌
     */
   public function actionDeleteBrand(){
        if(Yii::app()->request->isAjaxRequest){
            $id = $this->getParam('id');
            $model = $this->loadModel($id, 'Brand');
            $filename = Yii::app()->params['uploadPath'] . $model->logo;
            if(file_exists($filename)){
                unlink($filename);
            }
            $model->delete();
            Util::log('品牌删除成功', 'core', __FILE__, __LINE__);
            echo json_encode(array('status' => 1, 'location' => $this->createUrl('/core/brand/index')));
            Yii::app()->end();
        }else{
            throw new CHttpException('无效的请求...');
        }
    }

}