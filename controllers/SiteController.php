<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Cookie;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public $layout="general";

    //public $ip="http://217.11.179.169";
    public $ip="http://192.168.100.104";
    public $domain="iptv";
    /**
     * {@inheritdoc}
     */

    public static function allowedDomains() {
        return [
            // '*',                        // star allows all domains
            'http://iptv.robita.tj',
            //'http://test2.example.com',
        ];
    }

    /**
     * @inheritdoc
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
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
                'cors'  => [
                    // restrict access to domains:
                    'Origin'                           => static::allowedDomains(),
                    'Access-Control-Request-Method'    => ['POST'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)
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
        $obj=Yii::$app->session->get('channel');

        return $this->render('index',['obj'=>$obj]);
    }

    public function actionCategory($category)
    {
        $json = file_get_contents($this->ip.':7678/tv/category.php?category='.$category);
        $obj = json_decode($json, true);
        return $this->render('category',['obj'=>$obj]);
    }

    public function actionTest(){
        $cookie_name="id_channels";
        $cookie=Yii::$app->request->cookies;
        $cookies = Yii::$app->response->cookies;
        //unset(Yii::$app->request->cookies['test']);
        if(Yii::$app->request->post()){
          $array=[];
        $id=Yii::$app->request->post('id');

         // $cookies->remove($cookie_name);


            if ($cookie->has($cookie_name)) {
                $data = ["id" => $id];

                $value = $cookie->get($cookie_name)->value;
                $array = json_decode($value, true);

                $key = array_search($id, array_column($array, 'id'));
                if (is_int($key)) {
                    //echo $key;
                    array_splice($array, $key, 1);
                    if (count($array) == 0){
                        $cookies->remove($cookie_name);
                    }else{
                        //var_dump($array);
                    $cookies->add(new Cookie([
                        'name' => $cookie_name,
                        'value' => json_encode($array),
                       // 'domain' => $this->domain,
                        'expire' => time() + 60*60*24*30,
                    ]));
                    }
                }else {
                    array_push($array, $data);
                    $cookies->add(new Cookie([
                        'name' => $cookie_name,
                        'value' => json_encode($array),
                     //   'domain' => $this->domain,
                        'expire' => time() + 60*60*24*30,
                    ]));
                }

            } else {
                $array[0] = ["id" => $id];
                $cookies->add(new Cookie([
                    'name' => $cookie_name,
                    'value' => json_encode($array),
                   // 'domain' => $this->domain,
                    'expire' => time() + 60*60*24*30,
                ]));
            }

        }
    }

    public function actionFavorits()
    {
        return $this->render('favorites');
    }

    public function actionProfile()
    {
        return $this->render('profile');
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

    public function actionEdit(){
        if(Yii::$app->request->post()){
             $name=Yii::$app->request->post('name');
             $address=Yii::$app->request->post('address');
             $member=Yii::$app->request->post('member');
             $cookies=Yii::$app->response->cookies;
                 $array=['name'=>$name,'address'=>$address,'member'=>$member];
                 $cookies->add(new Cookie([
                     'name' => 'user',
                     'value' => json_encode($array),
                     // 'domain' => $this->domain,
                     'expire' => time() + 60*60*24*30,
                 ]));

             return $this->redirect(['site/profile']);
        }else
       return $this->render('edit');
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
        return $this->render('single', ['today' => $today, 'tomorrow' => $tomorrow, 'after' => $after,'category_id'=>$obj['category_id'],
            'id'=>$obj['channleid'],
            'ip'=>$obj['ip'] /*'217.11.179.169'*/,
            'name'=>$obj['name'],
            'logo'=>$obj['logo']
        ]);
    }

    public function actionNotice()
    {
       // if (Yii::$app->request->get('id')){
            $epgid=\app\models\Control::getCoockie();
            $obj=Yii::$app->session->get('channel');
            $html="";
            foreach ($obj as $arr) {
                if(in_array($arr['epgid'],$epgid)){
                    $html.='<div class="col-md-6 col-lg-4 mb-2 mb-lg-4">
                    <div class="card" data-id="' . $arr['epgid'] . '">
                    <a href="' . Url::to(['site/single', 'id' => $arr['epgid']]) . '" >
                    <div class="channel position-relative w-100">
                    <div class="ch-img position-absolute">
                    <img src="' .Yii::$app->request->baseUrl.'/'. strtolower($arr['logo']) . '" alt="'.$arr['name'].'">
                    </div>
                    <div class="ch-data h-100">
                    <h4 class="w-100">' . $arr['name'] . '</h4>
                    <p>'.$arr['current']['title'].'</p>
                    <div class="progressbars">
                    <div class="before">'.date('H:i',strtotime($arr['current']['starttime'])).'</div>
                                        <div class="after">'.date('H:i',strtotime($arr['current']['endtime'])).'</div>
                    <div class="progress" start="10:25" stop="12:10">
                    <div class="progress-bar" role="progressbar" style="width: '.\app\models\Control::getPercentTime($arr['current']['starttime'],$arr['current']['endtime']).'%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </a>';
                    if(in_array($arr['epgid'],$epgid))
                        $html.='<i class="fr favorite mdi mdi-bookmark"></i>';
                    else
                        $html.='<i class="fr favorite mdi mdi-bookmark-outline"></i>';

                    $html.='</div>
                    </div>';
                }
            }
            return $html;
     //  }
    }
    public function actionAll()
    {
        $category=Yii::$app->session->get('category');
        $epgid=\app\models\Control::getCoockie();
        $obj=Yii::$app->session->get('channel');
        $html="";
        foreach ($category as $c){
            $html.='<div class="col-12">
                <div class="title">'.$c['name'].'</div>
            </div>';

            if (!empty($obj)) {
                foreach ($obj as $arr) {

                    if ($arr['category'] == $c['id']) {
                        $html.='<div class="col-md-6 col-lg-4 mb-2 mb-lg-4">';
                        $html.='<div class="card" data-id="' . $arr['epgid'] . '">';
                        $html.='<a href="' . Url::to(['site/single', 'id' => $arr['epgid']]) . '" data-id="' . $arr['id'] . '" data-profile="' . $arr['profile'] . '" data-channelid="' . $arr['chanelid'] . '" data-port="' . $arr['port'] . '" data-link="' . $arr['link'] . '">';
                        $html.='<div class="channel position-relative w-100"> <div class="ch-img position-absolute">';
                        $html.='<img src="' . Yii::$app->request->baseUrl . '/' . strtolower($arr['logo']) . '" alt="' . $arr['name'] . '"></div>';
                        $html.='<div class="ch-data h-100"><h4 class="w-100">' . $arr['name'] . '</h4>';
                        $html.='<p>' . $arr['current']['title'] . '</p>';
                        $html.='<div class="progressbars"><div class="progress" start="10:25" stop="12:10">';
                        $html.='<div class="before">' . date('H:i', strtotime($arr['current']['starttime'])) . '</div>';
                        $html.='<div class="after">' . date('H:i', strtotime($arr['current']['endtime'])) . '</div>';
                        $html.='<div class="progress-bar" role="progressbar" style="width: '.\app\models\Control::getPercentTime($arr['current']['starttime'],$arr['current']['endtime']).'%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>';
                        $html.='</div></div></div></div></a>';
                        if(in_array($arr['epgid'],$epgid))
                            $html.='<i class="fr favorite mdi mdi-bookmark"></i>';
                        else
                            $html.='<i class="fr favorite mdi mdi-bookmark-outline"></i>';
                        $html.='</div></div>';
                    }
                }
            } else {
                $html.= '<div class="col-1">
                    <div class="lds-dual-ring">
                    </div>
                </div>';
            }
        }
        return $html;
    }

    //public function
}
