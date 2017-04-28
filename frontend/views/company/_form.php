<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
.hasDatepicker {
  width: 100%;
}
</style>
<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'company_email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'company_address')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'company_profile')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'company_created')->widget(DatePicker::classname(), [
    //'language' => 'en',
    'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'company_status')->dropDownList([ 'Active' => 'Active', 'Inactive' => 'Inactive', '' => '', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
