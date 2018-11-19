<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 07.11.18
 * Time: 18:17
 */

namespace common\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class HeaderNotification extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = 'Нет текста для рекламы.';
        }
    }

    public function run()
    {
        return Html::encode($this->message);
    }
}