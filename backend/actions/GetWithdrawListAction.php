<?php
namespace backend\actions;

use backend\models\ZfbCustAccount;
use backend\models\ZfbCustBank;
use backend\models\ZfbCustFinanceLog;
use yii\base\Action;
use yii\helpers\Json;
use Yii;
use yii\helpers\Url;

/**
 * 获取列表
 * Class getCustListAction
 * @package backend\actions\order
 */
class GetWithdrawListAction extends Action {
    public function run() {
        $request = Yii::$app->request;
        $param = $request->post();

        $row = ZfbCustFinanceLog::find()->with('cust')->with('coin')->where(['flag' => 1])->leftJoin('zfb_cust', 'zfb_cust.cust_id = zfb_cust_finance_log.cust_id');
        if(isset($param['cust_name']) && $param['cust_name']){
            $row->andWhere('zfb_cust.cust_name like :cust_name', [':cust_name' => '%'.$param['cust_name'].'%']);
        }
        if(isset($param['cust_phone']) && $param['cust_phone']){
            $row->andWhere('zfb_cust.cust_phone like :cust_phone', [':cust_phone' => '%'.$param['cust_phone'].'%']);
        }
        /*if(isset($param['withdraw_money']) && $param['withdraw_money']){
            $row->andWhere('withdraw_money like :withdraw_money', [':withdraw_money' => '%'.$param['withdraw_money'].'%']);
        }*/
        if(isset($param['status']) && $param['status'] != ''){
            $row->andWhere(['status' => $param['status']]);
        }
        if(isset($param['start_date']) && $param['start_date'] && isset($param['end_date']) && $param['end_date']){
            $start_date = $param['start_date'].' 00:00:01';
            $end_date = $param['end_date'].' 23:59:59';
            if(strtotime($param['end_date']) < strtotime($param['start_date'])){
                $start_date = $param['end_date'].' 00:00:01';
                $end_date = $param['start_date'].' 23:59:59';
            }
            $row->andFilterWhere(['between','zfb_cust_finance_log.ctime',$start_date, $end_date]);
        }elseif((isset($param['start_date']) && $param['start_date']) || (isset($param['end_date']) && $param['end_date'])){
            $start_date = ($param['start_date'] ? $param['start_date'] : $param['end_date']).' 00:00:01';
            $end_date = ($param['start_date'] ? $param['start_date'] : $param['end_date']).' 23:59:59';
            $row->andFilterWhere(['between','zfb_cust_finance_log.ctime',$start_date, $end_date]);
        }

        $row = $row->orderBy('ctime desc');
        $result["recordsTotal"] =  $result["recordsFiltered"] =  $row->count();
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
            $editCol = array(
                'log_id' => $item['log_id'],
            );
            if($item['coin_id'] !='1'){  // 币种不是CNY
                $model = ZfbCustAccount::findOne($item['account_id']);
                $addrOrNo = $model->account;
            }else{
                $model = ZfbCustBank::findOne($item['account_id']);
                $addrOrNo = $model->bank_no;
            }

            $updown = '<span class="hidden">'.json_encode($editCol).'</span><a href="#" class="btn btn-xs blue" data-toggle="modal" onclick="editForm(this, \'saveForm\')" data-target=\'#draggable\'>编辑</a>';
            //$updown .= '<a href="javascript:;" onclick=confrimDo("'.Url::toRoute(["cust/delete","id"=>$item['recharge_id']]).'","是否删除该客户?") class="btn btn-xs red">删除</a>';
            $datas[]=array(
                '<th width="2%"><label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input type="checkbox" class="group-checkable" name="id" value="'.$item['log_id'].'" /><span></span></label></th>',
                $item['cust']['cust_name'],
                $item['cust']['cust_email'],
                $item['cust']['cust_phone'],
                $item['coin']['coin_type'],
                $addrOrNo,
                $item['amount'],
                $item['ctime'],
                $item['status'] == 1 ? '<span class="label label-sm label-success">已完成</span>':'<span class="label label-sm label-danger">待提现</span>',
                $item['utime'],
                $item['desp'],
                $updown
            );
        };
        return $datas;
    }
}
?>