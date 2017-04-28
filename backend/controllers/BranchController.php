<?php

namespace backend\controllers;

use Yii;
use app\models\Branch;
use app\models\BranchSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Company;
use yii\helpers\ArrayHelper;
use yii\db\Query;

/**
 * BranchController implements the CRUD actions for Branch model.
 */
class BranchController extends Controller
{
   /**
     * @inheritdoc
     */
    public function behaviors()
    {
         $this->layout='dashboard';
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
     * Lists all Branch models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BranchSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Branch model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {  
    $model = Branch::find()->joinWith('company')->where(['branch_id' => $id])->one();
   
    return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Branch model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
         if (Yii::$app->user->can('create_branch')) {
            $model = new Branch();
             $company = Company::find()->all();
             $listcompanyData=ArrayHelper::map($company,'company_id','company_name'); 
             
            if ($model->load(Yii::$app->request->post()) && $model->save()) {

                return $this->redirect(['view', 'id' => $model->branch_id]);
            } else {
                return $this->render('create', [
                    'model' => $model,'listcompanyData'=> $listcompanyData,
                ]);
            }
           }else{
                return $this->redirect(['notpermission']);
           } 
    }

    /**
     * Updates an existing Branch model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('update_branch')) {
            $model = $this->findModel($id);
            $company = Company::find()->all();
            $listcompanyData=ArrayHelper::map($company,'company_id','company_name'); 
             //$this->p($listcompanyData);
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                 
                return $this->redirect(['view', 'id' => $model->branch_id]);
            } else {
                
                return $this->render('update', [
                    'model' => $model,'listcompanyData'=>$listcompanyData,
                ]);
            }
          }else{
             return $this->redirect(['notpermission']);
          }  
    }

    /**
     * Deletes an existing Branch model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->can('update_branch')) {
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }else{
            return $this->redirect(['notpermission']); 
        }
    }

    /**
     * Finds the Branch model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Branch the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
        {
        if (($model = Branch::findone($id)) !== null) {
            //$this->p($model);
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionJoins(){
        //$this->p('joins');
        $query = new Query;
        $query  ->select(['b.branch_name AS branch_name','co.company_name AS company_name'])  
        ->from('branch AS b')
        ->leftJoin('company AS co', 'co.company_id = b.company_fk_id');
        $command = $query->createCommand();
        $data = $command->queryAll();
        $this->p($data);

    }
    public function actionNotpermission(){

        Yii::$app->getSession()->setFlash('error', 'You  don`t have  permission for this task');
             return $this->redirect(['index']);
    }
}
