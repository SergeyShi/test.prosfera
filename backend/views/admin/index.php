<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

    <div class="container">
    <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6">
            <div class="box">
                <div class="shape1"></div>
                <div class="shape2"></div>
                <div class="shape3"></div>
                <div class="shape4"></div>
                <div class="shape5"></div>
                <div class="shape6"></div>
                <div class="shape7"></div>
                <div class="float">
                    <?php $form = ActiveForm::begin([
                            'id' => 'login-form',
                        'options' => ['class'=>'form'],
                        ]) ?>
                        <div class="form-group">
                            <?= $form->field($model, 'name')->
                            textInput(['autofocus' => true, 'class' => 'form-control'])?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'password')->passwordInput()?>
                        </div>
                        <div class="form-group">
                            <?= Html::submitButton('Login', ['class' => 'btn btn-info btn-md', 'name' => 'login-button']) ?>
                        </div>
                    <?php $form = ActiveForm::end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
