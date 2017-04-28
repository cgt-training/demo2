<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Department */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
.hasDatepicker {
  width: 100%;
}
</style>
<div id="product_type"></div>
<div class="department-form">

    <?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'company_fk_id')->dropDownList($listcompanyData,['prompt'=>'Choose...','onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl('department/listsbranch?id=').'"+$(this).val(), function( data ) {$( "#department-branch_fk_id" ).html( data );});']); ?>
    


    <?php // $form->field($model, 'company_fk_id')->dropDownList($listcompanyData, ['prompt' => 'Select Company']) ?>
    <?= $form->field($model, 'branch_fk_id')->dropDownList($listbranchData, ['prompt' => 'Choose...']) ?>

    <?= $form->field($model, 'department_name')->textInput(['maxlength' => true]) ?>

   
    <?= $form->field($model, 'department_create')->widget(DatePicker::classname(), [
    'language' => 'en',
    'dateFormat' => 'yyyy-MM-dd',
]) ?>

    <?= $form->field($model, 'department_status')->dropDownList([ 'Active' => 'Active', 'Inactive' => 'Inactive', '' => '', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

