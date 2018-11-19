<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
use backend\components\ModalForm;


/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Рекламное оповещение';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clients-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'active',
            'text',
            'product_ref',
            ['class' => 'yii\grid\ActionColumn', 
            'buttons'=> ['update' => function($url,$model,$key){
                return  ModalForm::widget(['id' => $model->id]);
                }],

            ],

        ],
    ]); 
    
    ?>
    <!-- Modal -->


</div>