<?php

namespace frontend\controllers;

use Yii;
use app\models\Department;
use app\models\DepartmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Company;
use app\models\Branch;
use yii\helpers\ArrayHelper;
use yii\db\Query;
/**
 * DepartmentController implements the CRUD actions for Department model.
 */
class DepartmentController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {    $this->layout='test';
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
     * Lists all Department models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DepartmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Department model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = Department::find()->joinWith('company')->joinWith('branch')->where(['department_id' => $id])->one();
       
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Department model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
       if (Yii::$app->user->can('create_department')) {  

         $model = new Department();
         $company = Company::find()->all();
         $listcompanyData=ArrayHelper::map($company,'company_id','company_name'); 
         $branch = Branch::find()->all();
         $listbranchData=ArrayHelper::map($branch,'branch_id','branch_name'); 
         
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->department_id]);
        } else {
            return $this->render('create', [
                'model' => $model,'listcompanyData'=> $listcompanyData,'listbranchData'=>$listbranchData
            ]);
        }
        }
        else{
            return $this->redirect(['notpermission']);
        }
    }

    /**
     * Updates an existing Department model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
         if (Yii::$app->user->can('create_department')) {  
             $model = $this->findModel($id);
             $company_id = $model->company_fk_id;
             $company = Company::find()->all();
             $listcompanyData=ArrayHelper::map($company,'company_id','company_name'); 
             $branch = Branch::find()->where(['company_fk_id'=> $company_id])->all();
             $listbranchData=ArrayHelper::map($branch,'branch_id','branch_name'); 
             if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->department_id]);
             } else {
                return $this->render('update', [
                    'model' => $model,'listcompanyData'=> $listcompanyData,'listbranchData'=>$listbranchData
                ]);
            }
         }else{
           return $this->redirect(['notpermission']);
         }   
    }

    /**
     * Deletes an existing Department model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
       if (Yii::$app->user->can('create_department')) {   
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
          }else{
             return $this->redirect(['notpermission']); 
          }  
    }

    /**
     * Finds the Department model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Department the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Department::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionBranchdata(){
        $model = new Department();
        $id = Yii::$app->request->post('selectid');
        if(!empty($id)){
            $query = new Query;
        $query  ->select(['b.branch_name AS branch_name','branch_id'])  
        ->from('branch AS b')
        ->where(['company_fk_id'=> $id]);
        $command = $query->createCommand();
        $result = $command->queryAll();
        $listbranchData=ArrayHelper::map($result,'branch_id','branch_name'); 
       // $this->p($listbranchData);
       
        echo json_encode($listbranchData);
        }


    }
    public function actionListsbranch($id){
        $lists = branch::find()
        ->where(['company_fk_id' => $id])
        ->orderBy('branch_id DESC')->all();
        //echo "choose..";
        echo "<option value=''>choose..</option>";
        foreach($lists as $list)
        {
            //echo "".$list->branch_name."";
            echo "<option value='".$list->branch_id."'>".$list->branch_name."</option>";
        }
    }
    public function actionNotpermission(){

        Yii::$app->getSession()->setFlash('error', 'You  don`t have  permission for this task');
             return $this->redirect(['index']);
    }
}
