<?php

namespace frontend\controllers;

use Yii;
use common\models\EntpExpenses;
use common\models\EntpExpensesSearch;
use common\models\Expenses;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * EntpexpensesController implements the CRUD actions for EntpExpenses model.
 */
class EntpexpensesController extends Controller
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
     * Lists all EntpExpenses models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EntpExpensesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EntpExpenses model.
     * @param integer $entrepreneur_id
     * @param integer $expenses_id
     * @return mixed
     */
    public function actionView($entrepreneur_user_id, $expenses_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($entrepreneur_user_id, $expenses_id),
        ]);
    }

    /**
     * Creates a new EntpExpenses model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Expenses();

        if ($model->load(Yii::$app->request->post()))
        {
            $model->loadDefaultValues();
            $model->save();

            if($model->save()){
                $entp = new EntpExpenses();
                //$entp->expenses_id = $this->id;
                $entp->entrepreneur_user_id = Yii::$app->user->id;
                $entp->link('expenses',$model);
            }

            Yii::$app->session->setFlash('success','New Expenses Added');

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
     * Updates an existing EntpExpenses model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $entrepreneur_id
     * @param integer $expenses_id
     * @return mixed
     */
    public function actionUpdate($expenses_id)
    {
        $model = $this->findExpenses($expenses_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'entrepreneur_user_id' => Yii::$app->user->id, 'expenses_id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EntpExpenses model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $entrepreneur_id
     * @param integer $expenses_id
     * @return mixed
     */
    public function actionDelete($entrepreneur_user_id, $expenses_id)
    {
        $this->findModel($entrepreneur_user_id, $expenses_id)->delete();
        $this->findExpenses($expenses_id)->delete();

        Yii::$app->session->setFlash('success','Expenses Deleted');

        return $this->redirect(['index']);
    }

    /**
     * Finds the EntpExpenses model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $entrepreneur_id
     * @param integer $expenses_id
     * @return EntpExpenses the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($entrepreneur_user_id, $expenses_id)
    {
        if (($model = EntpExpenses::findOne(['entrepreneur_user_id' => $entrepreneur_user_id, 'expenses_id' => $expenses_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected  function findExpenses($expenses_id)
    {
        if (($model = Expenses::findOne(['id' => $expenses_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
