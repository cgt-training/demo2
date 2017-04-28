<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use app\models\Company;
use app\models\Branch;
use app\models\Department;
use app\models\Permission;
use app\models\PermissionAssign;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    { 
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {   $this->layout='dashboard';
        $count = Array();
        $count['company']           = Company::find()->count();
        $count['branch']            = Branch::find()->count();
        $count['department']        = Department::find()->count();
        $count['permission']        = Permission::find()->count();
        $count['permissionassign']  = PermissionAssign::find()->count();
        return $this->render('index',['count' => $count]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    { 
        $this->layout='login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    { //echo "logout";exit;
        Yii::$app->user->logout();
         $model = new LoginForm();
        return $this->goHome();
    }
}
