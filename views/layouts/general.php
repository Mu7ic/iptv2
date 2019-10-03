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
use app\models\Mobile_Detect;

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
    <link rel="icon" href="https://robita.tj/wp-content/uploads/2018/10/favicon-150x150.png" sizes="32x32">
    <link rel="icon" href="https://robita.tj/wp-content/uploads/2018/10/favicon-300x300.png" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="https://robita.tj/wp-content/uploads/2018/10/favicon-300x300.png">
    <meta name="msapplication-TileImage" content="https://robita.tj/wp-content/uploads/2018/10/favicon-300x300.png">
<!--    <link rel="shortcut icon" href="--><?//= Yii::$app->request->baseUrl; ?><!--/includes/img/tv.png"/>-->
    <link rel='stylesheet' href='<?= Yii::$app->request->baseUrl; ?>/includes/css/bootstrap.min.css'>
    <link rel='stylesheet' href='<?= Yii::$app->request->baseUrl; ?>/includes/fonts/mdi/css/materialdesignicons.min.css'>
    <link rel='stylesheet' href='<?= Yii::$app->request->baseUrl; ?>/includes/css/style.css'>
    <script src="<?php Yii::$app->request->baseUrl; ?>/includes/js/jquery.min.js"></script>

    <?php $this->head() ?>
</head>
<script>
    $(document).ready(function () {
        $('.show-alert').click(function (e) {
            e.preventDefault();
            //alert('ddasd');
            $('.alert').addClass('show');
            window.setTimeout(function(){
                $('.alert').removeClass('show');
            },3000);
        });
    });
</script>
<body class="tn <?php $detect = new Mobile_Detect(); if($detect->isAndroidOS()) ''; else echo 'collapsed'; ?>">
<?php $this->beginBody() ?>
        <?= Yii::$app->controller->renderPartial('/layouts/includes/_navbar',['category'=>$categor]); ?>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<?php Pjax::begin(['timeout'=>30000]); ?>
<div class="alert alert-primary alert-dismissible fade" style="position: fixed;right: 0;top: 70px;z-index: 10000;">
    <strong>Внимание!</strong> Данный раздел находиться на стадии  <a href="#" class="alert-link">разработки</a>.
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>
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
                <div class="show-on">
                    <a href="javascript:void(0);" class="btn-user media align-items-center">
                        <img class="mr-2 rounded-circle" src="https://via.placeholder.com/40.png" width="40" height="40" alt="avatar">
                        <div class="media-body">
                            +992928888888
                        </div>
                        <ul id="sidebar" class="dropdown-menu dropdown-menu-right" role="menu">
                            <a class="dropdown-item" href="javascript:void(0);">Edit Profile</a>
                            <a class="dropdown-item" href="javascript:void(0);">Logout</a>
                        </ul>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class='middle tn-n'>
            <?= $content; ?>

    </div>
    <?php // Pjax::end(); ?>
    <footer>
        <div class="footer" id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                        <h3> Соглашения </h3>
                        <ul>
                            <li> <a class="show-alert" href="#">Условия сотрудничества </a> </li>
                            <li> <a class="show-alert" href="#">Руководства использования </a> </li>
                            <li> <a class="show-alert" href="#">Термины </a> </li>
                        </ul>
                    </div>
                    <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">

                    </div>
                    <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                        <h3> Меню </h3>
                        <ul>
                            <li> <a href="<?= Url::toRoute(['site/index']); ?>"> Все каналы </a> </li>
                            <li> <a href="<?= Url::to(['site/favorits']) ?>"> Избранные </a> </li>
                            <li> <a href="#" class="show-alert"> Обратная связь </a> </li>
                        </ul>
                    </div>
                    <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">

                    </div>
                    <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                        <h3> Подписка </h3>
                        <ul>
                            <li>
                                <div class="input-append newsletter-box text-center">
                                    <input type="text" class="full text-center" placeholder="">
                                    <button class="btn  bg-gray show-alert" type="button"> Подпишитесь на рассылку <i class="fa fa-long-arrow-right"> </i> </button>
                                </div>
                            </li>
                        </ul>
                        <ul class="social">
                            <li> <a href="#"> <i class=" fa fa-facebook">   </i> </a> </li>
                            <li> <a href="#"> <i class="fa fa-twitter">   </i> </a> </li>
                            <li> <a href="#"> <i class="fa fa-instagram">   </i> </a> </li>
                            <li> <a href="#"> <i class="fa fa-pinterest">   </i> </a> </li>
                            <li> <a href="#"> <i class="fa fa-youtube">   </i> </a> </li>
                        </ul>
                    </div>
                </div>
                <!--/.row-->
            </div>
            <!--/.container-->
        </div>
        <!--/.footer-->

        <div class="footer-bottom">
            <div class="container">
                <p class="pull-left"> Copyright © <a href="https://robita.tj/">Робитаи нав</a> совместно с <a href="https://www.tcell.tj">Tcell</a> <?= date('Y',strtotime('2019')); ?>.</p>
                <div class="pull-right">
<!--                   <img src="--><?//= Yii::$app->request->baseUrl; ?><!--/includes/img/logo_tcell.png">-->
<!--                    с сотрудничестве-->
<!--                   <img height="32px" width="32px" src="--><?//= Yii::$app->request->baseUrl; ?><!--/includes/img/logo_robita.jpg">-->
                </div>
            </div>
        </div>
        <!--/.footer-bottom-->
    </footer>
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
