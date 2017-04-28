<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Department;

/**
 * DepartmentSearch represents the model behind the search form about `app\models\Department`.
 */
class DepartmentSearch extends Department
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
         return [
            [['department_id'], 'integer'],
            [['department_name', 'department_create', 'department_status', 'company_fk_id', 'branch_fk_id'], 'safe'],
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
        $query = Department::find();
       // $this->p(Department::find()->joinWith('company')->asArray()->one());
        // add conditions that should always apply here
  
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
      $dataProvider->sort->attributes['company_name'] = 
        ['asc' => ['company.company_name' => SORT_ASC],
        'desc' => ['company.company_name' => SORT_DESC],];
        $dataProvider->sort->attributes['branch_name'] = 
        ['asc' => ['branch.branch_name' => SORT_ASC],
        'desc' => ['branch.branch_name' => SORT_DESC],];
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');

            return $dataProvider;
        }
        $query->joinWith('company')->joinWith('branch');
        // grid filtering conditions
        $query->andFilterWhere([
            'department_id' => $this->department_id,
            
           
            'department_create' => $this->department_create,
        ]);

        $query->andFilterWhere(['like', 'department_name', $this->department_name])
            ->andFilterWhere(['like', 'department_status', $this->department_status])
            ->andFilterWhere(['like','company.company_name',$this->company_fk_id])
             ->andFilterWhere(['like','branch.branch_name',$this->branch_fk_id]);


        return $dataProvider;
    }
}
