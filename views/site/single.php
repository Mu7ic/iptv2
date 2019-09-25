<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Single Page';
$this->params['breadcrumbs'][] = $this->title;
Yii::$app->session->open();
$channel = Yii::$app->session->get('channel');

$month=[1=>'Янв.', 'Фев.', 'Мар.', 'Апр.', 'Май.', 'Июн.', 'Июл.', 'Авг.', 'Сен.', 'Окт.', 'Ноя.', 'Дек.'];
$weeks=['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'];

$date1=date('Y-m-d H:i:s',strtotime('+1 day'));
$date2=date('Y-m-d H:i:s',strtotime('+2 day'));
$m=$month[date('n')];
$d=date('d');
$w=$weeks[date('w')];
$m1=$month[date('n',strtotime($date1))];
$d1=date('d',strtotime($date1));
$w1=$weeks[date('w',strtotime($date1))];
$m2=$month[date('n',strtotime($date2))];
$d2=date('d',strtotime($date2));
$w2=$weeks[date('w',strtotime($date2))];


$tod=$w.' '.$d.' '.$m;
$tomo=$w1.' '.$d1.' '.$m1;
$aft=$w2.' '.$d2.' '.$m2;
?>
<link rel='stylesheet' href='<?= Yii::$app->request->baseUrl; ?>/includes/css/plyr.css'>
<div class='container-fluid'>
    <div class='pr-lg-3 pl-lg-3'>
        <div class='row'>
            <div class='col-12'>
                <div class='s-p title'></div>
            </div>
            <div class="col-12">
                <div class="card tr-n">
                    <div class="vrow row">
                        <div class="psvideo col-12 col-md-8 col-lg-8">
                            <div class="mb-3 mb-md-0 mb-lg-0 s-v-content tn">
                                <div class="s-video-p">
                                    <video poster="<?= Yii::$app->request->baseUrl; ?>/includes/img/vbg.png" id="player"
                                           class='s-video w-100 tn' playsinline controls>
                                        <source src="http://<?= $ip; ?>:9981/stream/channelid/<?= $id; ?>?profile=webtv-vp8-vorbis-webm">
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="psvprog col-12 col-md-4 col-lg-4">
                            <div class=" video-h overflof-hidden">
                                <nav>
                                    <div class="nav nav-tabs justify-content-center w-100" id="nav-tab" role="tablist">
                                        <?php
                                        if (!empty($today))
                                            echo '<a class="nav-item nav-link active" id="nav-d1-tab" data-toggle="tab" href="#nav-d1" role="tab" aria-controls="nav-d1" aria-selected="true">' . $tod . '</a>';
                                        if (!empty($tomorrow))
                                            echo '<a class="nav-item nav-link" id="nav-d2-tab" data-toggle="tab" href="#nav-d2" role="tab" aria-controls="nav-d2" aria-selected="false">' . $tomo. '</a>';
                                        if (!empty($after))
                                            echo '<a class="nav-item nav-link" id="nav-d3-tab" data-toggle="tab" href="#nav-d3" role="tab" aria-controls="nav-d3" aria-selected="false">' . $aft . '</a>';

                                        ?>

                                        <!--                                        <a class="nav-item nav-link active" id="nav-d1-tab" data-toggle="tab" href="#nav-d1" role="tab" aria-controls="nav-d1" aria-selected="true"></a>-->
                                        <!--                                        <a class="nav-item nav-link" id="nav-d2-tab" data-toggle="tab" href="#nav-d2" role="tab" aria-controls="nav-d2" aria-selected="false"></a>-->
                                        <!--                                        <a class="nav-item nav-link" id="nav-d3-tab" data-toggle="tab" href="#nav-d3" role="tab" aria-controls="nav-d3" aria-selected="false"></a>-->
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tn tab-pane pt-2 fade show active scroll-y" id="nav-d1" role="tabpanel"
                                         aria-labelledby="nav-d1-tab">
                                        <?= //var_dump($today);
                                        \app\models\Control::getTvHistory($today, true); ?>
                                    </div>
                                    <div class="tn tab-pane pt-2 fadescroll-y" id="nav-d2" role="tabpanel"
                                         aria-labelledby="nav-d2-tab">
                                        <?= \app\models\Control::getTvHistory($tomorrow, false); ?>
                                    </div>
                                    <div class="tn tab-pane pt-2 fade scroll-y" id="nav-d3" role="tabpanel"
                                         aria-labelledby="nav-d3-tab">
                                        <?= \app\models\Control::getTvHistory($after, false); ?>
                                    </div>
                                    <div class="show-more cursor-pointer pt-2 w-100 text-center d-md-none d-lg-none"><i
                                                class='mdi tn mdi-chevron-down'></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="title">Рекомендуемые каналы</div>
            </div>
        </div>
        <div id="recomended1" class="row">
            <div class="row w-100 /*ustify-content-center*/ align-items-center">

                <?php
                if (!empty($channel)) {
                    foreach ($channel as $arr) {

//                            echo '<div class="col-md-6 col-lg-4 mb-2 mb-lg-4">
//                            <div class="card">
//                            <a href="' . Url::to(['site/single', 'id' => $arr['epgid']]) . '" data-id="' . $arr['id'] . '" data-profile="' . $arr['profile'] . '" data-channelid="' . $arr['chanelid'] . '" data-port="' . $arr['port'] . '" data-link="' . $arr['link'] . '">
//                            <div class="channel position-relative w-100">
//                            <div class="ch-img position-absolute">
//                            <img src="' . Yii::$app->request->baseUrl . '/' . strtolower($arr['logo']) . '" alt="' . $arr['name'] . '">
//                            </div>
//                            <div class="ch-data h-100">
//                            <h4 class="w-100">' . $arr['name'] . '</h4>
//                            <p>' . $arr['current']['title'] . '</p>
//                            <div class="progressbars">
//                            <div class="before">' . date('H:i', strtotime($arr['current']['starttime'])) . '</div>
//                                                <div class="after">' . date('H:i', strtotime($arr['current']['endtime'])) . '</div>
//                            <div class="progress" start="10:25" stop="12:10">
//                            <div class="progress-bar" role="progressbar" style="width: ' . \app\models\Control::getPercentTime($arr['current']['starttime'], $arr['current']['endtime']) . '%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
//                            </div>
//                            </div>
//                            </div>
//                            </div>
//                            </a><i class="fr favorite mdi mdi-bookmark-outline"></i>
//                            </div></div>';

                        if($arr['category']==$category_id){
                        echo '<div class="col-md-6 col-lg-4 mb-2 mb-lg-4">';
                        echo '<div class="card">';
                        echo '<a href="' . Url::to(['site/single', 'id' => $arr['epgid']]) . '" data-id="' . $arr['id'] . '" data-profile="' . $arr['profile'] . '" data-channelid="' . $arr['chanelid'] . '" data-port="' . $arr['port'] . '" data-link="' . $arr['link'] . '">';
                        echo '<div class="channel position-relative w-100"> <div class="ch-img position-absolute">';
                        echo '<img src="' .Yii::$app->request->baseUrl.'/'. strtolower($arr['logo']) . '" alt="'.$arr['name'].'"></div>';
                        echo '<div class="ch-data h-100"><h4 class="w-100">'.$arr['name'].'</h4>';
                        echo '<p>'.$arr['current']['title'].'</p>';
                        echo '<div class="progressbars"><div class="progress" start="10:25" stop="12:10">';
                        echo  '<div class="before">'.date('H:i',strtotime($arr['current']['starttime'])).'</div>';
                        echo  '<div class="after">'.date('H:i',strtotime($arr['current']['endtime'])).'</div>';
                        echo '<div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>';
                        echo '</div></div></div></div></a>';
                        echo '<i class="fr favorite mdi mdi-bookmark-outline"></i>';
                        echo '</div></div>';
                        }
                    }
                } else {
                    echo '                <div class="col-1">
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
<script src="<?= Yii::$app->request->baseUrl; ?>/includes/js/moment.min.js"></script>
<script src="<?= Yii::$app->request->baseUrl; ?>/includes/js/plyr.min.js"></script>