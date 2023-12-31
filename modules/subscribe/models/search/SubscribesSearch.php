<?php

namespace app\modules\subscribe\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\subscribe\models\Subscribers;

/**
 * SubscribesSearch represents the model behind the search form of `app\modules\subscribe\models\Subscribers`.
 */
class SubscribesSearch extends Subscribers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'is_blocked'], 'integer'],
            [['event_type', 'email', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Subscribers::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id'         => $this->id,
            'is_blocked' => $this->is_blocked,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'event_type', $this->event_type])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
