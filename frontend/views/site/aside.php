<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

?>
<!-- sidebar start -->
<aside class="col-md-3">
    <div class="sidebar">
        <div class="block clearfix">
            <nav>
                <ul class="nav nav-pills nav-stacked">
                    <?php foreach($this->params['companyNav'] as $val){?>
                        <li <?php if($this->params['cur_ctrl_act'] == substr($val['nav_url'], 0, strlen($this->params['cur_ctrl_act']))){?> class="active"<?php } ?>>
                            <?php
                            $url = Url::toRoute($val['nav_url']);
                            if(!(strpos($val['nav_url'], '&') === false)){
                                $sp = explode('&', $val['nav_url']);
                                $sub_sp = explode('=', $sp[1]);
                                $url = Url::toRoute([$sp[0], $sub_sp[0] => $sub_sp[1]]);
                            }?>
                            <a href="<?=$url?>"><?=Yii::t('app', $val['nav_name'])?></a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
</aside>
<!-- sidebar end -->