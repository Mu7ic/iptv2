<?php
//var_dump(Yii::$app->session->get('category'));

session_start();

$category=$_SESSION['category'];

?>

<ul class="sub-nav collapse <?php  if(isset($_GET['category'])) echo "show"; ?>" id="categories">
    <?php
    foreach ($category as $cat){
    ?>
    <li <?php
            if(isset($_GET['category'])){
                if($_GET['category']==$cat['id'])
                    echo 'class="active"';
            }

        ?> >
        <a class='nav-link' href='<?= \yii\helpers\Url::to(['site/category','category'=>$cat['id']]) ?>'>
            <span><?= $cat['name'] ?></span>
        </a>
    </li>
    <?php } ?>

</ul>