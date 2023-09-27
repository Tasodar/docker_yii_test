<?php

namespace app\models;

use yii\db\ActiveRecord;

class Post extends ActiveRecord
{
    public function rules() :array
    {
        return [
            [['title', 'body', 'description', 'profile_id'], 'required'],
            [['profile_id'], 'isProfileIdValid']
        ];
    }
    public static function tableName() : string
    {
        return '{{post}}';
    }

    public function getProfile() {
        return $this->hasOne(Profile::class, ['id' => 'profile_id'])->one();
    }

    public function getAuthor() : string{
        $author = $this->getProfile();
        return $author ?  $author->name :  "Not set";

    }

    public function isProfileIdValid($attribute, $params, $validator) {
        if(Profile::isIdExist($this->$attribute)) {
            return;
        }
        $this->addError($attribute, 'Just i vant to stop this madness' );
    }
}