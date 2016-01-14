<?php

namespace frontend\controllers;

use Yii;
use common\models\Entrepreneur;
use common\models\EntrepreneurSearch;
use common\models\EntrepreneurSearchExternal;
use common\models\User;
use common\models\UserSearch;
use common\models\MentorEntrepreneur;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * MentorentrepreneurController implements the CRUD actions for MentorEntrepreneur model.
 */
class MentorentrepreneurController extends Controller
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
     * Lists all MentorEntrepreneur models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new EntrepreneurSearchExternal();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAddmentorentrepreneur()
    {
        $searchModel = new EntrepreneurSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = new MentorEntrepreneur();
        $selected = Yii::$app->request->post('selected');
        $mentor = Yii::$app->request->post('mentor');

        if(Yii::$app->request->isPost)
        {
            $users_id = explode(',',$selected);
            foreach($users_id as $key=>$value)
            {
                $temp[]=[$mentor,$value];
            }
            Yii::$app->db->createCommand()->batchInsert('mentor_entrepreneur',['mentor_id','entrepreneur_user_id'],$temp)->execute();
            //Yii::$app->db->createCommand()->insert('mentor_entrepreneur',['mentor_id'=>$mentor,'entrepreneur_id'=>$selected])->execute();
            Yii::$app->session->setFlash('success','Your request has been successfully processed');
            return $this->redirect(['index']);
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MentorEntrepreneur model.
     * @param integer $mentor_id
     * @param integer $entrepreneur_id
     * @return mixed
     */
    public function actionView($mentor_id, $entrepreneur_user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($mentor_id, $entrepreneur_user_id),
        ]);
    }

    /**
     * Creates a new MentorEntrepreneur model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MentorEntrepreneur();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'mentor_id' => $model->mentor_id, 'entrepreneur_user_id' => $model->entrepreneur_user_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MentorEntrepreneur model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $mentor_id
     * @param integer $entrepreneur_id
     * @return mixed
     */
    public function actionUpdate($mentor_id, $entrepreneur_user_id)
    {
        $model = $this->findModel($mentor_id, $entrepreneur_user_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'mentor_id' => $model->mentor_id, 'entrepreneur_user_id' => $model->entrepreneur_user_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MentorEntrepreneur model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $mentor_id
     * @param integer $entrepreneur_id
     * @return mixed
     */
    public function actionDelete($mentor_id, $entrepreneur_user_id)
    {
        $this->findModel($mentor_id, $entrepreneur_user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MentorEntrepreneur model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $mentor_id
     * @param integer $entrepreneur_id
     * @return MentorEntrepreneur the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($mentor_id, $entrepreneur_user_id)
    {
        if (($model = MentorEntrepreneur::findOne(['mentor_id' => $mentor_id, 'entrepreneur_user_id' => $entrepreneur_user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
