<?php
namespace backend\actions;

use backend\models\ZfbProd;
use yii\base\Action;
use yii\helpers\Json;
use Yii;
use yii\helpers\Url;

/**
 * 获取列表
 * Class getCustListAction
 * @package backend\actions\order
 */
class GetProdListAction extends Action {
    public function run() {
        $request = Yii::$app->request;
        $param = $request->post();

        $row = ZfbProd::find()->where('is_del=0');
        if(isset($param['prod_name']) && $param['prod_name']){
            $row->andWhere('prod_name like :prod_name', [':prod_name' => '%'.$param['prod_name'].'%']);
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
                'prod_name' => $item['prod_name'],
                'suanli' => $item['suanli'],
                'desp:textarea' => $item['desp'],
                'prod_id' => $item['prod_id'],
            );
            $updown = '<span class="hidden">'.json_encode($editCol).'</span><a href="#" data-toggle="modal" data-target=\'#draggable\' onclick="editForm(this, \'saveForm\')" class="btn btn-xs blue">编辑</a>';
            $updown .= '<a href="javascript:;" onclick=confrimDo("'.Url::toRoute(["prod/delete","id"=>$item['prod_id']]).'","是否删除该产品?") class="btn btn-xs red">删除</a>';
            $datas[]=array(
                '<th width="2%"><label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input type="checkbox" class="group-checkable" name="id" value="'.$item['prod_id'].'" /><span></span></label></th>',
                $item['prod_name'],
                $item['suanli'],
                $item['desp'],
                $item['ctime'],
                $updown
            );
        };
        return $datas;
    }
}
?>