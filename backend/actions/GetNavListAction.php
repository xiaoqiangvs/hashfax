<?php
namespace backend\actions;

use backend\models\ZfbNav;
use yii\base\Action;
use yii\helpers\Json;
use Yii;
use yii\helpers\Url;

/**
 * 获取列表
 * Class getCustListAction
 * @package backend\actions\order
 */
class GetNavListAction extends Action {
    public function run() {
        $request = Yii::$app->request;
        $param = $request->post();

        $row = ZfbNav::find();
        if(isset($param['nav_name']) && $param['nav_name']){
            $row->andWhere('nav_name like :nav_name', [':nav_name' => '%'.$param['nav_name'].'%']);
        }

        $row = $row->orderBy('nav_ctrl asc, sort asc');
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
                'nav_name' => $item['nav_name'],
                'nav_name_en' => $item['nav_name_en'],
                'sort' => $item['sort'],
                'nav_ctrl' => $item['nav_ctrl'],
                'nav_url' => $item['nav_url'],
                'nav_level:select' => $item['nav_level'],
                'rel_nav_id:selectMulti' => $item['rel_nav_id'],
                'display_sub:radio' => $item['display_sub'],
                'display:radio' => $item['display'],
                'nav_id' => $item['nav_id'],
            );

            $rel_navs = [];
            if($item['rel_nav_id']){
                $res = ZfbNav::find()->where('nav_id in ('.$item['rel_nav_id'].')')->asArray()->all();
                foreach($res as $val){
                    $rel_navs[] = $val['nav_name']."<br/>";
                }
            }

            $updown = '<span class="hidden">'.json_encode($editCol).'</span><a href="#" data-toggle="modal" data-target=\'#draggable\' onclick="editForm(this, \'saveForm\')" class="btn btn-xs blue">编辑</a>';
            $updown .= '<a href="javascript:;" onclick=confrimDo("'.Url::toRoute(["nav/delete","id"=>$item['nav_id']]).'","是否删除该内容?") class="btn btn-xs red">删除</a>';
            $datas[]=array(
                '<th width="2%"><label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input type="checkbox" class="group-checkable" name="id" value="'.$item['nav_id'].'" /><span></span></label></th>',
                $item['nav_name'].($item['nav_level'] ? '<span class="label label-sm label-danger circle">子</span>' : ''),
                $item['nav_name_en'],
                $item['nav_ctrl'],
                $item['nav_url'],
                $item['sort'],
                join('', $rel_navs),
                $item['display_sub'] ? '不显示' : '显示',
                $item['display'] ? '不显示' : '显示',
                $item['ctime'],
                $updown
            );
        };
        return $datas;
    }
}
?>