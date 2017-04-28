<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Company */

$this->title = 'Create Company';
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
.hasDatepicker {
  width: 100%;
}
</style>
<div class="company-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
