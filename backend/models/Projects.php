<?php
namespace frontend\models;

use yii\base\Model;
use common\models\Projects;

/**
 * Signup form
 */
class Projects extends Model
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
            ['tile', 'required'],
            ['title', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['title', 'string', 'min' => 2, 'max' => 255],

            [

            
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function index()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
