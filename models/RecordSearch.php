<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Record;

/**
 * RecordSearch represents the model behind the search form of `app\models\Record`.
 */
class RecordSearch extends Record
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_master', 'id_services', 'id_user', 'id_status'], 'integer'],
            [['dataz', 'timez'], 'safe'],
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
        $query = Record::find();

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
            'id_master' => $this->id_master,
            'dataz' => $this->dataz,
            'timez' => $this->timez,
            'id_services' => $this->id_services,
            'id_user' => $this->id_user,
            'id_status' => $this->id_status,
        ]);

        return $dataProvider;
    }
}
