<?php
namespace frontend\models;

use yii\base\Model;

use common\models\Register;
/**
 * Signup form
 */
class Registers extends Model
{
    public $title;
    public $details;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['title', 'trim'],
            ['title', 'required'],
            ['title', 'unique', 'targetClass' => '\common\models\Register', 'message' => 'This username has already been taken.'],
            ['title', 'string', 'min' => 2, 'max' => 255],

            ['details', 'trim'],
            ['details', 'required'],
            ['details', 'string', 'min' => 2, 'max' => 255],

        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function register()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $register = new register();
        $register->title = $this->title;
        $register->details = $this->details;
        //echo "<pre>";
        //print_r($register);exit;
        return $register->save() ? $register : null;
    }
}
