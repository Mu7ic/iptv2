<?php

namespace app\components;

use yii\web\Session;
use Yii;
class MyGlobalClass extends \yii\base\Component{
    public $ip="http://217.11.179.169";

    public function init() {

        session_start();
        //$session=Yii::$app->session->open();
        //$session->set('category','');
        $_SESSION['category']="";
        if(empty($_SESSION['category'])){
        $json = file_get_contents($this->ip.':7678/tv/category.php');
        }
        $category = json_decode($json, true);
        //var_dump($category);
        $_SESSION['category']=$category;
        //echo Yii::$app->session->get('category');
        parent::init();
    }
}