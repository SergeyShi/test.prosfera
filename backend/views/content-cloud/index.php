<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Карусель услуг';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="clients-index">


    <?php ?>

    <p>
      <?=

      Html::button('Добавить запись', [
          'id' => 'createBtn',
          'class' => 'btn btn-success',
          'value' => Url::to(['content-cloud/create'])
      ])

      ?>

      <?php Modal::begin([
          'header'=>'<h1>Заполните поля для вывода карусели товаров</h1>',
          'id' => 'update-modal',
          'size'=>'modal-lg']);
        ?> 


    <?php Modal::end(); ?>
    <?php
        Modal::begin([
                    'header'=>'Удалить текущую запись?',
                    'id' => 'delete-modal',
                    'size'=>'modal-sm']);
                echo "<div id='modal-body'></div>";
                $form = ActiveForm::begin(['id' => 'delete-form',
                                            'options' => ['enctype' => 'multipart/form-data']]);
                echo "<div class='modal-footer'>";
                echo Html::submitButton('Удалить', ['class' => 'btn btn-danger', 'name' => 'delete-action']);
                echo Html::Button('Отмена', ['class' => 'btn btn-secondary', 'data-dismiss' => 'modal']);
                echo "</div>";
                ActiveForm::end();
               Modal::end();
    ?>

    </p>

<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped table-hover'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'description',
            ['class' => 'yii\grid\ActionColumn', 
                'options'=>['class'=>'action-column'],
    			'template'=>'{update} {delete}',
    			'buttons'=>[
           		 'delete' => function($url,$model,$key){
                         $btn = Html::button("<span class='glyphicon glyphicon-trash'></span>",[
                    'value'=>Url::to(['content-cloud/delete', 'id' => $key]),
                    'class'=>'btn btn-danger delete-modal-click grid-action',
                    'data-toggle'=>'tooltip',
                    'data-placement'=>'bottom',
                    'title'=>'Delete'
            ]);
            return $btn;
        },
                 'update' => function($url,$model,$key){
                         $btn = Html::button("<span class='glyphicon glyphicon-pencil'></span>",[
                    'value'=>Url::to(['content-cloud/update', 'id' => $key]),
                    'class'=>'btn btn-default update-modal-click grid-action',
                    'data-toggle'=>'tooltip',
                    'data-placement'=>'bottom',
                    'title'=>'Update'
            ]);
            return $btn;
        }
        ]
    ],
    ],
    ]);
?>
<?php Pjax::end();?>
<?php

$this->registerJs(<<<JS
   
	$('.delete-modal-click').on('click', function(){
		$('#delete-modal').modal('show');	
		$('#delete-form').attr('action', $(this).attr('value'));
	});
	$('.update-modal-click').on('click', function(){
		$('#update-modal').modal('show');	
		$('#update-modal').find('.modal-body').load($(this).attr('value'));
	});	
	$('#createBtn').on('click', function(){
		$('#update-modal').modal('show');	
		$('#update-modal').find('.modal-body').load($(this).attr('value'));
	});	
JS
); 	
?>

</div>

