<?php
	namespace app\common\model;
	use think\Model;
	class Teacher extends BaseModel{
		public function getAllTeacher()
		{
			$order=['id'=>'asc'];
			return $this->order($order)
						->paginate(5);
		}
		public function add($data){
			$this->allowField(true)->save($data);
			return $this->id;
		}
		public function getAllTeacherSelect(){
			$order=['id'=>'desc'];
			return $this->order($order)
						->select();
		}
		public function getTeacherByuserName($username){
			$data=['username'=>$username];
			return $this->where($data)->find();
		}
	} 
?>