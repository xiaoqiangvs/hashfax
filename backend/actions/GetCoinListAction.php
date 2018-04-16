<?php
namespace backend\actions;

use backend\models\ZfbCoin;
use yii\base\Action;
use yii\helpers\Json;
use Yii;
use yii\helpers\Url;

/**
 * 获取列表
 * Class getCustListAction
 * @package backend\actions\order
 */
class GetCoinListAction extends Action {
    public function run() {
        $request = Yii::$app->request;
        $param = $request->post();

        $row = ZfbCoin::find()->where(['is_del' => 0]);
        if(isset($param['coin_type']) && $param['coin_type']){
            $row->andWhere('coin_type like :coin_type', [':coin_type' => '%'.$param['coin_type'].'%']);
        }

        $row = $row->orderBy('sort asc');
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
                'coin_type' => $item['coin_type'],
                'coin_addr' => $item['coin_addr'],
                'coin_url:textarea' => $item['coin_url'],
                'coin_desp' => $item['coin_desp'],
                'sort' => $item['sort'],
                'coin_id' => $item['coin_id']
            );

            $updown = '<span class="hidden">'.json_encode($editCol).'</span><a href="#" data-toggle="modal" data-target=\'#draggable\' onclick="editForm(this, \'saveForm\')" class="btn btn-xs blue">编辑</a>';
            $updown .= '<a href="javascript:;" onclick=confrimDo("'.Url::toRoute(["coin/delete","id"=>$item['coin_id']]).'","是否删除该内容?") class="btn btn-xs red">删除</a>';
            $datas[]=array(
                '<th width="2%"><label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input type="checkbox" class="group-checkable" name="id" value="'.$item['coin_id'].'" /><span></span></label></th>',
                $item['coin_type'],
                $item['sort'],
                $item['coin_addr'],
                $item['coin_url'],
                $item['coin_desp'],
                $item['ctime'],
                $updown
            );
        };
        return $datas;
    }
}
?>