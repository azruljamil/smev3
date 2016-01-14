<?php

namespace frontend\controllers;

use Yii;
use common\models\EntpProduct;
use common\models\EntpProductSearch;
use common\models\Product;
use common\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * EntpproductController implements the CRUD actions for EntpProduct model.
 */
class EntpproductController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),

                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all EntpProduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EntpProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EntpProduct model.
     * @param integer $entrepreneur_id
     * @param integer $product_id
     * @return mixed
     */
    public function actionView($entrepreneur_user_id, $product_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($entrepreneur_user_id, $product_id),
        ]);
    }

    /**
     * Creates a new EntpProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post())) {

            $model->loadDefaultValues();
            $model->save();

            if($model->save()){
                $produk = new EntpProduct();
                $produk->product_id = $this->id;
                $produk->entrepreneur_user_id = Yii::$app->user->id;
                $produk->link('product',$model);
            }

            Yii::$app->session->setFlash('success','Create New Product Success');

            return $this->redirect(['index']);

            //return $this->redirect(['view', 'entrepreneur_id' => $model->entrepreneur_id, 'product_id' => $model->product_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EntpProduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $entrepreneur_id
     * @param integer $product_id
     * @return mixed
     */
    public function actionUpdate($product_id)
    {
        $model = $this->findProduct($product_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'entrepreneur_user_id' => Yii::$app->user->id, 'product_id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EntpProduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $entrepreneur_id
     * @param integer $product_id
     * @return mixed
     */
    public function actionDelete($entrepreneur_user_id, $product_id)
    {
        $this->findModel($entrepreneur_user_id, $product_id)->delete();
        $this->findProduct($product_id)->delete();

        Yii::$app->session->setFlash('success','Product Deleted');

        return $this->redirect(['index']);
    }

    /**
     * Finds the EntpProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $entrepreneur_id
     * @param integer $product_id
     * @return EntpProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($entrepreneur_user_id, $product_id)
    {
        if (($model = EntpProduct::findOne(['entrepreneur_user_id' => $entrepreneur_user_id, 'product_id' => $product_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findProduct($product_id)
    {
        if (($model = Product::findOne(['id' => $product_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
