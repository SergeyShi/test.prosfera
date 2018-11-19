<?php
namespace common\widgets;
namespace frontend\components;

use yii\base\Widget;
use yii\helpers\Html;

class HeaderMenu extends Widget
{
    // public $message;

    // public function init()
    // {
    //     parent::init();
    //     if ($this->message === null) {
    //         $this->message = 'Нет текста для рекламы.';
    //     }
    // }

    public function run()
    {
        return $this->render('header');
    }
}