<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TransferItem;

/**
 * TransferItemSearch represents the model behind the search form about `app\models\TransferItem`.
 */
class TransferItemSearch extends TransferItem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'transfer_request_id', 'transfer_accept_id', 'box_id', 'status'], 'integer'],
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
        $query = TransferItem::find();

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
            'transfer_request_id' => $this->transfer_request_id,
            'transfer_accept_id' => $this->transfer_accept_id,
            'box_id' => $this->box_id,
            'status' => $this->status,
        ]);

        return $dataProvider;
    }
}
