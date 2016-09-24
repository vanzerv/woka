<?php

namespace common\models\woka\wechat\user;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\woka\wechat\user\WechatUsers;

/**
 * WechatUsersSearch represents the model behind the search form about `common\models\woka\wechat\user\WechatUsers`.
 */
class WechatUsersSearch extends WechatUsers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wechat_user_id', 'wehat_account_id', 'sex', 'subscribe_time', 'groupid', 'is_vip', 'user_type'], 'integer'],
            [['openid', 'nickname', 'language', 'city', 'province', 'country', 'headimgurl', 'remark', 'subscribe'], 'safe'],
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
        $query = WechatUsers::find();

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
            'wechat_user_id' => $this->wechat_user_id,
            'wehat_account_id' => $this->wehat_account_id,
            'sex' => $this->sex,
            'subscribe_time' => $this->subscribe_time,
            'groupid' => $this->groupid,
            'is_vip' => $this->is_vip,
            'user_type' => $this->user_type,
        ]);

        $query->andFilterWhere(['like', 'openid', $this->openid])
            ->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'headimgurl', $this->headimgurl])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'subscribe', $this->subscribe]);

        return $dataProvider;
    }
}
