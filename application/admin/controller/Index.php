<?php
namespace app\admin\controller;
use think\Controller;
use think\loader;
class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }


    public function tempmange(){
        return $this->fetch();
    }

    /*专门用于测试*/
	public function test(){
		return $this->fetch();
	}

    /*空白页*/
    public function blank()
    {
    	$a=get_defined_constants(true)['user'];
    	//dump($a);
    	//dump(config());
        return $this->fetch();
    	return $this->fetch('index',['name'=>'thinkphp']);
    }
    /*datatable表格*/
    public function table()    
    {
		return $this->fetch();
    }
    /*morris*/    
    public function morris(){
    	return $this->fetch();
    }
    /*flot*/
    public function flot(){
    	return $this->fetch();
    }

    /*表单*/
    public function forms(){
    	return $this->fetch();
    }	
    /*panels_wells*/
    public function panels_wells(){
    	return $this->fetch();
    }
    /*buttons*/
    public function buttons(){
    	return $this->fetch();
    }
    /*notifications*/
    public function notifications(){
    	return $this->fetch();
    }
    /*文字表现*/
    public function typography(){
    	return $this->fetch();
    }
    /*小图标*/
    public function icons(){
    	return $this->fetch();
    }
    /*Grid格子布局*/
    public function grid(){
    	return $this->fetch();
    }	
    /*ueditor*/
    public function ueditor(){
    	return $this->fetch();
    }
    /*ueditor*/
    public function tpueditor(){
    	    	dump($_GET);
    	return $this->fetch();
    }
    /*ueditor*/
    public function tpueditorAdmin(){
    	$data = new \ueditor\Ueditor();
		echo $data->output();
    }

    public function tinymce(){
    	return $this->fetch();
    }
    public function tinymce3(){
    	return $this->fetch();
    }

    public function syntaxhighlighter(){
    	return $this->fetch();
    }
    public function showsyntaxsighlighter(){
    	dump($_POST);
    	return $this->fetch();
    }
    public function prismjs(){
    	return $this->fetch();
    }
    public function codemirror(){
    	return $this->fetch();
    }    
    public function login(){
    	return $this->fetch();
    }
    /*瀑布流*/
    public function pbl(){
    	return $this->fetch();
    }
    /*瀑布流2*/
    public function pbl2(){
    	return $this->fetch();
    }       
    /*瀑布流2*/
    public function pbl3(){
    	return $this->fetch();
    }
    /*瀑布流2*/
    public function pbl4(){
    	return $this->fetch();
    }  
    /*瀑布流5*/
    public function pbl5(){
    	return $this->fetch();
    }
    /*瀑布流5*/
    public function getData(){
    	$page = intval($_GET['page']); //获取请求的页数
    	$start = $page*15;
    	$arr=array(
    		array(
    			'tittle'=>"tittle10",
    			'description'=>"description10",
    			'img'=>"10.jpg"
    		),
		);
    	//$query=mysql_query("select * from say order by id desc limit $start,15");
    	return json_encode($arr);
    }

    /*瀑布流6*/
    public function pbl6(){
        return $this->fetch();
    }

    public function formdata(){
     	return $this->fetch();
    } 

    public function bootstrap_fileinput(){
    	return $this->fetch();
    }
    public function jquery_upload(){
    	return $this->fetch();
    }
    /*文件上传*/          
    public function upload1(){
    	Loader::import('FileUpload', EXTEND_PATH);
    	$file=new \FileUpload();//
    	$file->set('allowtype',array('zip','pdf','doc','docx','png','jpeg','jpg','gif'));
    	//$file->set('path','/uploads');
    	//$file->set('maxsize',1000000);
    	//$file->set('israndname',true);//是否随机命名上传文件
    	//dump($file);
    	$res=$file->upload('file');
    	if(!$res){
    		$msg['code']=0;
    		$msg['msg']=$file->getErrorMsg();    		
    	}else{
    		$savePath="/uploads/";
    		$filename=$savePath.$file->getFileName();
    		$msg['code']=1;
    		$msg['msg']=$filename;
    	}
    	file_put_contents(APP_PATH.'/aaaaaaaaa.txt',json_encode($msg));
    	return json_encode($msg);
    }

    /*tinymce图片上传*/          
    public function tinymce_img_upload(){
    	//设置白名单
    	$accepted_origins = array("http://localhost", "http://192.168.1.1", "http://example.com","http://www.codedemogit.com");
		if (isset($_SERVER['HTTP_ORIGIN'])) {
		  // 验证来源是否在白名单内
		  if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) {
		    header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
		  } else {
		    header("HTTP/1.1 403 Origin Denied");
		    exit;
		  }
		}    
		/*
		  如果脚本需要接收cookie，在init中加入参数 images_upload_credentials : true
		  并加入下面两个被注释掉的header内容
		*/
		// header('Access-Control-Allow-Credentials: true');
		// header('P3P: CP="There is no P3P policy."');		

    	Loader::import('FileUpload', EXTEND_PATH);
    	$file=new \FileUpload();//
    	$file->set('allowtype',array('zip','pdf','doc','docx','png','jpeg','jpg','gif'));
    	//$file->set('path','/uploads');
    	//$file->set('maxsize',1000000);
    	//$file->set('israndname',true);//是否随机命名上传文件
    	//dump($file);
    	$res=$file->upload('file');
    	if(!$res){
			// 通知编辑器上传失败
			header("HTTP/1.1 500 Server Error");
			exit; 		
    	}else{
    		$savePath="/uploads/";
    		$filename=$savePath.$file->getFileName();
    		$msg['code']=1;
    		$msg['location']=$filename;
    	}
    	//tinymce只需返回{"location":"images\/1.jpg"}就ok了
    	file_put_contents(APP_PATH.'/aaaaaaaaa.txt',json_encode($msg));
    	return json_encode($msg);
    }


     public function upload2(){
			return json_encode($_FILES);
     }
    /*分片与断点续传*/ 
    public function upload(){
    	return $this->fetch();
    }
    /*执行分片与断点续传*/ 
    public function doUpload(){
    	dump($_POST);
		//$name=$_POST['username'];  
		$dir=$_POST['filename'];  
		$dir=ROOT_PATH."public".DS."uploads".DS.md5($dir);  
		file_exists($dir) or mkdir($dir,0777,true);  
		
		$path=$dir."/".$_POST['blobname'];  
		//dump($path);
		//dump($_FILES);
		$str='';
		if($_FILES["file"]['error']!=0){
		    switch ($_FILES["file"]['error']) {
		      case 4: $str .= "没有文件被上传"; break;
		      case 3: $str .= "文件只有部分被上传"; break;
		      case 2: $str .= "上传文件的大小超过了HTML表单中MAX_FILE_SIZE选项指定的值"; break;
		      case 1: $str .= "上传的文件超过了php.ini中upload_max_filesize选项限制的值"; break;
		      case -1: $str .= "未允许类型"; break;
		      case -2: $str .= "文件过大,上传的文件不能超过{$this->maxsize}个字节"; break;
		      case -3: $str .= "上传失败"; break;
		      case -4: $str .= "建立存放上传文件目录失败，请重新指定上传目录"; break;
		      case -5: $str .= "必须指定上传文件的路径"; break;
		      default: $str .= "未知错误";
		    }
		    echo $str;die;			
		}
		//print_r($_FILES["file"]);  
		move_uploaded_file($_FILES["file"]["tmp_name"],$path);  
		   
		if(isset($_POST['lastone'])){  
		    echo $_POST['lastone'];  
		    $count=$_POST['lastone'];  
		       
		    $fp   = fopen($_POST['filename'],"abw");  
		    for($i=0;$i<=$count;$i++){  
		        $handle = fopen($dir."/".$i,"rb");    
		        fwrite($fp,fread($handle,filesize($dir."/".$i)));    
		        fclose($handle);      
		    }  
		    fclose($fp);  
		}
    } 

    /*百度webuploader大文件分片上传插件*/ 
    public function webuploader(){
    	return $this->fetch();
    }
    /*百度webuploader大文件分片上传插件*/ 
    public function webuploaderimg(){
    	return $this->fetch();
    }
  	/**
   	 * 百度webuploader大文件分片上传插件后台
     * 上传文件函数，如过上传不成功打印$_FILES数组，查看error报错信息
     * 值：0; 没有错误发生，文件上传成功。
     * 值：1; 上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。
     * 值：2; 上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。
     * 值：3; 文件只有部分被上传。
     * 值：4; 没有文件被上传。
     * date:2018.4.18    from:zhix.net
     */
    public function uploadFile(){
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Content-type: text/html; charset=gbk32");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        $folder = input('folder');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            exit; // finish preflight CORS requests here
        }
        if ( !empty($_REQUEST[ 'debug' ]) ) {
            $random = rand(0, intval($_REQUEST[ 'debug' ]) );
            if ( $random === 0 ) {
                header("HTTP/1.0 500 Internal Server Error");
                exit;
            }
        }
        // header
        // ("HTTP/1.0 500 Internal Server Error");
        // exit;
        // 5 minutes execution time
        set_time_limit(5 * 60);
        // Uncomment this one to fake upload time
         usleep(5000);
        // Settings
        $targetDir = './uploads'.DIRECTORY_SEPARATOR.'file_material_tmp';            //存放分片临时目录
        if($folder){
            $uploadDir = './uploads'.DIRECTORY_SEPARATOR.'file_material'.DIRECTORY_SEPARATOR.$folder.DIRECTORY_SEPARATOR.date('Ymd');
        }else{
            $uploadDir = './uploads'.DIRECTORY_SEPARATOR.'file_material'.DIRECTORY_SEPARATOR.date('Ymd');    //分片合并存放目录
        }
 
        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds
 
        // Create target dir
        if (!file_exists($targetDir)) {
            mkdir($targetDir,0777,true);
        }
        // Create target dir
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir,0777,true);
        }
        // Get a file name
        if (isset($_REQUEST["name"])) {
            $fileName = $_REQUEST["name"];
        } elseif (!empty($_FILES)) {
            $fileName = $_FILES["file"]["name"];
        } else {
            $fileName = uniqid("file_");
        }
        $oldName = $fileName;
 
        $fileName = iconv('UTF-8','gb2312',$fileName);
        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
        // $uploadPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;
        
        // Chunking might be enabled 分片
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;
        // Remove old temp files
        if ($cleanupTargetDir) {
            if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory111."}, "id" : "id"}');
            }
            while (($file = readdir($dir)) !== false) {
                $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;
                // If temp file is current file proceed to the next
                if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
                    continue;
                }
                // Remove temp file if it is older than the max age and is not the current file
                if (preg_match('/\.(part|parttmp)$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge)) {
                    unlink($tmpfilePath);
                }
            }
            closedir($dir);
        }
        // Open temp file
        if (!$out = fopen("{$filePath}_{$chunk}.parttmp", "wb")) {
            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream222."}, "id" : "id"}');
        }
        if (!empty($_FILES)) {
            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file333."}, "id" : "id"}');
            }
            // Read binary input stream and append it to temp file
            if (!$in = fopen($_FILES["file"]["tmp_name"], "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream444."}, "id" : "id"}');
            }
        } else {
            if (!$in = fopen("php://input", "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream555."}, "id" : "id"}');
            }
        }
        while ($buff = fread($in, 4096)) {
            fwrite($out, $buff);
        }
        fclose($out);
        fclose($in);
        rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");
        $index = 0;
        $done = true;
        for( $index = 0; $index < $chunks; $index++ ) {
            if ( !file_exists("{$filePath}_{$index}.part") ) {
                $done = false;
                break;
            }
        }
 
        if ($done) {
            $pathInfo = pathinfo($fileName);
            $hashStr = substr(md5($pathInfo['basename']),8,16);
            $hashName = time() . $hashStr . '.' .$pathInfo['extension'];
            $uploadPath = $uploadDir . DIRECTORY_SEPARATOR .$hashName;
            if (!$out = fopen($uploadPath, "wb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream666."}, "id" : "id"}');
            }
            //flock($hander,LOCK_EX)文件锁
            if ( flock($out, LOCK_EX) ) {
                for( $index = 0; $index < $chunks; $index++ ) {
                    if (!$in = fopen("{$filePath}_{$index}.part", "rb")) {
                        break;
                    }
                    while ($buff = fread($in, 4096)) {
                        fwrite($out, $buff);
                    }
                    fclose($in);
                    unlink("{$filePath}_{$index}.part");
                }
                flock($out, LOCK_UN);
            }
            fclose($out);
            $response = [
                'success'=>true,
                'oldName'=>$oldName,
                'filePath'=>$uploadPath,
                //'fileSize'=>$data['size'],
                'fileSuffixes'=>$pathInfo['extension'],          //文件后缀名
                //'file_id'=>$data['id'],
            ];
            return json($response);
        }
 
        // Return Success JSON-RPC response
        die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
    }
    /* ie 低版本更新提示*/
    public function ieupdatetip(){
      return $this->fetch();                 	
   } 
   /*jsTree树控件(基于jQuery, 超强悍)*/
    public function jstree()
    {

        $arr=array(
            0 => array(
                'id' => 1,
                'parentid' => 0,
                'text' => '基本信息',
                'children' => array(
                    0 => array(
                        'id' => 10,
                        'parentid' => 1,
                        'text' => '系统',
                        'children' => array(
                            0 => array(
                                'id' => 11,
                                'parentid' => 10,
                                'text' => '清空缓存',
                            ) ,
                            1 => array(
                                'id' => 12,
                                'parentid' => 10,
                                'text' => '更新系统',
                            ) ,
                            2 => array(
                                'id' => 13,
                                'parentid' => 10,
                                'text' => '后台操作日志',
                            ) ,
                        ) ,
                    ) ,
                    1 => array(
                        'id' => 5,
                        'parentid' => 1,
                        'text' => '设置',
                        'children' => array(
                            0 => array(
                                'id' => 6,
                                'parentid' => 5,
                                'text' => '个人信息',
                                'children' => array(
                                    0 => array(
                                        'id' => 7,
                                        'parentid' => 6,
                                        'text' => '修改信息',
                                    ) ,
                                    1 => array(
                                        'id' => 8,
                                        'parentid' => 6,
                                        'text' => '修改密码',
                                    ) ,
                                ) ,
                            ) ,
                            1 => array(
                                'id' => 9,
                                'parentid' => 5,
                                'text' => '网站信息',
                            ) ,
                        ) ,
                    ) ,
                    2 => array(
                        'id' => 14,
                        'parentid' => 1,
                        'text' => '菜单管理',
                        'children' => array(
                            0 => array(
                                'id' => 15,
                                'parentid' => 14,
                                'text' => '后台菜单',
                            ) ,
                            1 => array(
                                'id' => 16,
                                'parentid' => 14,
                                'text' => '前台菜单',
                                'children' => array(
                                    0 => array(
                                        'id' => 17,
                                        'parentid' => 16,
                                        'text' => '前台菜单管理',
                                    ) ,
                                    1 => array(
                                        'id' => 18,
                                        'parentid' => 16,
                                        'text' => '菜单分类',
                                    ) ,
                                ) ,
                            ) ,
                        ) ,
                    ) ,
                ) ,
            ) ,
            1 => array(
                'id' => 2,
                'parentid' => 0,
                'text' => '用户中心',
                'children' => array(
                    0 => array(
                        'id' => 19,
                        'parentid' => 2,
                        'text' => '用户管理',
                        'children' => array(
                            0 => array(
                                'id' => 20,
                                'parentid' => 19,
                                'text' => '用户组',
                                'children' => array(
                                    0 => array(
                                        'id' => 21,
                                        'parentid' => 20,
                                        'text' => '本站用户',
                                    ) ,
                                ) ,
                            ) ,
                            1 => array(
                                'id' => 22,
                                'parentid' => 19,
                                'text' => '管理组',
                                'children' => array(
                                    0 => array(
                                        'id' => 23,
                                        'parentid' => 22,
                                        'text' => '管理员',
                                    ) ,
                                    1 => array(
                                        'id' => 24,
                                        'parentid' => 22,
                                        'text' => '角色管理',
                                    ) ,
                                ) ,
                            ) ,
                        ) ,
                    ) ,
                ) ,
            ) ,
            2 => array(
                'id' => 3,
                'parentid' => 0,
                'text' => '扩展管理',
                'children' => array(
                    0 => array(
                        'id' => 25,
                        'parentid' => 3,
                        'text' => '扩展工具',
                        'children' => array(
                            0 => array(
                                'id' => 26,
                                'parentid' => 25,
                                'text' => '插件管理',
                            ) ,
                        ) ,
                    ) ,
                ) ,
            ) ,
            3 => array(
                'id' => 4,
                'parentid' => 0,
                'text' => '插件模块',
                'children' => array(
                    0 => array(
                        'id' => 30,
                        'parentid' => 4,
                        'text' => '订单管理',
                        'children' => array(
                            0 => array(
                                'id' => 31,
                                'parentid' => 30,
                                'text' => '订单列表',
                            ) ,
                        ) ,
                    ) ,
                    1 => array(
                        'id' => 32,
                        'parentid' => 4,
                        'text' => '支付设置',
                        'children' => array(
                            0 => array(
                                'id' => 33,
                                'parentid' => 32,
                                'text' => '支付管理',
                            ) ,
                        ) ,
                    ) ,
                ) ,
            ) ,
            4 => array(
                'id' => 27,
                'parentid' => 0,
                'text' => '微信管理',
                'children' => array(
                    0 => array(
                        'id' => 28,
                        'parentid' => 27,
                        'text' => '微信公众号管理',
                        'children' => array(
                            0 => array(
                                'id' => 29,
                                'parentid' => 28,
                                'text' => '公众号管理',
                            ) ,
                        ) ,
                    ) ,
                    1 => array(
                        'id' => 34,
                        'parentid' => 27,
                        'text' => '公众号素材管理',
                        'children' => array(
                            0 => array(
                                'id' => 35,
                                'parentid' => 34,
                                'text' => '素材管理',
                            ) ,
                        ) ,
                    ) ,
                    2 => array(
                        'id' => 36,
                        'parentid' => 27,
                        'text' => '公众号自动回复',
                        'children' => array(
                            0 => array(
                                'id' => 37,
                                'parentid' => 36,
                                'text' => '关键词自动回复',
                            ) ,
                        ) ,
                    ) ,
                    3 => array(
                        'id' => 46,
                        'parentid' => 27,
                        'text' => '公众号群发消息',
                        'children' => array(
                            0 => array(
                                'id' => 47,
                                'parentid' => 46,
                                'text' => '群发消息',
                            ) ,
                        ) ,
                    ) ,
                    4 => array(
                        'id' => 38,
                        'parentid' => 27,
                        'text' => '自定义菜单',
                        'children' => array(
                            0 => array(
                                'id' => 39,
                                'parentid' => 38,
                                'text' => '公众号菜单',
                            ) ,
                        ) ,
                    ) ,
                    5 => array(
                        'id' => 40,
                        'parentid' => 27,
                        'text' => '公众号粉丝营销',
                        'children' => array(
                            0 => array(
                                'id' => 41,
                                'parentid' => 40,
                                'text' => '粉丝营销',
                            ) ,
                            1 => array(
                                'id' => 42,
                                'parentid' => 40,
                                'text' => '分组管理',
                            ) ,
                            2 => array(
                                'id' => 43,
                                'parentid' => 40,
                                'text' => '行为管理',
                            ) ,
                        ) ,
                    ) ,
                    6 => array(
                        'id' => 48,
                        'parentid' => 27,
                        'text' => '公众号二维码营销',
                        'children' => array(
                            0 => array(
                                'id' => 49,
                                'parentid' => 48,
                                'text' => '二维码营销',
                            ) ,
                        ) ,
                    ) ,
                    7 => array(
                        'id' => 44,
                        'parentid' => 27,
                        'text' => '公众号客服管理',
                        'children' => array(
                            0 => array(
                                'id' => 45,
                                'parentid' => 44,
                                'text' => '人工多客服',
                            ) ,
                        ) ,
                    ) ,
                ) ,
            ) ,
        ); 

        $this->assign('arr',$arr);                 
                    
        $a=request()->isAjax();
        dump($a);
        dump($_POST);
        return $this->fetch();
    }

    /*拖拽插件*/
    public function tdrag(){
        return $this->fetch();
    }
    public function gridster(){
        return $this->fetch();
    }
    public function dragula(){
        return $this->fetch();
    }
    public function sortable(){
        return $this->fetch();
    }

}
