<?php
use yii\widgets\ActiveForm;


$form = ActiveForm::begin();

foreach ($model as $index => $setting) {
    echo $form->field($setting, "[$index]")->label('Кол');
}
//$form->field($model, 'elements_in_row')->textInput();
//echo "Количество элементов в строке: " . $model['elements_in_row'];
ActiveForm::end();
?>