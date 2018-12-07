<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
//use mihaildev\ckeditor\CKeditor;
//use mihaildev\elfinder\ElFinder;
//use dosamigos\tinymce\TinyMce;
use vova07\imperavi\Widget;


    $img = $model->getImage();
    echo "<div id='modal-content'></div>";      
    $form = ActiveForm::begin(['id' => 'update-form',
                                'options' => ['enctype' => 'multipart/form-data']]); 
   // echo $form->field($model, 'id')->textInput(['maxlength' => true]);
    echo $form->field($model, 'name')->textInput();
    echo $form->field($model, 'description')->widget(Widget::className(), [
        'settings' => [
            'lang' => 'ru',
            'minHeight' => 200,
            'plugins' => [
                'clips',
                'fullscreen',
            ],
            'clips' => [
                ['Lorem ipsum...', 'Lorem...'],
                ['red', '<span class="label-red">red</span>'],
                ['green', '<span class="label-green">green</span>'],
                ['blue', '<span class="label-blue">blue</span>'],
            ],
        ],
    ]);
    echo "<img src='{$img->getPath('x100')}'>";
    echo $form->field($model, 'image')->fileInput();

    echo Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'save']);
  ActiveForm::end();
// Modal::end(); 
 ?> 