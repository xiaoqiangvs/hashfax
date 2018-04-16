<?php
namespace backend\actions;

use backend\models\ZfbNews;
use yii\base\Action;
use yii\helpers\Json;
use Yii;
use yii\helpers\Url;

/**
 * 获取列表
 * Class getCustListAction
 * @package backend\actions\order
 */
class GetNewsListAction extends Action {
    public function run() {
        $request = Yii::$app->request;
        $param = $request->post();

        $row = ZfbNews::find()->where(['is_del' => 0]);
        if(isset($param['news_title']) && $param['news_title']){
            $row->andWhere('news_title like :news_title', [':news_title' => '%'.$param['news_title'].'%']);
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
            $updown = '<a href="'.Url::toRoute(['article/edit','id'=>$item['news_id']]).'" class="btn btn-xs blue">编辑</a>';
            $updown .= '<a href="javascript:;" onclick=confrimDo("'.Url::toRoute(["news/delete","id"=>$item['news_id']]).'","是否删除该新闻?") class="btn btn-xs red">删除</a>';
            $datas[]=array(
                '<th width="2%"><label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input type="checkbox" class="group-checkable" name="id" value="'.$item['news_id'].'" /><span></span></label></th>',
                $item['news_title'],
                $item['meta_keyword'],
                $item['ctime'],
                $updown
            );
        };
        return $datas;
    }
}
?>