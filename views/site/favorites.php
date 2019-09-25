<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Favorites';
$this->params['breadcrumbs'][] = $this->title;
$cookies = Yii::$app->request->cookies;

if (isset($cookies['ch-favorites'])) {
 echo   $language = $cookies['ch-favorites']->value;
}
?>

<div class="container">
    <div class="pr-lg-3 pl-lg-3">
        <div class="row">
            <div class="col-12">
                <div class="title">Избранные</div>

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-tv-tab" data-toggle="pill" href="#pills-tv" role="tab" aria-controls="pills-tv" aria-selected="true">TВ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" id="pills-radio-tab" data-toggle="pill" href="#pills-radio" role="tab" aria-controls="pills-radio" aria-selected="false">Радио</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-content w-100" id="pills-tabContent">

            <div class="tab-pane fade" id="pills-radio" role="tabpanel" aria-labelledby="pills-radio-tab">
                <div class="row">
                    <div class="col-12">Нет данных...</div>
                </div>
            </div>
        </div>
    </div>
</div>