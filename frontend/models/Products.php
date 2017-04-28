<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $population
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name', 'population'], 'required'],
            [['code'], 'string', 'max' => 10],

            [['name', 'population','title'], 'string', 'max' => 255],
            ['title', 'unique', 'message' => 'This Title has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Name',
            'population' => 'Population',
            'title' => 'title',
        ];
    }
}
