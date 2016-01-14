<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EntpSupplier;

/**
 * EntpSupplierSearch represents the model behind the search form about `common\models\EntpSupplier`.
 */
class EntpSupplierSearch extends EntpSupplier
{
    public $address;
    public $name;
    public $telephone;
    public $district;
    public $state;
    public $created_at;
    public $updated_at;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entrepreneur_user_id', 'supplier_id'], 'integer'],
            [['address', 'name', 'telephone','district','state', 'created_at', 'updated_at'], 'safe'],
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
        $query = EntpSupplier::find();
        $query->joinWith(['entrepreneur', 'supplier'])->where('entp_supplier.entrepreneur_user_id='.$id);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['name'] = [
            'asc' => ['supplier.name' => SORT_ASC],
            'desc' => ['supplier.name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['address'] = [
            'asc' => ['supplier.address' => SORT_ASC],
            'desc' => ['supplier.address' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['telephone'] = [
            'asc' => ['supplier.telephone' => SORT_ASC],
            'desc' => ['supplier.telephone' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['district'] = [
            'asc' => ['supplier.district' => SORT_ASC],
            'desc' => ['supplier.district' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['state'] = [
            'asc' => ['supplier.state' => SORT_ASC],
            'desc' => ['supplier.state' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['created_at'] = [
            'asc' => ['supplier.created_at' => SORT_ASC],
            'desc' => ['supplier.created_at' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['updated_at'] = [
            'asc' => ['supplier.updated_at' => SORT_ASC],
            'desc' => ['supplier.updated_at' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'entrepreneur_user_id' => $this->entrepreneur_user_id,
            'supplier_id' => $this->supplier_id,
        ]);

        $query
            ->andFilterWhere(['like', 'supplier.name', $this->name])
            ->andFilterWhere(['like', 'supplier.telephone', $this->telephone])
            ->andFilterWhere(['like', 'supplier.district', $this->district])
            ->andFilterWhere(['like', 'supplier.state', $this->state])
            ->andFilterWhere(['like', 'supplier.address', $this->address])
            ->andFilterWhere(['like', 'supplier.created_at', $this->created_at])
            ->andFilterWhere(['like', 'supplier.updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
