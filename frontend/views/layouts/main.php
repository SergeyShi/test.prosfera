<?php

/* @var $this \yii\web\View */
/* @var $content string */

//use app\widgets\Alert;
use yii\helpers\Html;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
use frontend\components\CloudNotification;
use frontend\components\HeaderMenu;
use frontend\assets\AppAsset;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon-precomposed" href="/frontend/web/img/icons/apple-touch-icon.png">
    <link rel="icon" href="/frontend/web/img/icons/favicon.ico">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    
</head>
<body>
<?php $this->beginBody() ?>
<!-- Header -->
<?= HeaderMenu::widget() ?>
<?= CloudNotification::widget() ?>

<?= $content ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
