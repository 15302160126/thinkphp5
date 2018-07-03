<?php
	namespace app\common\model;
	use think\Model;
	class User extends BaseModel{
		public function getAllUser()
		{
			$order=['id'=>'asc'];
			return $this->order($order)
						->paginate(5);
		}
		public function add($data){
			$this->save($data);
			return $this->id;
		}
		public function getAllUserSelect(){
			$order=['id'=>'desc'];
			return $this->order($order)
						->select();
		}
		public function getUserByuserName($username){
			$data=['username'=>$username];
			return $this->where($data)->find();
		}
		public function Course(){
			return $this->belongsTo('Course');
		}
	} 
?>