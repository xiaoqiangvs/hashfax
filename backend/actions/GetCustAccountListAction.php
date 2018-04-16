<?php
namespace backend\actions;

use backend\models\ZfbCustAccount;
use backend\models\ZfbCustBank;
use yii\base\Action;
use yii\helpers\Json;
use Yii;
use yii\helpers\Url;

/**
 * 获取列表
 * Class getCustListAction
 * @package backend\actions\order
 */
class GetCustAccountListAction extends Action {
    public function run() {
        $request = Yii::$app->request;
        $param = $request->post();

        $row = ZfbCustAccount::find()->with('cust')->with('coin')->leftJoin('zfb_cust', 'zfb_cust.cust_id = zfb_cust_account.cust_id');
        if(isset($param['cust_name']) && $param['cust_name']){
            $row->andWhere('zfb_cust.cust_name like :cust_name', [':cust_name' => '%'.$param['cust_name'].'%']);
        }
        if(isset($param['account']) && $param['account']){
            $row->andWhere('zfb_cust.account like :account', [':account' => '%'.$param['account'].'%']);
        }
        if(isset($param['cust_phone']) && $param['cust_phone']){
            $row->andWhere('zfb_cust.cust_phone like :cust_phone', [':cust_phone' => '%'.$param['cust_phone'].'%']);
        }
        if(isset($param['start_date']) && $param['start_date'] && isset($param['end_date']) && $param['end_date']){
            $start_date = $param['start_date'].' 00:00:01';
            $end_date = $param['end_date'].' 23:59:59';
            if(strtotime($param['end_date']) < strtotime($param['start_date'])){
                $start_date = $param['end_date'].' 00:00:01';
                $end_date = $param['start_date'].' 23:59:59';
            }
            $row->andFilterWhere(['between','zfb_cust_account.ctime',$start_date, $end_date]);
        }elseif((isset($param['start_date']) && $param['start_date']) || (isset($param['end_date']) && $param['end_date'])){
            $start_date = ($param['start_date'] ? $param['start_date'] : $param['end_date']).' 00:00:01';
            $end_date = ($param['start_date'] ? $param['start_date'] : $param['end_date']).' 23:59:59';
            $row->andFilterWhere(['between','zfb_cust_account.ctime',$start_date, $end_date]);
        }

        $row = $row->orderBy('ctime desc');
        $result["recordsTotal"] =  $result["recordsFiltered"] =  $row->count();
        //$length = isset($param['length']) ? ($param['length'] ? $param['length'] : 20) : 20;
        $result['datas'] = $row->limit($param["length"])->offset($param["start"])->all();
        //echo $row->createCommand()->sql;

        $result["data"] = $this->_loadData($result["datas"]);
        unset($result["datas"]);
        return Json::encode($result);
    }

    /**
     * 拼凑列表数据
     * @param $result
     */
    private function _loadData($data){
        $datas = [];
        //配置数据
        foreach($data  as $key=>$item){
            $updown = '<a href="#" data-toggle="modal" data-target=\'#draggable\' onclick="addRechargeForm(this, \'saveForm\')"
             data-account-id="'.$item['account_id'].'" data-coin-id="'.$item['coin_id'].'" data-coin-type="'.$item['coin']['coin_type'].'" data-cust-id="'.$item['cust']['cust_id'].'"
             data-account="'.$item['account'].'" class="btn btn-xs blue">添加充值记录</a>';
            //$updown .= '<a href="javascript:;" onclick=confrimDo("'.Url::toRoute(["cust/delete","id"=>$item['cust_id']]).'","是否删除该客户?") class="btn btn-xs red">删除</a>';
            $datas[]=array(
                '<th width="2%"><label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input type="checkbox" class="group-checkable" name="id" value="'.$item['account_id'].'" /><span></span></label></th>',
                $item['cust']['cust_name'],
                $item['cust']['cust_email'],
                $item['cust']['cust_phone'],
                $item['account'],
                $item['coin']['coin_type'],
                $item['ctime'],
                $item['account_desp'],
                $updown
            );
        };
        return $datas;
    }
}
?>