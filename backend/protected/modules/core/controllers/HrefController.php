<?php

class HrefController extends Controller
{

    /**
     * 友情链接列表
     */
    public function actionIndex()
    {
        $title = '友情链接列表';
        $list = Href::model()->findAll();
        $this->render('index', array('title' => $title, 'list' => $list));
    }

    /**
     * 添加友情链接
     */
    public function actionAddHref(){
        $model = new Href();
        if(Yii::app()->request->isPostRequest){
            $param = $this->getParam('Href');
            $param['create_time'] = time();
            $model->attributes = $param;
            if($model->validate()){
                $image = CUploadedFile::getInstance($model, 'path');
                if (is_object($image) && get_class($image) === 'CUploadedFile'){
                    $model->path = '/href/' . date('YmdHis') . rand(1000, 9999) . '.jpg';
                    $save_path = Yii::app()->params['uploadPath'] . $model->path;
                    $image->saveAs($save_path);
                }
                $model->save();
                Util::log('友情链接添加成功', 'core', __FILE__, __LINE__);
                Util::header($this->createUrl('/core/href/index'));
            }
        }
        $this->renderPartial('_add_href', array('model' => $model), false, true);
    }

    /**
     * 更新友情链接
     *
     */
    public function actionUpdateHref(){
        if(Yii::app()->request->isPostRequest){
            $param = $this->getParam('Href');
            $model = $this->loadModel($param['id'], 'Href');
            $path = $model->path;
            $model->attributes = $param;
            if($model->validate()){
                $image = CUploadedFile::getInstance($model, 'path');
                if (is_object($image) && get_class($image) === 'CUploadedFile'){
                    $filename = Yii::app()->params['uploadPath'] . $path;
                    if(file_exists($filename)){
                       unlink($filename);
                    }
                    $model->path = '/href/' . date('YmdHis') . rand(1000, 9999) . '.jpg';
                    $save_path = Yii::app()->params['uploadPath'] . $model->path;
                    $image->saveAs($save_path);
                }else{
                    $model->path = $path;
                }
                $model->save();
                Util::log('友情链接更新成功', 'core', __FILE__, __LINE__);
                Util::header($this->createUrl('/core/href/index'));
            }
        }else{
            $id = $this->getParam('id');
            $model = $this->loadModel($id , 'Href');
        }
        $this->renderPartial('_add_href', array('model' => $model), false, true);

    }

    /**
     * 删除友情链接
     */
   public function actionDeleteHref(){
        if(Yii::app()->request->isAjaxRequest){
            $id = $this->getParam('id');
            $model = $this->loadModel($id, 'Href');
            $filename = Yii::app()->params['uploadPath'] . $model->path;
            if(file_exists($filename)){
                unlink($filename);
            }
            $model->delete();
            Util::log('友情链接删除成功', 'core', __FILE__, __LINE__);
            echo json_encode(array('status' => 1, 'location' => $this->createUrl('/core/href/index')));
            Yii::app()->end();
        }else{
            throw new CHttpException('无效的请求...');
        }
    }

}