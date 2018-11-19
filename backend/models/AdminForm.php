<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 03.11.18
 * Time: 21:33
 */

namespace backend\models;
use yii\base\Model;

class AdminForm extends Model
{
    public $name;
    public $password;

    public function attributeLabels()
    {
        return [
            'name' => 'Имя пользователя',
            'password' => 'Пароль',
        ];
    }

    public function rules()
    {
        return [
           [['name', 'password'], 'required'],
        ];
    }
}