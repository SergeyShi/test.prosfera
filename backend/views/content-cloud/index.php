<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
use backend\components\ModalForm;


/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Карусель услуг';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="clients-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить запись', ['index'], ['id'=>'modal-btn', 'data-target'=>'update', 'class' => 'btn btn-success']);
      /*    Modal::begin([
                    'header'=>'<h1>Заполните поля для вывода карусели товаров</h1>',
                    'toggleButton' => ['label' => 'Добавить запись', 'class' => 'btn btn-success'],
                    'id' => 'update-modal',
                    'size'=>'modal-lg']);

                echo "<div id='updateModalContent'></div>";
                $form = ActiveForm::begin(['id' => 'update-form',
                                            'options' => ['enctype' => 'multipart/form-data']]);
                echo $form->field($model, 'id')->textInput(['maxlength' => true]);
                echo $form->field($model, 'name')->textInput();
                echo $form->field($model, 'description')->textInput(['maxlength' => 400]);
                echo $form->field($model, 'image')->fileInput();
                echo Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'save']);
                ActiveForm::end();
               Modal::end();*/


?>



    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'description',
            ['class' => 'yii\grid\ActionColumn', 
            'buttons'=> ['update' => function($url,$model,$key){
                return Html::a('Изменить', [''], ['id' => '','class' => 'btn btn-success', 'data-target'=>'update']);
                }],

            ],

        ],
    ]);
    Modal::begin([
        'header'=>'<h1>Заполните поля для вывода карусели товаров</h1>',
        'id' => 'modal',
        'size'=>'modal-lg']);
    ?>

    <div id='modal-content'>Загружаю...</div>

    <?php yii\bootstrap\Modal::end(); ?>


</div>
<?= $script = <<< JS
    var elem = document.getElementById("modal-btn");
     elem.onclick = function() {

        $('#modal').modal('show')
            .find('#modal-content')
            .load($(this).attr('data-target'));
    };
JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_READY);?>
