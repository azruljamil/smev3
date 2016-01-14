<?php

namespace frontend\controllers;

use Yii;
use common\models\EntpCustomer;
use common\models\EntpCustomerSearch;
use common\models\Customer;
use common\models\CustomerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EntpcustomerController implements the CRUD actions for EntpCustomer model.
 */
class EntpcustomerController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all EntpCustomer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EntpCustomerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EntpCustomer model.
     * @param integer $entrepreneur_user_id
     * @param integer $customer_id
     * @return mixed
     */
    public function actionView($entrepreneur_user_id, $customer_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($entrepreneur_user_id, $customer_id),
        ]);
    }

    /**
     * Creates a new EntpCustomer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Customer();

        if ($model->load(Yii::$app->request->post())) {

            $model->loadDefaultValues();
            $model->save();

            if($model->save()){
                $cust = new EntpCustomer();
                $cust->customer_id = $this->id;
                $cust->entrepreneur_user_id = Yii::$app->user->id;
                $cust->link('customer',$model);
            }

            Yii::$app->session->setFlash('success','Create New Customer Success');

            return $this->redirect(['index']);

            //return $this->redirect(['view', 'entrepreneur_user_id' => $model->entrepreneur_user_id, 'customer_id' => $model->customer_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EntpCustomer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $entrepreneur_user_id
     * @param integer $customer_id
     * @return mixed
     */
    public function actionUpdate($customer_id)
    {
        $model = $this->findCustomer($customer_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'entrepreneur_user_id' => Yii::$app->user->id, 'customer_id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EntpCustomer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $entrepreneur_user_id
     * @param integer $customer_id
     * @return mixed
     */
    public function actionDelete($entrepreneur_user_id, $customer_id)
    {
        $this->findModel($entrepreneur_user_id, $customer_id)->delete();
        $this->findCustomer($customer_id)->delete();

        Yii::$app->session->setFlash('success','Delete Customer Success');

        return $this->redirect(['index']);
    }

    /**
     * Finds the EntpCustomer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $entrepreneur_user_id
     * @param integer $customer_id
     * @return EntpCustomer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($entrepreneur_user_id, $customer_id)
    {
        if (($model = EntpCustomer::findOne(['entrepreneur_user_id' => $entrepreneur_user_id, 'customer_id' => $customer_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findCustomer($customer_id)
    {
        if (($model = Customer::findOne(['id' => $customer_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
