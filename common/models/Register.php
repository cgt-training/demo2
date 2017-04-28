<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class Register extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%register}}';
    }

    public function behaviors()
    { 
        return [
            TimestampBehavior::className(),
        ];
    }
  public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    public function rules()
    {
        return [
            
        ];
    }
     public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    public function getId()
    {
        return $this->getPrimaryKey();
    }
    public function getAuthKey()
    {
        return $this->auth_key;
    }
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    
   
    
   

    


}
