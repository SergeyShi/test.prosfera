<?php

namespace app\controllers;
namespace backend\controllers;
use yii\web\Controller;
use backend\models\AdminForm;
use Yii;

class AdminController extends Controller
{
    public function actionIndex(){

        $model = new AdminForm();
        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()){

            }else{

            }

        }

        return $this->render('index', compact('model'));
    }

}
