<?php

namespace frontend\controllers;

use Yii;
use common\models\Supplier;
use common\models\SupplierSearch;
use common\models\EntpSupplier;
use common\models\EntpSupplierSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SupplierController implements the CRUD actions for Supplier model.
 */
class SupplierController extends Controller
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
     * Lists all Supplier models.
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
     * Displays a single Supplier model.
     * @param integer $id
     * @param integer $profile_user_id
     * @return mixed
     */
    public function actionView($id, $profile_user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $profile_user_id),
        ]);
    }

    /**
     * Creates a new Supplier model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Supplier();

        if ($model->load(Yii::$app->request->post())) {

            $model->loadDefaultValues();
            $model->save();

            if($model->save()){
                $ensup = new EntpSupplier();
                $ensup->supplier_id = $this->id;
                $ensup->entrepreneur_id = Yii::$app->user->id;
                $ensup->link('supplier',$model);
            }

            Yii::$app->session->setFlash('success','ok');

            $searchModel = new EntpSupplierSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

            //return $this->redirect(['view', 'id' => $model->id, 'profile_user_id' => $model->profile_user_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Supplier model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $profile_user_id
     * @return mixed
     */
    public function actionUpdate($id, $profile_user_id)
    {
        $model = $this->findModel($id, $profile_user_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'profile_user_id' => $model->profile_user_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Supplier model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $profile_user_id
     * @return mixed
     */
    public function actionDelete($id, $profile_user_id)
    {
        $this->findModel($id, $profile_user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Supplier model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $profile_user_id
     * @return Supplier the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $profile_user_id)
    {
        if (($model = Supplier::findOne(['id' => $id, 'profile_user_id' => $profile_user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
