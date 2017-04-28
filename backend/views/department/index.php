<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departments';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 c_btn" >
                            <?= Html::a('Create Department', ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title"><?= Html::encode($this->title) ?></h4>
                                     <div class="table-responsive">
                                    <?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],
                                        ['attribute'=>'company_fk_id','value' => 'company.company_name','label'=>'Company Name'],
                                        ['attribute'=>'branch_fk_id','value' => 'branch.branch_name','label'=>'Branch Name'],
                                        'department_name',
                                        'department_create',
                                        // 'department_status',

                                        ['class' => 'yii\grid\ActionColumn'],
                                    ],
                                    'tableOptions' => [
                                                         'class' => 'table',
                                                         ],
                                ]); ?>
                            </div>
                                </div>
                            </div>
                        </div>    
                    </div>    
                  </div>    
  </div>  
