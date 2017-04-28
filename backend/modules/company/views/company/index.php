<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-index">
</div>
<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 c_btn" >
                            <?= Html::a('Create Company', ['create'], ['class' => 'btn btn-success']) ?>
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

                                        
                                        'company_name',
                                        'company_email:email',
                                        'company_address',
                                        'company_profile',
                                        // 'company_created',
                                        // 'company_status',

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