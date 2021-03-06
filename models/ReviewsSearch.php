<?php

namespace imrankucur\reviews\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use imrankucur\reviews\models\Reviews;

/**
 * ReviewsSearch represents the model behind the search form of `backend\Modules\reviews\models\Reviews`.
 */
class ReviewsSearch extends Reviews
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'userid', 'productid', 'starpoint'], 'integer'],
            [['comment'], 'safe'],
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
        $query = Reviews::find();

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
            'id' => $this->id,
            'userid' => $this->userid,
            'productid' => $this->productid,
            'starpoint' => $this->starpoint,
        ]);

        $query->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
