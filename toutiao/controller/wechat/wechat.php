<?php
include '../core/db.php';
function https_request($url,$data=""){
  // 开启curl
  $ch=curl_init();
  // 设置传输选项
  // 设置传输地址
  curl_setopt($ch, CURLOPT_URL, $url);
  // 以文件流的形式返回
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  /**/
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //不验证证书下同
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);


  if ($data) {
    // 以post方式
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  }

  $headers = array("Content-type: application/json;charset=UTF-8","Accept: application/json","Cache-Control: no-cache", "Pragma: no-cache");

  curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );

  // 发送curl
  $request=curl_exec($ch);
  $tmpArr=json_decode($request,TRUE);
  if (is_array($tmpArr)) {
    return $tmpArr;
  }else{
    return $request;
  }
  // 关闭资源
  curl_close($ch);
}

class wechat extends db
{
  //
  public function user_feed(){
    $openid = $_GET['openid'];
    $page = (int)$_GET['page'];
    $sql = 'select * from feed where openid = "'.$openid.'" order by ctime desc limit 10 offset '.($page - 1) * 10;
    $user_feed = $this->pdo->query($sql)->fetchAll();
    echo json_encode($user_feed);
  }
  // 数据资源
  // 从数据库取到所有用户的动态
  public function feed()
  {
    $page = (int)$_GET['page'];
    $sql = 'select * from feed order by ctime desc limit 2 offset ' . ($page - 1) * 2;
    $feeds = $this->pdo->query($sql)->fetchAll();
    echo json_encode($feeds);
  }


  //行为资源 插入数据库
  public function insert()
  {
    $url = 'https://api.weixin.qq.com/sns/jscode2session?appid=wx2904afca9b01d5c1&secret=3198cda695a602facd12db30cea88db7&js_code='.$_GET['code'].'&grant_type=authorization_code';

    $result = https_request($url);

    $openid = $result['openid'];

    $sql = 'insert into feed (openid,user_name,user_avatar,content,publish_address,img_urls) values(?,?,?,?,?,?)';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(1, $openid);
    $stmt->bindValue(2, $_GET['user_name']);
    $stmt->bindValue(3, $_GET['user_avatar']);
    $stmt->bindValue(4, $_GET['content']);
    $stmt->bindValue(5, '学府街');
    $stmt->bindValue(6, $_GET['img_urls']);
    $stmt->execute();
    echo $openid;
  }
  // 行为资源 ： 给我图片 我帮你存下 返回图片的资源名
  public function upload()
  {
    $src = $_FILES['f']['tmp_name'];
    $file_name = $_FILES['f']['name'];
    $dist = './assets/wechat/' . $file_name;
    move_uploaded_file($src, $dist);
    echo 'http://ysysljjmtdsxxx.applinzi.com/assets/wechat/' . $file_name;
  }

}