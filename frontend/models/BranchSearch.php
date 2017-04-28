<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Branch;

/**
 * BranchSearch represents the model behind the search form about `app\models\Branch`.
 */
class BranchSearch extends Branch
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['branch_id'], 'integer'],
            [['branch_name', 'branch_created', 'branch_status','company_fk_id'], 'safe'],
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
        $query = Branch::find();
        //$this->p(Branch::find()->joinWith('company')->asArray()->one());
        // add conditions that should always apply here
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['company_name'] = 
        ['asc' => ['company.company_name' => SORT_ASC],
        'desc' => ['company.company_name' => SORT_DESC],];
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query = $query->joinWith('company');
        // grid filtering conditions
        //$this->p($query->asArray()->one());
        $query->andFilterWhere([
            'branch_id' => $this->branch_id,
            
            'branch_created' => $this->branch_created,
        ]);

        $query->andFilterWhere(['like', 'branch_name', $this->branch_name])
            ->andFilterWhere(['like', 'branch_status', $this->branch_status])
            ->andFilterWhere(['like','company.company_name',$this->company_fk_id]);

        return $dataProvider;
    }
}
