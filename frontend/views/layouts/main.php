<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use common\widgets\Alert;
use yii\web\UrlManager;


AppAsset::register($this);
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
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
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

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>

<?php $this->endPage() ?>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('change','#department-company_fk_ids',function(){
            var selectid = $(this).val();
            var base_url = '<?php echo Yii::$app->urlManager->createUrl(['department/branchdata']) ?>';
            
             $.ajax({
                    type: "POST",
                    url: base_url,
                    //data: "orderby=" + sortdata+ "status=" + status,
                    data: ({selectid: selectid}),
                    dataType: "json",
                    cache: false,
                    success: function(data) {
                 // $("#response_message_view").html(response_data);
                    if(data==null){

                  $("#product_type").empty();   

             }else{
                  var obj = eval(data);
                  $("#department-branch_fk_id").empty();
                  $("#department-branch_fk_id").append("<option value=''> Select Branch</option>");
                  $.each(obj, function(key, value) {
                     $("#department-branch_fk_id").append("<option value="+key+">"+value+"</option>");
                  });
             }
                    }
                    })



        });

    });
</script>