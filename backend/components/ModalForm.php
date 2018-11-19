<?php

namespace common\widgets;
namespace backend\components;
use Yii;
use backend\models\Notification;
use yii\base\Widget;

class ModalForm extends Widget
{

    public function run()
    {
    	$id = Yii::$app->request->get('id');

        $model = $this->findModel($this->id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        	
            //return Yii::$app->session->setFlash('notifFormSubmitted');
            return $this->render('update', ['model' => $model]);
        }
    
        return $this->render('modal', ['model' => $model]);
    }

    protected function findModel($id)
    {
        if (($model = Notification::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}