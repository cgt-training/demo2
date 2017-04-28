<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\assets\AppTest;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use common\widgets\Alert;
use yii\web\UrlManager;


AppAsset::register($this);
AppTest::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE 
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header>
<div class="container-fluid top-header">
    <div class="container">
      <div class="col-lg-12">
       
       <div class="col-lg-12 col-md-12 col-sm-12 menu">
           <nav class="navbar navbar-default row">
  <div class="">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     <a class="navbar-brand" href="#"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/images/logoBlog.png'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
       ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Company', 'url' => ['/company/index']],
        ['label' => 'Branch', 'url' => ['/branch/index']],
        ['label' => 'Department', 'url' => ['/department/index']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
        </div>
       
      </div>
    </div>
</div>
<div class="container-fluid slider">
  <div class="container">
  <div class="row">
  <div class="col-lg-12" style="border: 1px slider">
        <div class="col-md-12  page_title">blog</div>
        <div class="col-md-12 page_link">Home / <span>Blog</span></div>
   </div>
   </div>
    </div>
  
  
</div>

</header>
<div class="wrap">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

 <footer class="">
    <div class="container-fluid footer">
        <div class="container ">
         <div class="row ">
            <div class="col-md-12 social_icon">
                <ul>
                    <li><a href="#"> <i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
            <div class="col-md-12 footer_link">
                <ul>
                    <li><a href="#"> Blog </a></li>
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Feedback</a></li>
                    <li><a href="#">Brand</a></li>
                    <li><a href="#">Community Guidelines</a></li>
                </ul>
            </div>
            <div class="col-md-12 copy_right">copyright 2014 Macro Tacking. All Right Reserved.</div>
           
        </div>
         </div>
    </div>
    </footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
