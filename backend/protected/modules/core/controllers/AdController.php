<?php

class AdController extends Controller
{

    /**
     * 广告列表
     */
    public function actionIndex()
    {
        $title = '广告列表';
        $list = Ad::model()->findAll();
        $this->render('index', array('title' => $title, 'list' => $list));
    }

    /**
     * 添加广告
     */
    public function actionAddAd(){
        $model = new Ad();
        if(Yii::app()->request->isPostRequest){
            $param = $this->getParam('Ad');
            $param['create_time'] = time();
            $model->attributes = $param;
            if($model->validate()){
                $image = CUploadedFile::getInstance($model, 'path');
                if (is_object($image) && get_class($image) === 'CUploadedFile'){
                    $model->path = '/ad/' . date('YmdHis') . rand(1000, 9999) . '.jpg';
                    $save_path = Yii::app()->params['uploadPath'] . $model->path;
                    $image->saveAs($save_path);
                }
                $model->save();
                Util::log('广告添加成功', 'core', __FILE__, __LINE__);
                Util::header($this->createUrl('/core/ad/index'));
            }
        }
        $this->renderPartial('_add_ad', array('model' => $model), false, true);
    }

    /**
     * 更新广告
     *
     */
    public function actionUpdateAd(){
        if(Yii::app()->request->isPostRequest){
            $param = $this->getParam('Ad');
            $model = $this->loadModel($param['id'], 'Ad');
            $path = $model->path;
            $model->attributes = $param;
            if($model->validate()){
                $image = CUploadedFile::getInstance($model, 'path');
                if (is_object($image) && get_class($image) === 'CUploadedFile'){
                    $filename = Yii::app()->params['uploadPath'] . $path;
                    if(file_exists($filename)){
                       unlink($filename);
                    }
                    $model->path = '/ad/' . date('YmdHis') . rand(1000, 9999) . '.jpg';
                    $save_path = Yii::app()->params['uploadPath'] . $model->path;
                    $image->saveAs($save_path);
                }else{
                    $model->path = $path;
                }
                $model->save();
                Util::log('广告更新成功', 'core', __FILE__, __LINE__);
                Util::header($this->createUrl('/core/ad/index'));
            }
        }else{
            $id = $this->getParam('id');
            $model = $this->loadModel($id , 'Ad');
        }
        $this->renderPartial('_add_ad', array('model' => $model), false, true);

    }

    /**
     * 删除广告
     */
   public function actionDeleteAd(){
        if(Yii::app()->request->isAjaxRequest){
            $id = $this->getParam('id');
            $model = $this->loadModel($id, 'Ad');
            $filename = Yii::app()->params['uploadPath'] . $model->path;
            if(file_exists($filename)){
                unlink($filename);
            }
            $model->delete();
            Util::log('广告删除成功', 'core', __FILE__, __LINE__);
            echo json_encode(array('status' => 1, 'location' => $this->createUrl('/core/ad/index')));
            Yii::app()->end();
        }else{
            throw new CHttpException('无效的请求...');
        }
    }

}