<?php
namespace app\index\controller;
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
}
?>
