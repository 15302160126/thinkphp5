<?php
	namespace app\common\model;
	use think\Model;
	class Course extends BaseModel{
		public function getAllCourse()
		{
			$order=['id'=>'asc'];
			return $this->order($order)
						->paginate(5);
		}
		public function add($data){
			$this->allowField(true)->save($data);
			return $this->id;
		}
		public function getAllCourseSelect(){
			$order=['id'=>'desc'];
			return $this->order($order)
						->select();
		}
		public function getCourseByuserName($coursename){
			$data=['coursename'=>$coursename];
			return $this->where($data)->find();
		}
	} 
?>