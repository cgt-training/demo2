<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PermissionAssign */

$this->title = 'Create Permission Assign';
$this->params['breadcrumbs'][] = ['label' => 'Permission Assigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                    </div>
                       <div class="col-md-12">
                            <div class="card">
                               
                                    <div class="card-header card-header-text" data-background-color="rose">
                                        <h4 class="card-title"><?= Html::encode($this->title) ?></h4>
                                    </div>
                                    <div class="card-content">
                                       	<div class="company-create">
									    <?= $this->render('_form', [
									        'model' => $model,'authitem'=>$authitem,'parent'=>$parent
									    ]) ?>
                                    </div>
                             
                            </div>
                        </div>
                </div>
            </div>    
</div>     
