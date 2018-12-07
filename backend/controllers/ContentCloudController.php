<?php

namespace backend\controllers;
use Yii;
use yii\data\ActiveDataProvider;
use backend\models\ContentCloud;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;

class ContentCloudController extends \yii\web\Controller
{

     public function behaviors()
     {
        return [
    //     	'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'delete' => ['POST'],
    //             ],
    //         ],
//              'access' => [
//                  'class' => AccessControl::className(),
//                  'rules' => [
//                      [
//                          'actions' => ['login', 'error'],
//                          'allow' => true,
//                     ],
//                      [
//                          'actions' => ['logout', 'index'],
//                          'allow' => true,
//                          'roles' => ['@'],
//                      ],
//                  ],
//             ],
        ];
    }

    public function actionIndex()
    {
//        $model = new ContentCloud();
//        $dataProvider = new ActiveDataProvider([
//                 'query' => ContentCloud::find(),
//                 'pagination' => [
//                 'pageSize' => 20,
//                  ],
//		]);
//		if ($model->load(Yii::$app->request->post()) && $model->save()) {
//
//              $model->image = UploadedFile::getInstance($model,'image');
//              if ($model->image){
//              	$model->upload();
//              }
//              Yii::$app->session->setFlash('success', "Новая запись добавлена!");
//            return $this->redirect(['index']);
//        }
//
//           // return $this->renderAjax('index', ['model' => $model]);
//         return $this->render('index', [
//             //'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//             'model' => $model,
//         ]);
        return $this->renderList();
    }

     public function actionCreate()
    {
        $model = new ContentCloud();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            //return $this->redirect(['index']);
            Yii::$app->session->setFlash('success', "Новая запись добавлена!");
            return $this->renderList();
        }

        if(Yii::$app->request->isAjax){

            return $this->renderAjax('_form', ['model' => $model,
             ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate() ) {
        	$model->save();

        	$model->image = UploadedFile::getInstance($model, 'image');

        	if ($model->image) {
        		$model->upload();
        	}

        	return $this->redirect(['index']);

    	}else{
    		if(Yii::$app->request->isAjax){

    			return $this->renderAjax('_form', ['model' => $model,
    		]);
    		}else{
    			return $this->render('update', [
       			 'model' => $model,
   				 ]);
    		}
    	}
  
    }

    public function actionDelete($id)
    {
       
      if(Yii::$app->request->isAjax){

    		$this->findModel($id)->delete();
    		Yii::$app->session->setFlash('success', "Запись удалена!");
            
     	 	return $this->renderAjax(['index']);

    	}else{

    		$this->findModel($id)->delete();
            Yii::$app->session->setFlash('success', "Запись удалена!");

    		return $this->renderList();
    	}
    }

	protected function findModel($id)
    {
        if (($model = ContentCloud::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    

    protected function renderList()
{
    //$searchModel = new ModelSearch();
    $dataProvider = $dataProvider = new ActiveDataProvider([
                 'query' => ContentCloud::find(),
                 'pagination' => [
                 'pageSize' => 20,
                  ],
		]);

    $dataProvider->sort->route = Url::to(['index']);

    $method = Yii::$app->request->isAjax ? 'renderAjax' : 'render';

    return $this->$method('index', [
        //'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]);
}

}
