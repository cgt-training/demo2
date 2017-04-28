<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Branch */

$this->title = $model->branch_id;
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
<div class="branch-view">

    <h1><?= Html::encode($model->branch_name) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->branch_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->branch_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
        <?php  $a = 'rahul'; ?>
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
