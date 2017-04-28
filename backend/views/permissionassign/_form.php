<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PermissionAssign */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
	.control-label {
  width: 203px;
}
</style>
<div class="permission-assign-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'parent')->dropDownList($parent, ['prompt' => 'Please Select Role']) ?>

    <?= $form->field($model,'child')->checkboxList($authitem,array('class'=>'checkboxlist'))->label(FALSE); ?>
    <?php 



    /*foreach ($authitem as $key => $value) {
    	$label = $value['name'];
    ?>	
    
    <?= $form->field($model, 'child[]')->checkbox(array(
								'label'=>'',
								'labelOptions'=>array('style'=>'padding:5px;width:300px'),
								))
								->label($label); ?>

	<?php 
    }*/

    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php //echo "<pre>";print_r($authitem,0);exit; ?>
