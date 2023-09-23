<?php

namespace app\models;

use yii\db\ActiveRecord;

class Profile extends ActiveRecord
{
    public static function tableName() : string
    {
        return '{{profile}}';
    }

    public static function getList() : array{
       $rows = self::find()
            ->select(['id', 'name'])
            ->asArray()
            ->all();
       $list = [];

       foreach($rows as $row){
           $list[$row['id'] ] = $row['name'];
       }

       return $list;
    }

    public static function isIdExist($id) : bool {
        return (bool) self::find()->where(['id' => $id])->count();
    }
}