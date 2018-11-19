<?php

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use backend\models\Notification;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

class NotificationController extends Controller
{
	 public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        //$model = new Notification();
        $dataProvider = new ActiveDataProvider([
                 'query' => Notification::find(),
                 'pagination' => [
                 'pageSize' => 20,
                  ],
		]);
        
       // return $this->render('index', compact('model'));
         return $this->render('index', [
             //'searchModel' => $searchModel,
             'dataProvider' => $dataProvider,
         ]);
    }

	protected function findModel($id)
    {
        if (($model = Notification::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function search($params)
    {
        $query = Notification::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', 'Text', $this->Text])
            ->andFilterWhere(['like', 'ID', $this->ID]);

        return $dataProvider;
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

}
