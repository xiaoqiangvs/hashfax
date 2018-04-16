<?php

namespace common\helps;

use Yii;
use yii\helpers\Json;

class Upload
{
    /**
     * @上传单个图片
     * @param  int $is_small
     * @return array
     */
    public static function uploadArticleImage($is_small = false)
    {
        $params = Yii::$app->params['upload'];

        $file_data = isset($_FILES["upfile"]) ? $_FILES["upfile"] : 0;

        if(!$file_data){
            return ['code'=>0,'data'=>'没有数据'];
        }
        if($file_data["error"] > 0){
            return ['code'=>0,'data'=>'上传失败'];
        }
        if(!$file_data["size"]){
            return ['code'=>0,'data'=>'没有数据'];
        }
        if(!is_uploaded_file($file_data["tmp_name"])){
            return ['code'=>0,'data'=>'上传方式不正确'];
        }
        if(!in_array($file_data["type"], $params["allowed"])){
            return ['code'=>0,'data'=>'上传类型不正确'];
        }
        if(round(($file_data["size"])/1024) > $params["max_size"]){
            return ['code'=>0,'data'=>'图片大小超过10M'];
        }

        $tmp_img = Yii::$app->Upload->upload($file_data);
        $img_url = Yii::$app->Upload->move($tmp_img['0'],$params["image_type"], $is_small);//不生成缩略图片

        return ['code'=>1,'data'=>$img_url, 'filename' => $file_data['name'], 'size' => $file_data['size']];
    }

    /**
     * @上传单个图片
     * @param  int $is_small
     * @return array
     */
    public static function uploadImage($is_small = false)
    {
        $params = Yii::$app->params['upload'];

        $file_data = isset($_FILES["file"]) ? $_FILES["file"] : 0;


        if(!$file_data){
            return ['code'=>0,'data'=>'没有数据'];
        }
        if($file_data["error"] > 0){
            return ['code'=>0,'data'=>'上传失败'];
        }
        if(!$file_data["size"]){
            return ['code'=>0,'data'=>'没有数据'];
        }
        if(!is_uploaded_file($file_data["tmp_name"])){
            return ['code'=>0,'data'=>'上传方式不正确'];
        }
        if(!in_array($file_data["type"], $params["allowed"])){
            return ['code'=>0,'data'=>'上传类型不正确'];
        }
        if(round(($file_data["size"])/1024) > $params["max_size"]){
            return ['code'=>0,'data'=>'图片大小超过10M'];
        }

        $tmp_img = Yii::$app->Upload->upload($file_data);
        $img_url = Yii::$app->Upload->move($tmp_img['0'],$params["image_type"], $is_small);//不生成缩略图片

        return ['code'=>1,'data'=>$img_url];
    }

    /**
     * @上传多个图片
     * @param  int $is_small
     * @return array
     */
    public static function uploadMultiImage($is_small = false)
    {
        $params = Yii::$app->params['upload'];

        $file_data = isset($_FILES["file"]) ? $_FILES["file"] : 0;
        foreach($file_data['name'] as $key => $val){
            if(empty($val)){
                unset($file_data['name'][$key]);
                unset($file_data['type'][$key]);
                unset($file_data['tmp_name'][$key]);
                unset($file_data['error'][$key]);
                unset($file_data['size'][$key]);
                continue;
            }
            $fileArr[$key]['name'] = $val;
            $fileArr[$key]['type'] = $file_data['type'][$key];
            $fileArr[$key]['tmp_name'] = $file_data['tmp_name'][$key];
            $fileArr[$key]['error'] = $file_data['error'][$key];
            $fileArr[$key]['size'] = $file_data['size'][$key];
        }
        if(empty($fileArr)){
            return Json::encode(['code'=>401,'msg'=>'没有数据']);
        }

        foreach($fileArr as $k => $v){
            if(!$fileArr[$k]){
                return ['code'=>0,'data'=>'没有数据'];
            }
            if($fileArr[$k]["error"] > 0){
                return ['code'=>0,'data'=>'上传失败'];
            }
            if(!$fileArr[$k]["size"]){
                return ['code'=>0,'msg'=>'没有数据'];
            }
            if(!is_uploaded_file($fileArr[$k]["tmp_name"])){
                return ['code'=>0,'msg'=>'上传方式不正确'];
            }
            if(!in_array($fileArr[$k]["type"], $params["allowed"])){
                return ['code'=>0,'msg'=>'上传类型不正确'];
            }

            if(round(($fileArr[$k]["size"])/1024) > $params["max_size"]){
                return ['code'=>0,'msg'=>'图片大小超过10M'];
            }

            $tmp_img = Yii::$app->Upload->upload($fileArr[$k]);
            $img_url = Yii::$app->Upload->move($tmp_img['0'],$params["image_type"], $is_small);//不生成缩略图片
            $imgData[$k] = $img_url;
        }
        return ['code'=>1,'data'=>$imgData];
    }

