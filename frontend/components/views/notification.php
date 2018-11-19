<?php
use yii\helpers\Html;
use yii\helpers\Url;
use backend\models\Notification;
//use frontend\components\CloudNotification;
?>
<?php $messages = Notification::find()->where(['active' => 1])->all();?>
<!-- Notification -->
<?php foreach ($messages as $message): ?>

<section id="notification" data-dismissible="true" data-title="" data-expires="">
    <div class="container">
        <p>
            	<?= $message->text; ?><a class="text-margin-left" href="products-block-storage.html">Learn more<i class="fa fa-angle-right icon-right"></i></a>
        </p>
    </div>
</section>
<?php endforeach; ?>