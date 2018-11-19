
<?php
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

 Modal::begin(['header'=>'<h1>Введите текст рекламы</h1>',
	    	 'toggleButton' => [
	    	 	'label' => 'Изменить',
	    	 	'class' => 'btn btn-primary',
	    	 	]]); 
		$form = ActiveForm::begin(['class' => 'form-update', 
			'action' => Url::toRoute(['notification/update', 'id' => $model->id]),
		]);
		//echo $form->field($sModel, 'id')->textInput(['maxlength' => true]);
		echo $form->field($model, 'text')->textarea(['rows' => 4])->hint($model->text);
		echo $form->field($model, 'product_ref')->textInput(['maxlength' => 100]);  
		echo $form->field($model, 'active')->checkbox()->label('Активна');
	
		echo Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'save']);
	ActiveForm::end();
 Modal::end(); 
 ?> 