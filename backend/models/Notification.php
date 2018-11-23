<?php

namespace backend\models;
use Yii;

/**
 * This is the model class for table "widget_notification".
 *
 * @property int $id
 * @property string $text
 * @property string $product_ref
 */
class Notification extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    public static function tableName()
    {
        return '{{%widget_notification}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'text'], 'required'],
            [['id'], 'integer'],
            [['text'], 'string'],
            [['product_ref'], 'string', 'max' => 100],
            [['active'], 'integer', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Текст рекламы',
            'product_ref' => 'Ссылка на товар',
            'active' => 'Активна',
        ];
    }

    // public function changeText()
    // {
    //     if (!$this->validate()) {
    //         return null;
    //     }
        
    //     $user = new Notification();
    //     $user->username = $this->username;
    //     $user->email = $this->email;
    //     $user->setPassword($this->password);
    //     $user->generateAuthKey();
        
    //     return $user->save() ? $user : null;
    // }
}
