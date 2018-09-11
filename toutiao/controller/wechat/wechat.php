<?php
include '../core/db.php';

class wechat extends db
{
    public function feed()
    {
        $sql = 'select * from feed';
        $feeds = $this->pdo->query($sql)->fetchAll();
        echo json_encode($feeds);
    }
}