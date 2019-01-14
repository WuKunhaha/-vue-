<?php
namespace Home\Controller;
include_once('Conf/config.php');
use Think\Controller;

class AdminController extends Controller
{
	public function login()
	{
		$model=D("Admin");
		$info=$_POST;
		$condition['username'] = $_POST['username'];
		$query['username'] = $_POST['username'];
		$query['password'] = $_POST['password'];

		$result = $model->where($condition)->count();
		if($result == 0){
			$data=array(
				code => '-1',
				msg => '未找到该用户'
			);
			$this->ajaxReturn($data);

		$this->ajaxReturn($data);
		}else{
			$result1 = $model->where($query)->count();

			if($result1>0){
				$data=array(
					code=>'0',
					msg=>'登录成功'
				);
//				$data='ok';
			}else{
				$data=array(
					code=>'102',
					msg=>'密码错误'
				);
			$data=0;
			}
			$this->ajaxReturn($data);
		}
	}
}
?>