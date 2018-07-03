<?php
	namespace app\common\model;
	use think\Model;
	class Suggest extends BaseModel{
		public function getAllSuggest()
		{
			$order=['id'=>'asc'];
			return $this->order($order)
						->paginate(5);
		}
		public function add($data){
			$this->allowField(true)->save($data);
			return $this->id;
		}
		public function getAllSuggestSelect(){
			$order=['id'=>'desc'];
			return $this->order($order)
						->select();
		}
		public function getSuggestByuserName($title){
			$data=['title'=>$title];
			return $this->where($data)->find();
		}
		public function Course(){
			return $this->belongsTo('Course');
		}
		public function Teacher(){
			return $this->belongsTo('Teacher');
		}
	} 
?>