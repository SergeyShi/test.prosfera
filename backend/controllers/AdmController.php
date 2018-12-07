<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 26.11.18
 * Time: 11:26
 */

namespace backend\controllers;


class AdmController extends \yii\web\Controller
{
    public function debug($arr){
       echo '<pre>' . print_r($arr, true) . '</pre>';
    }
}

function debug($arr){
    echo '<pre>' . print_r($arr, true) . '</pre>';
}