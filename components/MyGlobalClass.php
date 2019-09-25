<?php

namespace app\components;

use yii\web\Session;
use Yii;
class MyGlobalClass extends \yii\base\Component{
    public $ip="http://217.11.179.169";

    public function init() {

        $session=Yii::$app->session->open();
        if($session->get('category')!="")
        $json = file_get_contents($this->ip.':7678/tv/category.php');
        $category = json_decode($json, true);
        //var_dump($category);
        Yii::$app->session->set('category',$category);
        //echo Yii::$app->session->get('category');
        parent::init();
    }
}