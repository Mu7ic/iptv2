<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\Pjax;
use yii\helpers\Url;

//AppAsset::register($this);
$categor=$_SESSION['category'];
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang='<?= Yii::$app->language ?>'>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>-->
    <title><?= Html::encode($this->title) ?></title>
    <?= Html::csrfMetaTags() ?>
    <link rel="shortcut icon" href="<?= Yii::$app->request->baseUrl; ?>/includes/img/tv.png"/>
    <link rel='stylesheet' href='<?= Yii::$app->request->baseUrl; ?>/includes/css/bootstrap.min.css'>
    <link rel='stylesheet' href='<?= Yii::$app->request->baseUrl; ?>/includes/fonts/mdi/css/materialdesignicons.min.css'>
    <link rel='stylesheet' href='<?= Yii::$app->request->baseUrl; ?>/includes/css/style.css'>
    <script src="<?php Yii::$app->request->baseUrl; ?>/includes/js/jquery.min.js"></script>

    <?php $this->head() ?>
</head>
<body class="tn collapsed">
<?php $this->beginBody() ?>
<?php //Pjax::begin(['timeout'=>30000]); ?>
        <?= Yii::$app->controller->renderPartial('/layouts/includes/_navbar',['category'=>$categor]); ?>

<div class='page-container tn'>
    <div class='top sn-page fixed tn'>
        <div class="container-fluid">
            <div class="row align-items-center justify-content-between">
                <div class='w-25 nav-left'>
                    <div class='fl ic-menu'>
                        <i class='fl block'>
                            <i class='fl tn'></i>
                            <i class='fl tn'></i>
                            <i class='fl tn m-0'></i>
                        </i>
                    </div>
                    <div class='fl pr-3 pl-3 d-lg-none'>
                        <a class="_home" href="<?= Url::toRoute(['site/index']); ?>">
                            <i class="mdi mdi-monitor" ></i>
                        </a>
                    </div>
                </div>
                <div class='w-50 nav-right'>
                    <ul class='fr'>
                        <li class='fl ic-menu m-o'>
                            <i class='fl block'>
                                <i class='fl tn'></i>
                                <i class='fl tn'></i>
                                <i class='fl tn m-o'></i>
                            </i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class='middle tn-n'>
            <?= $content; ?>

    </div>
    <?php // Pjax::end(); ?>
    <div class='bottom tn-n'>
        © <script>document.write(new Date().getFullYear());</script><a target="_blanck" href='https://robita.tj'> ROBITA.TJ</a>
    </div>
    <div class='bg-black'></div>
</div>
<?php $this->endBody() ?>
</body>
<script src='<?= Yii::$app->request->baseUrl; ?>/includes/js/app.js'></script>
<?php if(substr(Yii::$app->request->url,1,6)=="chanel"){ ?>
<script src='<?= Yii::$app->request->baseUrl; ?>/includes/js/main.js'></script>
<?php } ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
    <script src='<?= Yii::$app->request->baseUrl; ?>/includes/js/script.js'></script>

</html>
<?php $this->endPage() ?>
