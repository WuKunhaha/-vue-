<?php
namespace Home\Controller;
include_once('Conf/config.php');
use Think\Controller;

class UserController extends Controller
{
	public function index()
	{
		$map=$_GET;
		$model=D("User");
		$data=$model->where($map)->select();
		$this->ajaxReturn($data);
	}

	public function login()
	{
		$model=D("User");
		$info=$_POST;
		$condition['username'] = $_POST['username'];
		$query['username'] = $_POST['username'];
		$query['password'] = $_POST['password'];

		$uid = $model->where($condition)->select()[0]['id'];
		$uname = $model->where($condition)->select()[0]['username'];

		$result = $model->where($condition)->count();
		if($result == 0){
//			$data=array(
//				code => '-1',
//				msg => '未找到该用户'
//			);

		$data=-1;
		$this->ajaxReturn($data);

		}else{
			$result1 = $model->where($query)->count();

			if($result1>0){
				$data=array(
					code=>'0',
					msg=>'登录成功',
					uid=>$uid,
					uname=>$uname
				);
			}else{
//				$data=array(
//					code=>'102',
//					msg=>'密码错误'
//				);
			$data=0;
			}
			$this->ajaxReturn($data);
		}
	}

	public function register(){
		$model=D("User");
		$result=$model->add($_POST);
//		$info=$_POST;
//		$condition['username'] = $_POST['username'];
//		$query['username'] = $_POST['username'];
//		$query['password'] = $_POST['password'];
//		$result2 = $model->where($query)->count();		
//		if($result2=1){
//			$data=3;
//		}
//		config.log($result2);
		if($result > 0){
//			$data=array(
//				code=>'0',
//				msg=>'注册成功'
//			);
			$data='ok';
		}else{
			$data=array(
				code=>'102',
				msg=>'注册失败'
			);
		}
		$this->ajaxReturn($data);
	}
}
?>