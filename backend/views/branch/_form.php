<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Branch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branch-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_fk_id')->dropDownList($listcompanyData, ['prompt' => 'Please Select Company']) ?>


    <?= $form->field($model, 'branch_name')->textInput(['maxlength' => true]) ?>

   
    <?= $form->field($model, 'branch_created')->widget(DatePicker::classname(), [
    //'language' => 'en',
    'dateFormat' => 'yyyy-MM-dd',
    'options' => ['class' => 'form-control'],
    ]) ?>

    <?= $form->field($model, 'branch_status')->dropDownList([ 'Active' => 'Active', 'Inactive' => 'Inactive', '' => '', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
