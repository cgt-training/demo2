<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="black"  data-image="<?php echo Yii::getAlias('@web').'/images/lock.jpg' ?>">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                           <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                                <div class="card card-login card-hidden">
                                    <div class="card-header text-center" data-background-color="rose">
                                        <h4 class="card-title">Login</h4>
                                        <div class="social-line">
                                            <a href="#b" class="btn btn-just-icon btn-simple">
                                                <i class="fa fa-facebook-square"></i>
                                            </a>
                                            <a href="#" class="btn btn-just-icon btn-simple">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                            <a href="#" class="btn btn-just-icon btn-simple">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <p class="category text-center">
                                        Or Be Classical
                                    </p>
                                    <div class="card-content">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <div class="form-group label-floating">
                                               
                                                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                                                
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <div class="form-group label-floating">
                                         
                                                <?= $form->field($model, 'password')->passwordInput() ?>
                                            </div>
                                        </div>
                                        <div class="checkbox">
                                           
                                                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                                               
                                        </div>
                                    </div>
                                    <div class="footer text-center">
                                        <button type="submit" class="btn btn-rose btn-simple btn-wd btn-lg">Let's go</button>
                                    </div>
                                </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
