<?php
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;

 Modal::begin([
        'header'=>'<h1>Заполните поля для вывода карусели товаров</h1>',
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
 Modal::end(); 
 ?> 