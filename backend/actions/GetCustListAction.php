<?php
namespace backend\actions;

use backend\models\ZfbCoin;
use backend\models\ZfbCust;
use backend\models\ZfbCustFinance;
use yii\base\Action;
use yii\helpers\Json;
use Yii;
use yii\helpers\Url;

/**
 * 获取列表
 * Class getCustListAction
 * @package backend\actions\order
 */
class GetCustListAction extends Action {
    public function run() {
        $request = Yii::$app->request;
        $param = $request->post();

        $row = ZfbCust::find()->Where('is_del=0');
        if(isset($param['cust_name']) && $param['cust_name']){
            $row->andWhere('cust_name like :cust_name', [':cust_name' => '%'.$param['cust_name'].'%']);
        }
        if(isset($param['cust_phone']) && $param['cust_phone']){
            $row->andWhere('cust_phone like :cust_phone', [':cust_phone' => '%'.$param['cust_phone'].'%']);
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
        // 币种
        $coinRes = ZfbCoin::find()->asArray()->all();
        $coinList = array();
        if($coinRes){
            foreach($coinRes as $val){
                $coinList[$val['coin_id']] = $val['coin_type'];
            }
        }

        //配置数据
        foreach($data  as $key=>$item){
            //财务中心
            $res = ZfbCustFinance::find()->where(['cust_id' => $item['cust_id']])->asArray()->all();
            $bList = array();  // 可用余额
            $fList = array();  // 冻结金额
            if($res){
                foreach($res as $val){
                    $bList[$val['coin_id']] = $val['balance'];
                    $fList[$val['coin_id']] = $val['frozen'];
                }
            }
            $bArr = array();
            $fArr = array();
            foreach($coinList as $coin_id => $coin_type){
                $bArr[] = $coin_type.':'.(array_key_exists($coin_id, $bList) ? $bList[$coin_id] : '0.00');
                $fArr[] = $coin_type.':'.(array_key_exists($coin_id, $fList) ? $fList[$coin_id] : '0.00');
            }

            $editCol = array(
                'cust_name' => $item['cust_name'],
                'cust_alias' => $item['cust_alias'],
                'cust_email' => $item['cust_email'],
                'cust_phone' => $item['cust_phone'],
                'cust_id' => $item['cust_id'],
            );
            $updown = '<span class="hidden">'.json_encode($editCol).'</span><a href="#" data-toggle="modal" data-target=\'#draggable\' onclick="editForm(this, \'saveForm\')" class="btn btn-xs blue">编辑</a>';
            $updown .= '<a href="javascript:;" onclick=confrimDo("'.Url::toRoute(["cust/delete","id"=>$item['cust_id']]).'","是否删除该客户?") class="btn btn-xs red">删除</a>';
            $datas[]=array(
                '<th width="2%"><label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input type="checkbox" class="group-checkable" name="id" value="'.$item['cust_id'].'" /><span></span></label></th>',
                $item['cust_name'],
                $item['cust_alias'],
                $item['cust_email'],
                $item['cust_phone'],
                join('&nbsp;&nbsp;', $bArr),
                join('&nbsp;&nbsp;', $fArr),
                $item['ctime'],
                $updown
            );
        };
        return $datas;
    }
}
?>