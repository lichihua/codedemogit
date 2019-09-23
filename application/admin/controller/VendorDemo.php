<?php
namespace app\admin\controller;//多层级留下
use think\Controller;
use app\admin\controller\Common;
use app\admin\Model\VendorDemo as VendorDemoModel;//这里的VendorDemo和Model的VendorDemo重名
use think\Exception;
//use app\lib\exception\VendorDemoException;
//use app\admin\validate\IDMustBePositiveInt;
class VendorDemo extends controller{
    /*验证码*/
    public function captcha(){
    	import('sms.SmsBao', EXTEND_PATH, '.php');
    	$sms=new \think\Sms\SmsBao('qq285561932','brother');
    
    	return $this->fetch();
    }

	//短信验证
	public function sendCode(){
		//接收电话号码
    	$phone = I('post.key');
		//随机生成6位验证码
		$rand = mt_rand(100000,999999);
    	$content = "谢谢你注册我的网站，您的验证码是$rand,验证码在15分钟内有效，本次短信免费，回复无效";
		
		// 2.必须保存生成的验证码
    	$code = ['code'=>$rand,'time'=>time()];
    	session('code',$code);
		
		// 3.执行发送
    	$sms = new \Org\Sms\SmsBao('qq285561932','brother');
    	$data = $sms->sendSms($phone, $content);
		
		//4.返回数据
		$this->ajaxReturn($data);
		
	}


	public function checkCode(){
		// 将获取到的验证码和session中的验证码进行比对
    	// $_POST['code'] = session('code.code')
    	// 验证码不能过期
    	if (time() - session('code.time') > 900) die('验证码过期');
    		
		if (I('post.code') == session('code.code')) {
			echo '验证通过';	
		} else {
			echo '验证码输入错误';
			
		}
			
		}

}