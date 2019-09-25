<?php
use \yii\helpers\Url;
?>
<div class='sidebar tn'>
    <div class='s-inner w-100 h-100 position-relative'>
<div class='s-menu scroll-y w-100 h-100'>
    <div class="tabs">
        <div class="nav nav-tabs tn" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-tv-tab" data-toggle="tab" href="#nav-tv" role="tab" aria-controls="nav-tv" aria-selected="true">ТВ</a>
            <a class="nav-item nav-link disabled" id="nav-radio-tab" data-toggle="tab" href="#nav-radio" role="tab" aria-controls="nav-radio" aria-selected="false">Радио</a>
        </div>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane pt-2 fade show active" id="nav-tv" role="tabpanel" aria-labelledby="nav-tv-tab">
                <ul>
                    <li class='<?php if(Yii::$app->request->url=="/chanels") echo 'active'; ?>'>
                        <a class='nav-link' href='<?= Url::toRoute(['site/index']); ?>'>
                            <i class="mdi mdi-monitor"></i>
                            <span>Все каналы</span>
                        </a>
                    </li>
                    <li class="drop-down">
                        <a class='nav-link dda' href='#' data-toggle="collapse" data-target="#categories" aria-expanded="false" aria-controls="categories">
                            <i class="mdi mdi-monitor-multiple"></i>
                            <span>Категории</span>
                        </a>
                        <?= Yii::$app->controller->renderPartial('/layouts/includes/_navbar_menu',['category'=>$category]); ?>
                    </li>
                </ul>
            </div>
            <div class="tab-pane fade" id="nav-radio" role="tabpanel" aria-labelledby="nav-radio-tab">
                <ul>
                    <li class='active'>
                        <a class='nav-link' href='<?= Url::toRoute(['site/index']); ?>'>
                            <i class="mdi mdi-radio"></i>
                            <span>Все каналы</span>
                        </a>
                    </li>
                    <li >
                        <a class='nav-link' href='#' data-toggle="collapse" data-target="#categories" aria-expanded="false" aria-controls="categories">
                            <i class="mdi mdi-bullhorn"></i>
                            <span>Категории</span>
                        </a>
                        <?= Yii::$app->controller->renderPartial('/layouts/includes/_navbar_menu',['category'=>$categor]); ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <ul>
        <li class="<?php if(Yii::$app->request->url=="/favorits") echo 'active'; ?>">
            <a class='nav-link' href='<?= Url::to(['site/favorits']) ?>'>
                <i class="mdi mdi-bookmark-outline"></i>
                <span>Избранные</span>
            </a>
        </li>
        <!-- <li>
            <a class='nav-link position-relative' href='#'>
                <label class="cursor-pointer m-0">
                    <i class="mdi mdi-weather-night"></i>
                    <span class="w-100">Ночной режим</span>
                    <div class="position-absolute ch-dark">
                        <input type='checkbox' class='ch-switch ch-switch-sm' id='darkch'>
                        <label for='darkch'></label>
                    </div>
                </label>
            </a>
        </li> -->
        <li>
            <a class='nav-link' href='<?= Url::toRoute(['site/index']); ?>'>
                <i class="mdi mdi-account-settings-variant"></i>
                <span>Профиль</span>
            </a>
        </li>
        <li>
            <a class='nav-link' href='<?= Url::toRoute(['site/index']); ?>'>
                <i class="mdi mdi-logout"></i>
                <span>Выйти</span>
            </a>
        </li>
    </ul>
</div>
    </div>
</div>