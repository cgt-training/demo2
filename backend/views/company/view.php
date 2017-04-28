<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Company */

$this->title = $model->company_name;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        
    </p>

    
</div>
<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 c_btn" >
                            <?= Html::a('Update', ['update', 'id' => $model->company_id], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Delete', ['delete', 'id' => $model->company_id], [
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
                                            'company_id',
                                            'company_name',
                                            'company_email:email',
                                            'company_address',
                                            'company_profile',
                                            'company_created',
                                            'company_status',
                                        ],
                                        ]) ?>

                            </div>
                                </div>
                            </div>
                        </div>    
                    </div>    
                  </div>    
  </div> 
