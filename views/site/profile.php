<?php
$this->title='Профиль';

$user=Yii::$app->request->cookies;
if($user->has('user')) {
    $member = json_decode($user->get('user'), true);
}else $member="";
?>

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <div class="container h-100">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 col-lg-4" style="margin: 25px 0;">


                <div class="profile-card py-3 card text-center">
                    <a class="btn-edit" style="cursor: pointer" href="<?= \yii\helpers\Url::to(['edit']) ?>">
                        <i class="fa fa-edit"></i>
                    </a>
                    <div class="card-body py-4">
<!--                        <img class="profile-picture rounded-circle" src="https://randomuser.me/api/portraits/women/63.jpg" />-->
                        <h2 class="text-dark h5 font-weight-bold mt-4 mb-1">
                            <span id="hname"><?= !empty($member) ? $member['name'] : '' ?></span>
                        </h2>
                        <p class="text-muted font-weight-bold small">
                            <i class="fa fa-map-marker"></i>
                            <span id="haddress"><?= !empty($member) ? $member['address'] : '' ?></span>
                        </p>
                        <div class="d-flex px-1 w-100 align-items-center text-left">
                            <div class="w-100">
                                <label class="mb-1 font-weight-light text-muted small text-uppercase">Подписка</label>
                                <strong class="d-block text-warning">
                                    <i class="fa fa-star"></i>
                                    <?= !empty($member) ? $member['member'] : 'Золотой' ?>
                                </strong>
                            </div>
                            <div>
                            </div>
                        </div>
                        <h5 class="mt-4 pt-3 h6 text-muted mb-0"></h5>
                        <div class="d-flex social-section justify-content-center">
                            <a href=""><i class="fa fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa fa-twitter"></i></a>
                            <a href=""><i class="fa fa fa-google-plus"></i></a>
                            <a href=""><i class="fa fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
