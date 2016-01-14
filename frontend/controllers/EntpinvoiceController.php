<?php

namespace frontend\controllers;


use Yii;
use common\models\Profile;
use common\models\EntpInvoice;
use common\models\EntpInvoiceSearch;
use common\models\Invoice;
use common\models\InvoiceItem;
use common\models\EntpInvoiceItem;
use common\models\Product;
use common\models\Customer;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;


/**
 * EntpinvoiceController implements the CRUD actions for EntpInvoice model.
 */
class EntpinvoiceController extends Controller
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
     * Lists all EntpInvoice models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EntpInvoiceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EntpInvoice model.
     * @param integer $entrepreneur_user_id
     * @param integer $invoice_id
     * @return mixed
     */
    public function actionView($entrepreneur_user_id, $invoice_id)
    {

        $model = $this->findModel($entrepreneur_user_id, $invoice_id);
        $query = $model->invoice->getInvoiceItems();

        $dataProvider = new ActiveDataProvider(['query'=>$query]);
        return $this->render('view', [
            'model' => $model,
            'dataProvider' =>$dataProvider,


        ]);
    }

    public function actionSample()
    {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $id = explode(":", $data['id']);
            $search = $id[0];
            $product = Product::find()->where(['id'=>$search])->one();
            return $this->renderPartial('_sample',['product'=>$product]);
        }

    }

    public function actionCustlist()
    {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $id2 = explode(":", $data['id']);
            $search2 = $id2[0];
            $customer = Customer::find()->where(['id'=>$search2])->one();
            return $this->renderPartial('_customer',['customer'=>$customer]);
        }

    }

    /**
     * Creates a new EntpInvoice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Invoice();
        //$model = new NewInvoice();

        if ($model->load(Yii::$app->request->post())) {

//            if ($invoice = $model->addInvoice()) {
//                Yii::$app->session->setFlash('success','New Invoice Added');
//                return $this->redirect(['index']);
//                //return $this->goHome();
//            }
            $model->loadDefaultValues();
            $model->save();

            if($model->save()){
                $invoice = new EntpInvoice();
                $invoice->entrepreneur_user_id = Yii::$app->user->id;
                $invoice->link('invoice',$model);
            }

            Yii::$app->session->setFlash('success','New Invoice Added');

            //return $this->redirect(['index']);
//
            return $this->redirect(['view', 'entrepreneur_user_id' => Yii::$app->user->id, 'invoice_id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EntpInvoice model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $entrepreneur_user_id
     * @param integer $invoice_id
     * @return mixed
     */
    public function actionUpdate($invoice_id)
    {
        $model = $this->findInvoice($invoice_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'entrepreneur_user_id' => Yii::$app->user->id, 'invoice_id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EntpInvoice model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $entrepreneur_user_id
     * @param integer $invoice_id
     * @return mixed
     */
    public function actionDelete($entrepreneur_user_id, $invoice_id)
    {
        $this->findModel($entrepreneur_user_id, $invoice_id)->delete();
        $this->findInvoice($invoice_id)->delete();

        Yii::$app->session->setFlash('success','Invoice Deleted');

        return $this->redirect(['index']);
    }

    public function actionRemoveitem($id,$entrepreneur_user_id,$invoice_id)
    {
        Yii::$app->db->createCommand()->delete('entp_invoiceitem','invoice_item_id ='.$id)->execute();
        Yii::$app->db->createCommand()->delete('invoice_item','id ='.$id)->execute();

        Yii::$app->session->setFlash('success','Invoice Item Deleted');

        $model = $this->findModel($entrepreneur_user_id, $invoice_id);
        $query = $model->invoice->getInvoiceItems();
        $dataProvider = new ActiveDataProvider(['query'=>$query]);
        return $this->render('view', [
            'model' => $model,
            'dataProvider' =>$dataProvider,
        ]);
    }

    /**
     * Finds the EntpInvoice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $entrepreneur_user_id
     * @param integer $invoice_id
     * @return EntpInvoice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($entrepreneur_user_id, $invoice_id)
    {
        if (($model = EntpInvoice::findOne(['entrepreneur_user_id' => $entrepreneur_user_id, 'invoice_id' => $invoice_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findInvoice($invoice_id)
    {
        if (($model = Invoice::findOne(['id' => $invoice_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findProfile($entrepreneur_user_id)
    {
        if (($model = Profile::findOne(['user_id' => $entrepreneur_user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAdditem($entrepreneur_user_id,$invoice_id)
    {
        $model = new InvoiceItem();

        if (Yii::$app->request->post())
        {
            $x = Yii::$app->request->post();
            $item = $x['EntpInvoice']['item'];
            $code = $x['EntpInvoice']['code'];
            $qty = $x['EntpInvoice']['qty'];
            $price = $x['EntpInvoice']['price'];
            $invoice = $x['EntpInvoice']['invoice_id'];
            $entp = $x['EntpInvoice']['entrepreneur_user_id'];

            $model->code = $code;
            $model->item = $item;
            $model->price = $price;
            $model->qty = $qty;
            $model->save();
                //if($model->save()){
                    $item = new EntpInvoiceItem();
                    $item->invoice_item_id = $model->id;
                    $item->invoice_id = intval($invoice);
                    $item->save();
                //}

            Yii::$app->session->setFlash('success','New Item Added');

            $model = $this->findModel($entp, $invoice);
            $query = $model->invoice->getInvoiceItems();

            $dataProvider = new ActiveDataProvider(['query'=>$query]);
            return $this->render('view', [
                'model' => $model,
                'dataProvider' =>$dataProvider,


            ]);
        }
        else
        {
            $model = $this->findModel($entrepreneur_user_id, $invoice_id);
            $query = $model->invoice->getInvoiceItems();
            $dataProvider = new ActiveDataProvider(['query'=>$query]);
            return $this->render('view', [
                'model' => $model,
                'dataProvider' =>$dataProvider,
            ]);
        }
    }

    public function actionViewinvoice($entrepreneur_user_id, $invoice_id)
    {
        $model = $this->findModel($entrepreneur_user_id, $invoice_id);
        $model2 = $this->findProfile($entrepreneur_user_id);
        $query = $model->invoice->getInvoiceItems();

        $dataProvider = new ActiveDataProvider(['query'=>$query]);
        return $this->render('viewinvoice', [
            'model' => $model,
            'dataProvider' =>$dataProvider,
            'model2' =>$model2,

        ]);
    }

    public function actionViewreceipt($entrepreneur_user_id, $invoice_id)
    {
        $model = $this->findModel($entrepreneur_user_id, $invoice_id);
        $model2 = $this->findProfile($entrepreneur_user_id);
        $query = $model->invoice->getInvoiceItems();

        $dataProvider = new ActiveDataProvider(['query'=>$query]);
        return $this->render('viewreceipt', [
            'model' => $model,
            'dataProvider' =>$dataProvider,
            'model2' =>$model2,

        ]);
    }

    public function actionAddcharges($entrepreneur_user_id, $invoice_id)
    {
        $model = $this->findModel($entrepreneur_user_id, $invoice_id);
        $model2 = $this->findProfile($entrepreneur_user_id);
        $query = $model->invoice->getInvoiceItems();

        $dataProvider = new ActiveDataProvider(['query'=>$query]);
        return $this->render('charges', [
            'model' => $model,
            'dataProvider' =>$dataProvider,
            'model2' =>$model2,

        ]);
    }
}
