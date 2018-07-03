<?php
namespace app\common\validate;
use think\Validate;
class Suggest extends Validate{
	protected $rule=[
		['title','require|max:20','名字不超过20个字符'],
	];
	protected $scene=[
		'add'=>['title'],
		'edit'=>['id','title'],
		'delete'=>['id'],
	];
}
?>