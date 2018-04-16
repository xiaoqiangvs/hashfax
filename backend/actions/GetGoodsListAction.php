<?php
namespace backend\actions;

use backend\models\ZfbGoods;
use yii\base\Action;
use yii\helpers\Json;
use Yii;
use yii\helpers\Url;

/**
 * 获取列表
 * Class getCustListAction
 * @package backend\actions\order
 */
class GetGoodsListAction extends Action {
    public function run() {
        $request = Yii::$app->request;
        $param = $request->post();

        $row = ZfbGoods::find()->where('is_del=0');
        if(isset($param['good_title']) && $param['good_title']){
            $row->andWhere('good_title like :good_title', [':good_title' => '%'.$param['good_title'].'%']);
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
                'good_title' => $item['good_title'],
                'good_price' => $item['good_price'],
                'sign_calc' => $item['sign_calc'],
                'store' => $item['store'],
                'opentime' => $item['opentime'],
                'zuli_days' => $item['zuli_days'],
                'huiben_days' => $item['huiben_days'],
                'synchro:checkbox' => $item['synchro'],
                'dianfei' => $item['dianfei'],
                'gonghao' => $item['gonghao'],
                'ri_weihu' => $item['ri_weihu'],
                'good_id' => $item['good_id'],
            );
            $updown = '<span class="hidden">'.json_encode($editCol).'</span><a href="#" data-toggle="modal" data-target=\'#draggable\' onclick="editForm(this, \'saveForm\')" class="btn btn-xs blue">编辑</a>';
            $updown .= '<a href="javascript:;" onclick=confrimDo("'.Url::toRoute(["goods/delete","id"=>$item['good_id']]).'","是否删除该商品?") class="btn btn-xs red">删除</a>';
            $datas[]=array(
                '<th width="2%"><label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input type="checkbox" class="group-checkable" name="id" value="'.$item['good_id'].'" /><span></span></label></th>',
                $item['good_title'],
                $item['good_price'],
                $item['sign_calc'],
                $item['store'],
                $item['opentime'],
                $item['zuli_days'],
                $item['huiben_days'],
                $item['status'] ? '已满' : '可购',
                $item['flag'] ? '下架' : '上架',
                $item['ctime'],
                $updown
            );
        };
        return $datas;
    }
}
?>