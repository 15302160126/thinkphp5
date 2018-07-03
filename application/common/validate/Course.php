<?php
namespace app\common\validate;
use think\Validate;
class Course extends Validate{
	protected $rule=[
		['coursename','require|max:20','名字不超过20个字符'],
	];
	protected $scene=[
		'add'=>['coursename'],
		'edit'=>['id','coursename'],
		'delete'=>['id'],
	];
}
?>