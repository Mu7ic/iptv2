<?php

namespace app\components;

use yii\web\Session;
use Yii;
class MyGlobalClass extends \yii\base\Component{
    //public $ip="http://217.11.179.169";
    public $ip="http://192.168.100.104";

    public function init() {

        //session_start();
        Yii::$app->session->open();
        //$session->set('category','');
        //$_SESSION['category']="";
        //if(empty($_SESSION['category'])){
        $json = file_get_contents($this->ip.':7678/tv/category.php');
        $json_channel = file_get_contents($this->ip.':7678/tv/get_channel.php');



        $category = json_decode($json, true);
        $obj = json_decode($json_channel, true);

        Yii::$app->session->set('category',$category);
        Yii::$app->session->set('channel',$obj);

       // }
        //var_dump($category);
        //var_dump(Yii::$app->session->get('category'));
        parent::init();
    }
}