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
<body class="tn collapsed">
<?php $this->beginBody() ?>
<?php //Pjax::begin(['timeout'=>30000]); ?>
        <?= Yii::$app->controller->renderPartial('/layouts/includes/_navbar',['category'=>$categor]); ?>

<style type="text/css">
    .full {
        width: 100%;
    }
    .gap {
        height: 30px;
        width: 100%;
        clear: both;
        display: block;
    }
    .footer {
        background: #4e256b;
        height: auto;
        padding-bottom: 30px;
        position: relative;
        width: 100%;
        border-top: 1px solid #371b4c;
    }
    .footer p {
        margin: 0;
    }
    .footer img {
        max-width: 100%;
    }
    .footer h3 {
        border-bottom: 1px solid #371b4c;
        color: #fff;
        font-size: 18px;
        font-weight: 600;
        line-height: 27px;
        padding: 40px 0 10px;
        text-transform: uppercase;
    }
    .footer ul {
        font-size: 13px;
        list-style-type: none;
        margin-left: 0;
        padding-left: 0;
        margin-top: 15px;
        color: #7F8C8D;
    }
    .footer ul li a {
        padding: 0 0 5px 0;
        display: block;
    }
    .footer a {
        color: #fff;
    }
    .supportLi h4 {
        font-size: 20px;
        font-weight: lighter;
        line-height: normal;
        margin-bottom: 0 !important;
        padding-bottom: 0;
    }
    .newsletter-box input#appendedInputButton {
        background: #FFFFFF;
        display: inline-block;
        float: left;
        height: 30px;
        clear: both;
        width: 100%;
    }
    .newsletter-box .btn {
        border: medium none;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        -o-border-radius: 3px;
        -ms-border-radius: 3px;
        border-radius: 3px;
        display: inline-block;
        height: 40px;
        padding: 0;
        width: 100%;
        color: #fff;
    }
    .newsletter-box {
        overflow: hidden;
    }
    .bg-gray {
        /*background-image: -moz-linear-gradient(center bottom, #BBBBBB 0%, #F0F0F0 100%);*/
        /*box-shadow: 0 1px 0 #B4B3B3;*/
    }
    .social li {
        background: none repeat scroll 0 0 #B5B5B5;
        border: 2px solid #B5B5B5;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -o-border-radius: 50%;
        -ms-border-radius: 50%;
        border-radius: 50%;
        float: left;
        height: 36px;
        line-height: 36px;
        margin: 0 8px 0 0;
        padding: 0;
        text-align: center;
        width: 36px;
        transition: all 0.5s ease 0s;
        -moz-transition: all 0.5s ease 0s;
        -webkit-transition: all 0.5s ease 0s;
        -ms-transition: all 0.5s ease 0s;
        -o-transition: all 0.5s ease 0s;
    }
    .social li:hover {
        transform: scale(1.15) rotate(360deg);
        -webkit-transform: scale(1.1) rotate(360deg);
        -moz-transform: scale(1.1) rotate(360deg);
        -ms-transform: scale(1.1) rotate(360deg);
        -o-transform: scale(1.1) rotate(360deg);
    }
    .social li a {
        color: #EDEFF1;
    }
    .social li:hover {
        border: 2px solid #2c3e50;
        background: #2c3e50;
    }
    .social li a i {
        font-size: 16px;
        margin: 0 0 0 5px;
        color: #EDEFF1 !important;
    }
    .footer-bottom {
        background: #642887;
        border-top: 1px solid #371b4c;
        padding-top: 10px;
        padding-bottom: 10px;
        height: 50px;
        color: #fff;
    }
    .footer-bottom p.pull-left {
        padding-top: 6px;
    }
    .payments {
        font-size: 1.5em;
    }
</style>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
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
    <footer>
        <div class="footer" id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                        <h3> Соглашения </h3>
                        <ul>
                            <li> <a href="#"> Условия сотрудничества </a> </li>
                            <li> <a href="#"> Lorem Ipsum </a> </li>
                            <li> <a href="#"> Lorem Ipsum </a> </li>
                            <li> <a href="#"> Lorem Ipsum </a> </li>
                        </ul>
                    </div>
                    <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">

                    </div>
                    <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                        <h3> О Робитаи нав </h3>
                        <ul>
                            <li> <a href="#"> Lorem Ipsum </a> </li>
                            <li> <a href="#"> Lorem Ipsum </a> </li>
                            <li> <a href="#"> Lorem Ipsum </a> </li>
                            <li> <a href="#"> Lorem Ipsum </a> </li>
                        </ul>
                    </div>
                    <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">

                    </div>
                    <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                        <h3> Подписка </h3>
                        <ul>
                            <li>
                                <div class="input-append newsletter-box text-center">
                                    <input type="text" class="full text-center" placeholder="Email ">
                                    <button class="btn  bg-gray" type="button"> Подпишитесь на рассылку <i class="fa fa-long-arrow-right"> </i> </button>
                                </div>
                            </li>
                        </ul>
                        <ul class="social">
                            <li> <a href="#"> <i class=" fa fa-facebook">   </i> </a> </li>
                            <li> <a href="#"> <i class="fa fa-twitter">   </i> </a> </li>
                            <li> <a href="#"> <i class="fa fa-google-plus">   </i> </a> </li>
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
                <p class="pull-left"> Copyright © Робитани нав <?= date('Y',strtotime('2019')); ?>.</p>
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
