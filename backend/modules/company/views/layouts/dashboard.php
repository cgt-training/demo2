<?php

/* @var $this \yii\web\View */
/* @var $content string */


use backend\assets\LoginAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\widgets\ActiveForm;

LoginAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapper">
    
      <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="<?php echo Yii::getAlias('@web').'/images/sidebar-4.jpg' ?>">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
            <div class="logo">
                <a href="http://www.creative-tim.com/" class="simple-text">
                    Creative Tim
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="http://www.creative-tim.com/" class="simple-text">
                    Ct
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        
                        <?= Html::img('@web/images/faces/marc.jpg'); ?>
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            Tania Andrew
                            <b class="caret"></b>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="#">My Profile</a>
                                </li>
                                <li>
                                    <a href="#">Edit Profile</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <li>
                        <a href="dashboard.html">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                     <li>
                        <a data-toggle="collapse" href="#companyExamples">
                            <i class="material-icons">image</i>
                            <p>Company
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div  id="companyExamples" class="collapse" aria-expanded="" >
                            <ul class="nav company">
                                <li class="create">
                                    <?= Html::a('Add Company', ['/company/create'], ['class' => '']) ?>
                                </li>
                                <li class="index">
                                   <?= Html::a('List Company', ['/company'], ['class' => '']) ?>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#branchExamples">
                            <i class="material-icons">apps</i>
                            <p>Branch
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="branchExamples">
                            <ul class="nav branch">
                                <li>
                                    <?= Html::a('Add Branch', ['/branch/create'], ['class' => '']) ?>
                                </li>
                                <li>
                                   <?= Html::a('List Branch', ['/branch'], ['class' => '']) ?>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#departmentExamples">
                            <i class="material-icons">widgets</i>
                            <p>Department
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="departmentExamples">
                            <ul class="nav department">
                                <li>
                                    <?= Html::a('Add Department', ['/department/create'], ['class' => '']) ?>
                                </li>
                                <li>
                                   <?= Html::a('List Department', ['/department'], ['class' => '']) ?>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#permissionExamples">
                            <i class="material-icons">widgets</i>
                            <p>Permission
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="permissionExamples">
                            <ul class="nav permission">
                                <li>
                                    <?= Html::a('Add Permission', ['/permission/create'], ['class' => '']) ?>
                                </li>
                                <li>
                                   <?= Html::a('List Permission', ['/permission'], ['class' => '']) ?>
                                </li>

                            </ul>
                        </div>
                    </li><li>
                        <a data-toggle="collapse" href="#permissionassignExamples">
                            <i class="material-icons">widgets</i>
                            <p>Permission Assign
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="permissionassignExamples">
                            <ul class="nav permissionassign">
                                <li>
                                    <?= Html::a('Add Assign', ['/permissionassign/create'], ['class' => '']) ?>
                                </li>
                                <li>
                                   <?= Html::a('List  Assign', ['/permissionassign'], ['class' => '']) ?>
                                </li>

                            </ul>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>

    <div class="main-panel">
          <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Dashboard </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">dashboard</i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li>
                            <li>
                                     
                                 <?php  echo Html::beginForm(['/site/logout'], 'post');?>
                                 <?php  echo  Html::submitButton(
                                        '<i class="material-icons">power_settings_new</i>',
                                        ['class' => 'logout_button']
                                    );?>
                                  <?php  echo  Html::endForm();?>
                                    
                                    
                                   
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification">5</span>
                                    <p class="hidden-lg hidden-md">
                                        Notifications
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Mike John responded to your email</a>
                                    </li>
                                    <li>
                                        <a href="#">You have 5 new tasks</a>
                                    </li>
                                    <li>
                                        <a href="#">You're now friend with Andrew</a>
                                    </li>
                                    <li>
                                        <a href="#">Another Notification</a>
                                    </li>
                                    <li>
                                        <a href="#">Another One</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i>
                                    <p class="hidden-lg hidden-md">Profile</p>
                                </a>
                            </li>
                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group form-search is-empty">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="material-input"></span>
                            </div>
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
        <?= $content ?>
         <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="http://www.creative-tim.com/">Creative Tim</a>, made with love for a better web
                    </p>
                </div>
            </footer>
    </div>
</div>
<div id="blog"></div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<script type="text/javascript">
    $(document).ready(function(){
        var con = '<?php echo Yii::$app->controller->id; ?>';
        $('.'+con).closest('li').addClass('active');
        $('#'+con+'Examples').addClass('in');
        $('#'+con+'Examples').attr("aria-expanded", true);
        
       
        
        
    });
</script>