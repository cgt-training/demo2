<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PermissionAssign */

$this->title = $model->parent;
$this->params['breadcrumbs'][] = ['label' => 'Permission Assigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 c_btn" >
                          <?= Html::a('Update', ['update', 'parent' => $model->parent, 'child' => $model->child], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Delete', ['delete', 'parent' => $model->parent, 'child' => $model->child], [
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
                                                'parent',
                                                'child',
                                            ],
                                        ]) ?>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>    
                  </div>    
  </div>