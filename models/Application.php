<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Application extends ActiveRecord
{
    public static function tableName()
    {
        return 'application';
    }

    public function rules()
    {
        return [
            [['first_name', 'last_name', 'date_of_birth'], 'required'],
            [['date_of_birth'], 'date', 'format' => 'php:Y-m-d'],
            [['description'], 'string'],
            [['income'], 'number'],
            [['number_of_dependants'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 255],
        ];
    }
}
