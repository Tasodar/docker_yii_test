<?php

namespace app\models;

use yii\db\ActiveRecord;

class Post extends ActiveRecord
{
    public function rules() :array
    {
        return [
            [['title', 'body', 'profile_id'], 'required'],
            ['title', 'sring']
        ];
    }

    public static function tableName()
    {
        return '{{post}}';
    }

    public function getCount() : int {
        return self::find()->count();
    }
}