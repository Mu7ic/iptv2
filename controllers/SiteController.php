<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public $layout="general";

    //public $ip="http://217.11.179.169";
    public $ip="http://192.168.100.104";
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $json = file_get_contents($this->ip.':7678/tv/get_channel.php');
        $obj = json_decode($json, true);

        return $this->render('index',['obj'=>$obj]);
    }

    public function actionCategory($category)
    {
        $json = file_get_contents($this->ip.':7678/tv/category.php?category='.$category);
        $obj = json_decode($json, true);
        return $this->render('category',['obj'=>$obj]);
    }

    public function actionFavorits()
    {
        return $this->render('favorites');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionSingle($id)
    {
        date_default_timezone_set();
        $json = file_get_contents($this->ip.':7678/tv/programm.php?id=' . $id);
        $obj = json_decode($json, true);

        $date_now = date('Y-m-d');
        $date_tomorow = date('Y-m-d', strtotime('+1 day'));
        $date_after = date('Y-m-d', strtotime('+2 day'));
        foreach ($obj['programm'] as $ob) {
            if(!empty($ob)){
            $date = date('Y-m-d', strtotime($ob['date']));
            if ($date_now == $date)
                $today[] = $ob;
            if ($date_tomorow == $date)
                $tomorrow[] = $ob;
            if ($date_after == $date)
                $after[] = $ob;
            }
        }
        //echo '<pre>';
        //var_dump($today);
        //echo '</pre>';
        return $this->render('single', ['today' => $today, 'tomorrow' => $tomorrow, 'after' => $after,'category_id'=>$obj['category_id'],'id'=>$obj['channleid'],'ip'=>/*$obj['ip']*/ '217.11.179.169']);
    }

    //public function
}
