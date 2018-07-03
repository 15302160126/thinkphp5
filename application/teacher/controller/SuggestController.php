<?php
namespace app\teacher\controller;
use think\Controller;
use app\common\model\Suggest;
class SuggestController extends Base
{
    public function index()
    {
    	$suggests=Model('Suggest')->getAllSuggest();
        return $this->fetch('',['suggests'=>$suggests]);
    }
    public function delete(){
        $id=input('param.id');
        if($id==0||is_null($id)){$this->error('参数有误');}
        $suggest=model('Suggest')->get($id);
        if(!is_null($suggest)){
            if($suggest->delete()){
                $this->success('删除成功','suggest/index');
            }
        }
            $this->error('删除失败');
    }
    public function detail(){
        $id=input('param.id');
        if($id==0||is_null($id)){
            $this->error('参数有误');
        }
        $suggest=model('Suggest')->get($id);
        $this->assign('suggest',$suggest);
        return $this->fetch('');
    }
}
?>
