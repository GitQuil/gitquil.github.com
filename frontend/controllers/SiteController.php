<?php
namespace frontend\controllers;

use common\models\Product;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\ContactForm;
use common\models\Category;
use common\models\Banner;
use common\models\Content;
use common\models\Page;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\db\Expression;

/**
 * Site controller
 */
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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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
     * @return mixed
     */
    public function actionIndex()
    {
        $categories = Category::find()->all();
        return $this->render('index', [
            'categories' => $categories,
        ]);
    }


    public function actionCategory(){
        $url = Yii::$app->request->get('one');
        $category = Category::find()->where(['url' => $url])->one();

        if(!$category){
            throw new NotFoundHttpException();
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Product::find()->where(['category_id' => $category->id]),
            'pagination' => [
                'pageSize' => 5
            ],
        ]);
        $categories = Category::find()->all();
        $banners = Banner::find()->all();

        return $this->render('category', [
            'dataProvider' => $dataProvider,
            'categories' => $categories,
            'category' => $category,
            'banners' => $banners,
        ]);

    }

    public function actionProduct(){
        $url = Yii::$app->request->get('one');
        $product = Product::find()->where(['url' => $url])->one();

        if(!$product){
            throw new NotFoundHttpException();
        }

        $products = Product::find()
            ->andWhere(['category_id' => $product->category_id])
            ->andWhere('id!='.$product->id)
            ->orderBy(new Expression('rand()'))
            ->limit(4)->all();

        return $this->render('product',[
            'product' => $product,
            'products' => $products,
        ]);
    }

    public function actionSearch(){
        $words = trim(Yii::$app->request->get('words'));
        $search = str_replace(' ', '', $words);

        if(!strlen($search)){
            $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        }

        $query = Product::find()->where(['like', 'replace(name, " ", "")', $search]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ]
        ]);
        $categories = Category::find()->all();

        return $this->render('search', [
            'words' => $words,
            'categories' => $categories,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionInfo(){
        $page = Yii::$app->request->get('one');
        $entry = Page::find()->where(['like', 'name', $page])->one();
        $content = Content::find()->where(['page_id' => $entry->id])->one();
        return $this->render('info', [
            'title' => $entry->name,
            'content' => $content,
        ]);
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('success', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }


    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }


    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
