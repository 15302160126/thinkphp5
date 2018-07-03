<?php
namespace app\common\validate;
use think\Validate;
class Admin extends Validate{
	protected $rule=[
		['username','require|max:13','名字不超过13个字符'],
	];
	protected $scene=[
		'add'=>['username'],
		'edit'=>['id','username'],
		'delete'=>['id'],
	];
}
?>