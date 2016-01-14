<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EntpSales;

/**
 * EntpSalesSearch represents the model behind the search form about `common\models\EntpSales`.
 */
class EntpSalesSearch extends EntpSales
{
    public $total;
    public $reason;
    public $created_at;
    public $updated_at;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entrepreneur_user_id', 'sales_id'], 'integer'],
            [['total', 'reason','created_at','updated_at'], 'safe'],

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
        $query = EntpSales::find();
        $query->joinWith(['entrepreneur','sales'])->where('entp_sales.entrepreneur_user_id='.$id);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['total'] = [
            'asc' => ['sales.total' => SORT_ASC],
            'desc' => ['sales.total' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['reason'] = [
            'asc' => ['sales.reason' => SORT_ASC],
            'desc' => ['sales.reason' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['created_at'] = [
            'asc' => ['sales.created_at' => SORT_ASC],
            'desc' => ['sales.created_at' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['updated_at'] = [
            'asc' => ['sales.updated_at' => SORT_ASC],
            'desc' => ['sales.updated_at' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'entrepreneur_user_id' => $this->entrepreneur_user_id,
            'sales_id' => $this->sales_id,
        ]);

        $query->andFilterWhere(['like', 'sales.total', $this->total])
            ->andFilterWhere(['like', 'sales.reason', $this->reason])
            ->andFilterWhere(['like', 'sales.created_at', $this->created_at])
            ->andFilterWhere(['like', 'sales.updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
