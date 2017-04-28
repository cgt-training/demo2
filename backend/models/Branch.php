<?php

namespace app\models;

use Yii;
use yii\validators\Validator;
//use yii\validators\UniqueValidator;

/**
 * This is the model class for table "branch".
 *
 * @property integer $branch_id
 * @property integer $company_fk_id
 * @property string $branch_name
 * @property string $branch_created
 * @property string $branch_status
 *
 * @property Company $companyFk
 * @property Department[] $departments
 */
class Branch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'branch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_fk_id', 'branch_name', 'branch_created','branch_status'], 'required'],
            [['company_fk_id'], 'integer'],
            [['branch_created'], 'safe'],
            [['branch_status'], 'string'],
            [['branch_name'], 'string', 'max' => 255],
            [['branch_name'], 'unique','targetAttribute' => array('branch_name', 'company_fk_id')],
            [['company_fk_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_fk_id' => 'company_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'branch_id' => 'Branch ID',
            'company_fk_id' => 'Company Name',
            'branch_name' => 'Branch Name',
            'branch_created' => 'Branch Created',
            'branch_status' => 'Branch Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['company_id' => 'company_fk_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Department::className(), ['branch_fk_id' => 'branch_id']);
    }
    public function validateUsername($attribute, $params)
    {   
        if (preg_match('/^[a-zA-Z\s]+$/', $this->$attribute)) {
             $this->addError($attribute, 'Username should only contain alphabets');
        }
        if ( ! preg_match('/^.{3,8}$/', $this->$attribute) ) {
             $this->addError($attribute, 'Username must be bwtween 3 to 8 characters.');
        }
    }
}
