<?php
namespace app\api\controller;
use app\common\controller\BaseApi;

//物流信息控制类
class Express extends BaseApi{
    public $user_info = null;
    
    public function __construct() {
        parent::__construct();
        $this->user_info = $this->checkLoginStatus();
    }
    
    //省市区数据字典
    public function getData(){
        if(empty($this->user_info)){
            return jsonReturn(LOGIN_FAILED, '请先登录，谢谢');
        }
        
        $parent_code = input('post.areaCode/d',0);
        $area_model = model('Area');
        $areas = $area_model->getSons($parent_code);
        return jsonReturn(SUCCESSED, '获取成功',$areas);
    }
    
    
}