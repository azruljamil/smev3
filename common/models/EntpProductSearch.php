<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EntpProduct;

/**
 * EntpProductSearch represents the model behind the search form about `common\models\EntpProduct`.
 */
class EntpProductSearch extends EntpProduct
{
    public $product;
    public $user_id;
    public $code;
    public $qty;
    public $created_at;
    public $updated_at;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entrepreneur_user_id', 'product_id'], 'integer'],
            [['product', 'user_id', 'code', 'qty', 'created_at', 'updated_at'], 'safe'],
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
        $query = EntpProduct::find();
        $query->joinWith(['entrepreneur', 'product'])->where('entp_product.entrepreneur_user_id='.$id);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['product'] = [
            'asc' => ['product.product' => SORT_ASC],
            'desc' => ['product.product' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['code'] = [
            'asc' => ['product.code' => SORT_ASC],
            'desc' => ['product.code' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['qty'] = [
            'asc' => ['product.qty' => SORT_ASC],
            'desc' => ['product.qty' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['created_at'] = [
            'asc' => ['product.created_at' => SORT_ASC],
            'desc' => ['product.created_at' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['updated_at'] = [
            'asc' => ['product.updated_at' => SORT_ASC],
            'desc' => ['product.updated_at' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'entrepreneur_user_id' => $this->entrepreneur_user_id,
            'product_id' => $this->product_id,
        ]);

        $query
            ->andFilterWhere(['like', 'product.code', $this->code])
            ->andFilterWhere(['like', 'product.qty', $this->qty])
            ->andFilterWhere(['like', 'product.product', $this->product])
            ->andFilterWhere(['like', 'product.created_at', $this->created_at])
            ->andFilterWhere(['like', 'product.updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
