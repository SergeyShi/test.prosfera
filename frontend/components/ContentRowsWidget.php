<?php
namespace common\widgets;
namespace frontend\components;
use backend\models\ContentCloud;

use yii\base\Widget;
use yii\helpers\Html;

class ContentRowsWidget extends Widget
{

    public function run()
    {
        $contentRows = ContentCloud::find()->all();

        return $this->render('content-rows/clouds',['contentRows' => $contentRows]);
    }
}