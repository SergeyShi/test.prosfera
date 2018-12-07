<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "content_cloud".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 */
class ContentCloud extends \yii\db\ActiveRecord
{
    public $image;

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
        return 'content_cloud';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['name'], 'string', 'max' => 150],
            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if($this->validate())
        {
            $path =  'uploads/store/' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path);
            @unlink($path);
            return true;
        }else
            {
                return false;
            }

    }  

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'description' => 'Описание',
            'image' => 'Картинка',
        ];
    }
}
