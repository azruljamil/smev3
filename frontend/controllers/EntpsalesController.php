<?php

namespace frontend\controllers;

use Yii;
use common\models\EntpSales;
use common\models\EntpSalesSearch;
use common\models\Sales;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * EntpsalesController implements the CRUD actions for EntpSales model.
 */
class EntpsalesController extends Controller
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
     * Lists all EntpSales models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EntpSalesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EntpSales model.
     * @param integer $entrepreneur_id
     * @param integer $sales_id
     * @return mixed
     */
    public function actionView($entrepreneur_user_id, $sales_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($entrepreneur_user_id, $sales_id),
        ]);
    }

    /**
     * Creates a new EntpSales model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sales();

        if ($model->load(Yii::$app->request->post()))
        {
            $model->loadDefaultValues();
            $model->save();

            if($model->save()){
                $entp = new EntpSales();
                $entp->entrepreneur_user_id = Yii::$app->user->id;
                $entp->link('sales',$model);
            }

            Yii::$app->session->setFlash('success','New Sales Added');

            return $this->redirect(['index']);
        }
        else
        {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EntpSales model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $entrepreneur_id
     * @param integer $sales_id
     * @return mixed
     */
    public function actionUpdate($sales_id)
    {
        $model = $this->findSales($sales_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['index']);
            return $this->redirect(['view', 'entrepreneur_user_id' => Yii::$app->user->id, 'sales_id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EntpSales model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $entrepreneur_id
     * @param integer $sales_id
     * @return mixed
     */
    public function actionDelete($entrepreneur_user_id, $sales_id)
    {
        $this->findModel($entrepreneur_user_id, $sales_id)->delete();
        $this->findSales($sales_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EntpSales model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $entrepreneur_id
     * @param integer $sales_id
     * @return EntpSales the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($entrepreneur_user_id, $sales_id)
    {
        if (($model = EntpSales::findOne(['entrepreneur_user_id' => $entrepreneur_user_id, 'sales_id' => $sales_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findSales($sales_id)
    {
        if (($model = Sales::findOne(['id' => $sales_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
