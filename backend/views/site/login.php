<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login">
        <div id="login-row" class="r_block_login">

            <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => 'form__login']]); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true])
                                ->label('Имя пользователя', ['class'=>'text-white']) ?>

            <?= $form->field($model, 'password')->passwordInput()
                                ->label('Пароль', ['class'=>'text-white'])?>

            <div class="bt-form-group">
                <?= $form->field($model, 'rememberMe')->checkbox()
                                ->label('Запомнить', ['class'=>'text-white'])?>
            </div>
            <div class="bt-form-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-info', 'name' => 'login-button']) ?>
            </div>

                        <?php ActiveForm::end(); ?>
        </div>
</div>

