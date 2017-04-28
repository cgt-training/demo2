<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
/**
 * This is the model class for table "country".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $population
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name', 'population','country_image'], 'required'],
            [['code'], 'string', 'max' => 10],
            [['file'], 'file'],
         
            //[['country_image'], 'file', 'skipOnEmpty' => false, 'extensions'=>['jpg', 'png'], 'checkExtensionByMimeType'=>false],
            [['name', 'population'], 'string', 'max' => 255],
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
            'country_image'=>'country_image',
            'population' => 'Population',
        ];
    }
    public function upload()
    {
        if ($this->validate()) {

            $this->country_image->saveAs('uploads/' . $this->country_image->baseName . '.' . $this->country_image->extension);
            return true;
        } else {
            return false;
        }
    }
}
