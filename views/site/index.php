<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
$this->title = 'Главная IpTv';

//if (!isset(Yii::$app->request->cookies['test'])) {
//    Yii::$app->response->cookies->add(new \yii\web\Cookie([
//        'name' => 'test',
//        'value' => 'testValue'
//    ]));
//}

// В view выводим куки
//unset($_COOKIE['id_channels']);
//echo '<pre>';
$epgid=\app\models\Control::getCoockie();
//Yii::$app->request->cookies->removeAll();
//var_dump(\app\models\Control::getCoockie());
//echo '</pre>';
// или
//echo Yii::$app->request->cookies->getValue('ch-favorites');

?>

<div class='container'>
    <div class='pr-lg-3 pl-lg-3'>
        <?php //\yii\widgets\Pjax::begin(['timeout'=>5000]); ?>
        <div id="allchannels" class="row">

            <?php

            if (empty($obj)) {
                echo '<div class="row w-100 spinner-row justify-content-center align-items-center">
            <div class="col-1">
                <div class="lds-dual-ring"></div>
            </div>
        </div>';
            } else {
                echo '
        <div class="col-12">
            <div class="title">Все каналы</div>
        </div>';
                foreach ($obj as $arr) {
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
            ?>

</div>
        <?php //\yii\widgets\Pjax::end(); ?>
        </div>
    </div>

