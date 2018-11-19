<?php
namespace common\widgets;
namespace frontend\components;

use yii\base\Widget;
use yii\helpers\Html;

class ContentRows extends Widget
{

    public function run()
    {
        return $this->render('content-rows/clouds');
    }
}