<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InvoiceCharges;

/**
 * InvoiceChargesSearch represents the model behind the search form about `common\models\InvoiceCharges`.
 */
class InvoiceChargesSearch extends InvoiceCharges
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['invoice_id'], 'integer'],
            [['diskaun', 'shipping', 'gst'], 'number'],
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
        $query = InvoiceCharges::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'invoice_id' => $this->invoice_id,
            'diskaun' => $this->diskaun,
            'shipping' => $this->shipping,
            'gst' => $this->gst,
        ]);

        return $dataProvider;
    }
}
