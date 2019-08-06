<?php


namespace app\model;


use app\core\Database;
use app\model\transfer\NewsTransfer;

class News
{

    use Database;

    public function save(NewsTransfer $newsTransfer)
    {
        $db = $this->connect();
        $SQL = 'INSERT INTO news (title, content) VALUES (:title, :content)';
        $stmt = $db->prepare($SQL);
        return $stmt->execute([
            ':title' => $newsTransfer->getTitle(),
            ':content' => $newsTransfer->getContent(),
        ]);
    }

}