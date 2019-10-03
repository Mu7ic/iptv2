<?php
$this->title='Редактировать профиль';
$user=Yii::$app->request->cookies;
if($user->has('user')) {
    $member = json_decode($user->get('user'), true);
}else $member="";
$array=['Серебренный','Золотой','VIP'];
?>

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <div class="container h-100">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 col-lg-4" style="margin: 25px 0;">

                <form class="form-horizontal" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Имя</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" <?= !empty($member) ? 'value="'.$member['name'].'"' : '' ?> class="form-control" id="email" placeholder="Напишите свое имя">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Адрес</label>
                        <div class="col-sm-10">
                            <input type="text" name="address" <?= !empty($member) ? 'value="'.$member['address'].'"' : '' ?> class="form-control" id="pwd" placeholder="Напишите свой адрес">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Подписка</label>
                        <div class="col-sm-10">
                            <select name="member" class="form-control">
                                <?php
                                foreach ($array as $item) {
                                    if(!empty($member)){
                                        $checked="selected";
                                    }else $checked='';

                                    if($member['member']==$item)
                                    echo '<option '.$checked.'>'.$item.'</option>';
                                    else
                                        echo '<option>'.$item.'</option>';
                                }


                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
