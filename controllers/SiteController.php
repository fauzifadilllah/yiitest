<?php

namespace app\controllers;

use mPDF;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Pasien;

class SiteController extends Controller
{
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
    public function actionLaporan()
    {
        # code...
      
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('Ini Laporan');
        $mpdf->Output();
        exit;
    }
    public function actionIndex()
    {
        $pasien = Pasien::find()->all();
      
        return $this->render('home',['pasien' => $pasien]);
    }
    
    public function actionCreate()
    {
        $post = new Pasien();
        $formData = Yii::$app->request->post();
        if($post->load($formData)){
            if($post->save()){
                Yii::$app->getSession()->setFlash('message','Successfully');
                return $this->redirect(['index']);
            }
            else{
                Yii::$app->getSession()->setFlash('message','Failed');
            }
        } 
        return $this->render('create',['post'=> $post]);
    }
    public function actionView($id)
    {
       $post = Pasien::findOne($id);
       return $this->render('view',['post'=>$post]);
    }
    public function actionUpdate($id)
    {
        $post = Pasien::findOne($id);
        if($post->load(Yii::$app->request->post())&& $post->save()){
            Yii::$app->getSession()->setFlash('message','successfully');
            return $this->redirect(['index']);
        }else{
        return $this->render('update',['post'=>$post]);
    }
}
public function actionDelete($id)
{
    $post = Pasien::findOne($id)->delete();
    if($post){
        Yii::$app->getSession()->setFlash('message','successfully');
        return $this->redirect(['index']);
    }
   
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
    public function actionAbout()
    {
        return $this->render('about');
    }
}
