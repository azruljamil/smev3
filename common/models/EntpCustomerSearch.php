<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EntpCustomer;

/**
 * EntpCustomerSearch represents the model behind the search form about `common\models\EntpCustomer`.
 */
class EntpCustomerSearch extends EntpCustomer
{
    public $name;
    public $pic;
    public $telephone;
    public $mobile;
    public $email;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entrepreneur_user_id', 'customer_id'], 'integer'],
            [['name', 'pic','telephone','mobile','email'], 'safe'],
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
        $query = EntpCustomer::find();
        $query->joinWith(['customer'])->where('entp_customer.entrepreneur_user_id='.$id);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['name'] = [
            'asc' => ['customer.name' => SORT_ASC],
            'desc' => ['customer.name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['pic'] = [
            'asc' => ['customer.pic' => SORT_ASC],
            'desc' => ['customer.pic' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['telephone'] = [
            'asc' => ['customer.telephone' => SORT_ASC],
            'desc' => ['customer.telephone' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['mobile'] = [
            'asc' => ['customer.mobile' => SORT_ASC],
            'desc' => ['customer.mobile' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['email'] = [
            'asc' => ['customer.email' => SORT_ASC],
            'desc' => ['customer.email' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'entrepreneur_user_id' => $this->entrepreneur_user_id,
            'customer_id' => $this->customer_id,
        ]);

        $query->andFilterWhere(['like', 'customer.name', $this->name])
            ->andFilterWhere(['like', 'customer.pic', $this->pic])
            ->andFilterWhere(['like', 'customer.telephone', $this->telephone])
            ->andFilterWhere(['like', 'customer.mobile', $this->mobile])
            ->andFilterWhere(['like', 'customer.email', $this->email]);

        return $dataProvider;
    }
}
