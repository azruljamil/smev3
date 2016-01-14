<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EntpExpenses;

/**
 * EntpExpensesSearch represents the model behind the search form about `common\models\EntpExpenses`.
 */
class EntpExpensesSearch extends EntpExpenses
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
            [['entrepreneur_user_id', 'expenses_id'], 'integer'],
            [['total','reason','created_at','updated_at'], 'safe'],
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
        $query = EntpExpenses::find();
        $query->joinWith(['entrepreneur','expenses'])->where('entp_expenses.entrepreneur_user_id='.$id);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['total'] = [
            'asc' => ['expenses.total' => SORT_ASC],
            'desc' => ['expenses.total' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['reason'] = [
            'asc' => ['expenses.reason' => SORT_ASC],
            'desc' => ['expenses.reason' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['created_at'] = [
            'asc' => ['expenses.created_at' => SORT_ASC],
            'desc' => ['expenses.created_at' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['updated_at'] = [
            'asc' => ['expenses.updated_at' => SORT_ASC],
            'desc' => ['expenses.updated_at' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'entrepreneur_user_id' => $this->entrepreneur_user_id,
            'expenses_id' => $this->expenses_id,
        ]);

        $query->andFilterWhere(['like', 'expenses.total', $this->total])
            ->andFilterWhere(['like', 'expenses.reason', $this->reason])
            ->andFilterWhere(['like', 'expenses.created_at', $this->created_at])
            ->andFilterWhere(['like', 'expenses.updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
