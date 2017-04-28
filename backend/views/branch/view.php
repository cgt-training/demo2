<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Branch */

$this->title = $model->branch_name;
$this->params['breadcrumbs'][] = ['label' => 'Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php 
//echo "<pre>";
//print_r($model->company);exit;
$company_name = '';
if(!empty($model)){

    if(!empty($model->company)){
        $company_name = $model->company->company_name;     
    }
    
    
}
?>
<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 c_btn" >
                           <?= Html::a('Update', ['update', 'id' => $model->branch_id], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Delete', ['delete', 'id' => $model->branch_id], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title"><?= Html::encode($this->title) ?></h4>
                                     <div class="table-responsive">
                                         <?= DetailView::widget([
                                                'model' => $model,
                                                'attributes' => [
                                                    'branch_id',
                                                     ['attribute'=>'company_fk_id','value' => $company_name,'label'=>'company name'],
                                                    'branch_name',
                                                    'branch_created',
                                                    'branch_status',
                                                ],
                                            ]) ?>

                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>    
                  </div>    
  </div> 
