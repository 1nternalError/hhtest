<?php

namespace app\controllers;

use app\models\Comments;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\helpers\Json;
use app\models\Posts;
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
    public function actionIndex()
    {
        $countPosts = Posts::find()->count();
        $countComments = Comments::find()->count();
        return $this->render('index',[
            'countPosts' => $countPosts,
            'countComments' =>$countComments
        ]);
    }

    public function actionTest()
    {
        return Json::encode([
            'message' => 'success'
        ]);
    }
    public function actionUpload()
    {
        $responsePosts = json_decode(file_get_contents('https://jsonplaceholder.typicode.com/posts'));
        $responseComments = json_decode(file_get_contents('https://jsonplaceholder.typicode.com/comments'));
        Posts::deleteAll();
        Comments::deleteAll();
        $fieldsPosts = ['userId','id','title','body'];
        $fieldsComments = ['postId','id','name','email','body'];
        $db = Yii::$app->db;
        $db->createCommand()->batchInsert('posts', $fieldsPosts, $responsePosts)->execute();
        $db->createCommand()->batchInsert('comments', $fieldsComments, $responseComments)->execute();
        return Json::encode([
            'message' => 'true',
            'countPosts' => count($responsePosts),
            'countComments' => count($responseComments)
        ]);
    }
    public function actionSearch($search){

        $likeCondition = new \yii\db\conditions\LikeCondition('body', 'LIKE', $search . '%');
        $likeCondition->setEscapingReplacements(false);
        $searchDb = Comments::find()->where($likeCondition)->all();
        $this->layout = false;
        return $this->render('searchOut',['searchDb'=>$searchDb]);
    }
}
