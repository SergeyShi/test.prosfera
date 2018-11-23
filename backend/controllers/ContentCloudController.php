<?php

namespace backend\controllers;
use Yii;
use yii\data\ActiveDataProvider;
use backend\models\ContentCloud;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

class ContentCloudController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new ContentCloud();
        $dataProvider = new ActiveDataProvider([
                 'query' => ContentCloud::find(),
                 'pagination' => [
                 'pageSize' => 20,
                  ],
		]);
		/*  if ($model->load(Yii::$app->request->post()) && $model->save()) {

              $model->image = UploadedFile::getInstance($model,'image');

              Yii::$app->session->setFlash('success', "Новая запись добавлена!");
            return $this->redirect(['index', 'id' => $model->ID]);
        }*/

           // return $this->renderAjax('index', ['model' => $model]);
         return $this->render('index', [
             //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
             'model' => $model,
         ]);
    }

     public function actionCreate()
    {
        $model = new ContentCloud();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['index', 'id' => $model->ID]);
        }

        return $this->render('_form', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate() ) {
        //prepare model to save if necessary
        $model->save();
        return $this->redirect(['index']); //<---This would return to the gridview once model is saved
    }
        return $this->renderAjax('update', [
        'model' => $model,
    ]);
    }

	protected function findModel($id)
    {
        if (($model = ContentCloud::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
