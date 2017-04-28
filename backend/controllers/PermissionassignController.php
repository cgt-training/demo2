<?php

namespace backend\controllers;

use Yii;
use app\models\PermissionAssign;
use app\models\Permission;
use app\models\PermissionAssignSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\db\Query;

/**
 * PermissionAssignController implements the CRUD actions for PermissionAssign model.
 */
class PermissionassignController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {    $this->layout='dashboard';
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PermissionAssign models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PermissionAssignSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PermissionAssign model.
     * @param string $parent
     * @param string $child
     * @return mixed
     */
    public function actionView($parent, $child)
    {   $selectitem = $this->getallselectitem($parent);
        $model = $this->findModel($parent, $child);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new PermissionAssign model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PermissionAssign();
        $auth = Yii::$app->authManager;
        $authitem = $this->getauthitem();
        $authlist = Permission::find()->where(['type' => 1])->all();
        $listroleData=ArrayHelper::map($authlist,'name','name'); 
       // $this->p($listroleData);
        if ($model->load(Yii::$app->request->post())) {
            //$this->p(Yii::$app->request->post());
            $parent = $model->parent;
           $parent =  $this->deleteauthchildbyparent($parent);

              $child = $model->child;
              foreach ($child as $key => $value) {
                       
                      $createPost = $auth->createPermission($value);  
                      //$this->p($model->parent);
                      $author = $auth->createRole($model->parent);
                        //$auth->add($author);
                      $auth->addChild($author, $createPost); 
                     } 
            //$auth->add($author);
            
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,'authitem' => $authitem,'parent' =>$listroleData
            ]);
        }
    }

    /**
     * Updates an existing PermissionAssign model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $parent
     * @param string $child
     * @return mixed
     */
    public function actionUpdate($parent, $child)
    {
        
       
        $model = $this->findModel($parent, $child);
        $auth = Yii::$app->authManager;
          $authlist = Permission::find()->where(['type' => 1])->all();
        $listroleData=ArrayHelper::map($authlist,'name','name'); 
        $authitem = $this->getauthitem();
        $selectitem = $this->getallselectitem($parent);
     
        $model->child = $selectitem;
        if ($model->load(Yii::$app->request->post())) {
            $data = Yii::$app->request->post();
            if(!empty($data)){
              $parent = $model->parent;  
             $parent =  $this->deleteauthchildbyparent($parent);

              $child = $model->child;
              foreach ($child as $key => $value) {
                       
                      $createPost = $auth->createPermission($value);  
                      //$this->p($model->parent);
                      $author = $auth->createRole($model->parent);
                        //$auth->add($author);
                      $auth->addChild($author, $createPost); 
                     }       
            }
            
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,'child' => $authitem,'authitem'=>$authitem,'parent' =>$listroleData
            ]);
        }
    }

    /**
     * Deletes an existing PermissionAssign model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $parent
     * @param string $child
     * @return mixed
     */
    public function actionDelete($parent, $child)
    {
        $this->findModel($parent, $child)->delete();

        return $this->redirect(['index']);
    }
    public function Deleteauthchildbyparent($parent= null){
        $return = '';
        if(!empty($parent)){
           // $this->findModel($parent)->delete();
             $query = new Query;
             $query ->createCommand()
            ->delete('auth_item_child', ['parent' => $parent])
            ->execute();
            return $parent;
        }
         return;
    }
    /**
     * Finds the PermissionAssign model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $parent
     * @param string $child
     * @return PermissionAssign the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($parent, $child)
    {
        if (($model = PermissionAssign::findOne(['parent' => $parent, 'child' => $child])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function Getauthitem(){
        $query = new Query;
        $query  ->select(['au.name AS name','au.type AS type'])  
                ->from('auth_item AS au')
                ->where(['type' => '2']);
        $command = $query->createCommand();
        $data = $command->queryAll();
        $listauthData=ArrayHelper::map($data,'name','name'); 
        return $listauthData;
    }
    public function Getallselectitem($parent = null){
        if(!empty($parent)){
            $query = new Query;
        $query  ->select(['ac.child AS child'])  
                ->from('auth_item_child AS ac')
                ->where(['parent' => $parent]);
        $command = $query->createCommand();
        $data = $command->queryAll();
        $selectData=ArrayHelper::map($data,'child','child'); 
        return $selectData;
        }else{
            return;
        }

    }
}
