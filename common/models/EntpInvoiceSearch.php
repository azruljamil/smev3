<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EntpInvoice;

/**
 * EntpInvoiceSearch represents the model behind the search form about `common\models\EntpInvoice`.
 */
class EntpInvoiceSearch extends EntpInvoice
{
    public $invoice_no;
    public $created_at;
    public $updated_at;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entrepreneur_user_id', 'invoice_id'], 'integer'],
            [['invoice_no', 'created_at','updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $id = Yii::$app->user->id;
        $query = EntpInvoice::find();
        $query->joinWith(['invoice'])->where('entp_invoice.entrepreneur_user_id='.$id);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['invoice_no'] = [
            'asc' => ['invoice.invoice_no' => SORT_ASC],
            'desc' => ['invoice.invoice_no' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['created_at'] = [
            'asc' => ['invoice.created_at' => SORT_ASC],
            'desc' => ['invoice.created_at' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['updated_at'] = [
            'asc' => ['invoice.updated_at' => SORT_ASC],
            'desc' => ['invoice.updated_at' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'entrepreneur_user_id' => $this->entrepreneur_user_id,
            'invoice_id' => $this->invoice_id,
        ]);

        $query
            ->andFilterWhere(['like', 'invoice.invoice_no', $this->invoice_no])
            ->andFilterWhere(['like', 'invoice.created_at', $this->created_at])
            ->andFilterWhere(['like', 'invoice.updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
