<?php
include '../core/db.php';
class wechat extends db{
    public function feed(){
        $sql = 'select * from feed';
        $feeds = $this->pdo->query($sql)->fetchAll();
        echo json_encode($feeds);
    }
    public function insert(){
        $sql = 'insert into feed(user_name,user_avatar,content,publish_time,publist_address,img_urls) VALUES (?,?,?,?,?,?)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1,$_GET['user_name']);
        $stmt->bindValue(2,$_GET['user_avatar']);
        $stmt->bindValue(3,$_GET['content']);
        $stmt->bindValue(4,'2018.09.11');
        $stmt->bindValue(5,'平阳路学府街');
        $stmt->bindValue(6,'2');
        echo $stmt ->execute();
    }


}