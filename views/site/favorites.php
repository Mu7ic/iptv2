<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\ContactForm */

use yii\helpers\Url;

$this->title = 'Favorites';
$this->params['breadcrumbs'][] = $this->title;
$cookies = Yii::$app->request->cookies;

$epgid = \app\models\Control::getCoockie();
//var_dump($epgid);
$channel = Yii::$app->session->get('channel');

//var_dump($epgid);
?>

<div class="container">
    <div class="pr-lg-3 pl-lg-3">
        <div class="row">
            <div class="col-12">
                <div class="title">Избранные</div>

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-tv-tab" data-toggle="pill" href="#pills-tv" role="tab"
                           aria-controls="pills-tv" aria-selected="true">TВ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" id="pills-radio-tab" data-toggle="pill" href="#pills-radio"
                           role="tab" aria-controls="pills-radio" aria-selected="false">Радио</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-content w-100" id="pills-tabContent">

            <div class="tab-pane fade show active" id="pills-radio" role="tabpanel" aria-labelledby="pills-radio-tab">
                <div class="row">
                <?php
                if (!empty($channel)) {
                    foreach ($channel as $arr) {
                        if(in_array($arr['epgid'],$epgid)){
                        echo '<div class="col-md-6 col-lg-4 mb-2 mb-lg-4">
                    <div class="card" data-id="' . $arr['epgid'] . '">
                    <a href="' . Url::to(['site/single', 'id' => $arr['epgid']]) . '" >
                    <div class="channel position-relative w-100">
                    <div class="ch-img position-absolute">
                    <img src="' .Yii::$app->request->baseUrl.'/'. strtolower($arr['logo']) . '" alt="'.$arr['name'].'">
                    </div>
                    <div class="ch-data h-100">
                    <h4 class="w-100">' . $arr['name'] . '</h4>
                    <p>'.$arr['current']['title'].'</p>
                    <div class="progressbars">
                    <div class="before">'.date('H:i',strtotime($arr['current']['starttime'])).'</div>
                                        <div class="after">'.date('H:i',strtotime($arr['current']['endtime'])).'</div>
                    <div class="progress" start="10:25" stop="12:10">
                    <div class="progress-bar" role="progressbar" style="width: '.\app\models\Control::getPercentTime($arr['current']['starttime'],$arr['current']['endtime']).'%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </a>';
                        if(in_array($arr['epgid'],$epgid))
                            echo '<i class="fr favorite mdi mdi-bookmark"></i>';
                        else
                            echo '<i class="fr favorite mdi mdi-bookmark-outline"></i>';

                        echo '</div>
                    </div>';
                        }
                    }
                } else {
                    echo '  <div class="col-1">
                                                    <div class="lds-dual-ring">
                                                    </div>
                                                </div>';
                }
                //                echo '<pre>';
                //                var_dump($channel);
                //                echo '</pre>';
                ?>

            </div>
            </div>
        </div>
    </div>
</div>
</div>

