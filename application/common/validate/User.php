<?php
namespace app\common\validate;
use think\Validate;
class User extends Validate{
	protected $rule=[
		['username','require|max:20','名字不超过20个字符'],
	];
	protected $scene=[
		'add'=>['username'],
		'edit'=>['id','username'],
		'delete'=>['id'],
	];
}
?>