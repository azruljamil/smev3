<?php

namespace frontend\controllers;

use Yii;
use common\models\EntpSupplier;
use common\models\EntpSupplierSearch;
use common\models\Supplier;
use common\models\SupplierSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * EntpSupplierController implements the CRUD actions for EntpSupplier model.
 */
class EntpsupplierController extends Controller
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
     * Lists all EntpSupplier models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EntpSupplierSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EntpSupplier model.
     * @param integer $entrepreneur_id
     * @param integer $supplier_id
     * @return mixed
     */
    public function actionView($entrepreneur_user_id, $supplier_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($entrepreneur_user_id, $supplier_id),
        ]);
    }

    /**
     * Creates a new EntpSupplier model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Supplier();

        if ($model->load(Yii::$app->request->post())) {
//            $x = Yii::$app->request->post();
//            $me = $x['Supplier']['entrepreneur'];
            $model->loadDefaultValues();
            $model->save();

            if($model->save()){
                $supplier = new EntpSupplier();

                $supplier->entrepreneur_user_id = Yii::$app->user->id;
                $supplier->link('supplier',$model);
            }

            Yii::$app->session->setFlash('success','Create New Supplier Success');

            return $this->redirect(['index']);

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EntpSupplier model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $entrepreneur_id
     * @param integer $supplier_id
     * @return mixed
     */
    public function actionUpdate($supplier_id)
    {
        $model = $this->findSupplier($supplier_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'entrepreneur_user_id' => Yii::$app->user->id, 'supplier_id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EntpSupplier model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $entrepreneur_id
     * @param integer $supplier_id
     * @return mixed
     */
    public function actionDelete($entrepreneur_user_id, $supplier_id)
    {
        $this->findModel($entrepreneur_user_id, $supplier_id)->delete();
        $this->findSupplier($supplier_id)->delete();

        Yii::$app->session->setFlash('success','Supplier Successfully Deleted');

        return $this->redirect(['index']);
    }

    /**
     * Finds the EntpSupplier model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $entrepreneur_id
     * @param integer $supplier_id
     * @return EntpSupplier the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($entrepreneur_user_id, $supplier_id)
    {
        if (($model = EntpSupplier::findOne(['entrepreneur_user_id' => $entrepreneur_user_id, 'supplier_id' => $supplier_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findSupplier($supplier_id)
    {
        if (($model = Supplier::findOne(['id' => $supplier_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
