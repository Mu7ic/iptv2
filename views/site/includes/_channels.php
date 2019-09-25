<?php
if (!empty($obj)) {
    echo '
        <div class="col-12">
            <div class="title">Все каналы</div>
        </div>';
    foreach ($obj as $arr) {
        echo '<div class="col-md-6 col-lg-4 mb-2 mb-lg-4">
                    <div class="card">
                    <a href="' . Url::to(['site/single', 'id' => $arr['id']]) . '" data-id="' . $arr['id'] . '" data-profile="' . $arr['profile'] . '" data-channelid="' . $arr['chanelid'] . '" data-port="' . $arr['port'] . '" data-link="' . $arr['link'] . '">
                    <div class="channel position-relative w-100">
                    <div class="ch-img position-absolute">
                    <img src="/assets/img/' . strtolower($arr['name']) . '.png" alt="">
                    </div>
                    <div class="ch-data h-100">
                    <h4 class="w-100">' . $arr['name'] . '</h4>
                    <p>'.$arr['programm']['title'].'</p>
                    <div class="progressbars">
                    <div class="before">'.date('H:i',strtotime($arr['programm']['start'])).'</div>
                                        <div class="after">'.date('H:i',strtotime($arr['programm']['end'])).'</div>
                    <div class="progress" start="10:25" stop="12:10">
                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </a><i class="fr favorite mdi mdi-bookmark"></i>
                    </div></div>';
    }
}
?>