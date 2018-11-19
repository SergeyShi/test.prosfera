
<?php
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;

 Modal::begin([
        'header'=>'<h1>Введите текст рекламы</h1>',
        'id' => 'update-modal', 
        'size'=>'modal-lg']);

    echo "<div id='updateModalContent'></div>";      
    $form = ActiveForm::begin(['id' => 'update-form']); 
    echo $form->field($model, 'id')->textInput(['maxlength' => true]);
    echo $form->field($model, 'text')->textarea(['rows' => 4]);
    echo $form->field($model, 'product_ref')->textInput(['maxlength' => 100]); 
  
    echo Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'save']);
  ActiveForm::end();
 Modal::end(); 
 ?> 
