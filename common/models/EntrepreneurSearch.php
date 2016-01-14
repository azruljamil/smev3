<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Entrepreneur;

/**
 * EntrepreneurSearch represents the model behind the search form about `common\models\Entrepreneur`.
 */
class EntrepreneurSearch extends Entrepreneur
{

    public $username;
    public $email;
    public $name;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'user_id'], 'integer'],
            [['plkn'], 'safe'],
            [['username', 'email','name'], 'safe'],
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
        $query = Entrepreneur::find();
        $query->joinWith(['user','profile']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            //'key' => 'user_id',
        ]);
        $dataProvider->sort->attributes['username'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['user.username' => SORT_ASC],
            'desc' => ['user.username' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['email'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['user.email' => SORT_ASC],
            'desc' => ['user.email' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['name'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['profile.name' => SORT_ASC],
            'desc' => ['profile.name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'profile.name', $this->name])

              ->andFilterWhere(['like', 'user.email', $this->email]);


        $query->andFilterWhere(['like', 'plkn', $this->plkn]);

        return $dataProvider;
    }
}