    /**
     * @上传图片共用逻辑
     * @param  int $is_small
     * $param string $newfile 自定义文件夹名
     * @return array
     */
    public static function uploadFile($is_small = false)
    {
        $params = Yii::$app->params['upload'];

        $file_data = isset($_FILES["file"]) ? $_FILES["file"] : 0;

        if(!$file_data){
            return ['code'=>0,'data'=>'没有数据'];
        }
        if($file_data["error"] > 0){
            return ['code'=>0,'data'=>'上传失败'];
        }
        if(!$file_data["size"]){
            return ['code'=>0,'data'=>'没有数据'];
        }
        if(!is_uploaded_file($file_data["tmp_name"])){
            return ['code'=>0,'data'=>'上传方式不正确'];
        }
        if(!in_array($file_data["type"], $params["allowed"])){
            return ['code'=>0,'data'=>'上传类型不正确'];
        }
        if(round(($file_data["size"])/1024) > $params["max_size"]){
            return ['code'=>0,'data'=>'文件大小超过10M'];
        }

        $tmp_file = Yii::$app->Upload->upload($file_data);
        $file_url = Yii::$app->Upload->moveFile($tmp_file['0'],$params["file_type"], $is_small);//不生成缩略图片

        return ['code'=>1,'data'=>$file_url];
    }

    /**
     * @上传多个图片
     * @param  int $is_small
     * @return array
     */
    public static function uploadMultiFile($is_small = false)
    {
        $params = Yii::$app->params['upload'];

        $file_data = isset($_FILES["file"]) ? $_FILES["file"] : 0;
        foreach($file_data['name'] as $key => $val){
            if(empty($val)){
                unset($file_data['name'][$key]);
                unset($file_data['type'][$key]);
                unset($file_data['tmp_name'][$key]);
                unset($file_data['error'][$key]);
                unset($file_data['size'][$key]);
                continue;
            }
            $fileArr[$key]['name'] = $val;
            $fileArr[$key]['type'] = $file_data['type'][$key];
            $fileArr[$key]['tmp_name'] = $file_data['tmp_name'][$key];
            $fileArr[$key]['error'] = $file_data['error'][$key];
            $fileArr[$key]['size'] = $file_data['size'][$key];
        }
        if(empty($fileArr)){
            return ['code'=>0,'msg'=>'没有数据'];
        }

        foreach($fileArr as $k => $v){
            if(!$fileArr[$k]){
                return ['code'=>0,'msg'=>'没有数据'];
            }
            if(!$fileArr[$k]["error"]>0){
                return ['code'=>0,'msg'=>'上传失败'];
            }
            if(!$fileArr[$k]["size"]){
                return ['code'=>0,'msg'=>'没有数据'];
            }
            if(!is_uploaded_file($fileArr[$k]["tmp_name"])){
                return ['code'=>0,'msg'=>'上传方式不正确'];
            }
            if(!in_array($fileArr[$k]["type"], $params["allowed"])){
                return ['code'=>0,'msg'=>'上传类型不正确'];
            }
            if(round(($fileArr[$k]["size"])/1024) > $params["max_size"]){
                return ['code'=>0,'msg'=>'文件大小超过10M'];
            }

            $tmp_file = Yii::$app->Upload->upload($fileArr[$k]);
            $file_url = Yii::$app->Upload->moveFile($tmp_file['0'],$params["file_type"], $is_small);//不生成缩略图片
            $fileData[$k] = $file_url;
        }
        return ['code'=>1,'data'=>$fileData];
    }
}
?>