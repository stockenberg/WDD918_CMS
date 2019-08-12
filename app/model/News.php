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

    public function update(NewsTransfer $newsTransfer)
    {
        $db = $this->connect();
        $SQL = 'UPDATE news SET title = :title, content = :content WHERE id = :id';
        $stmt = $db->prepare($SQL);
        return $stmt->execute([
            ':title' => $newsTransfer->getTitle(),
            ':content' => $newsTransfer->getContent(),
            ':id' => $_GET['id']
        ]);
    }

    public function delete(Int $id)
    {
        $db = $this->connect();
        $SQL = 'DELETE FROM news WHERE id = :id';
        $stmt = $db->prepare($SQL);
        return $stmt->execute([
            ':id' => $id,
        ]);
    }

    public function getNews()
    {
        $db = $this->connect();
        $SQL = 'SELECT * FROM news';
        $stmt = $db->prepare($SQL);
        $stmt->execute();
        $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $res;
    }

    public function getNewsById(Int $id)
    {
        $db = $this->connect();
        $SQL = 'SELECT * FROM news WHERE id = :id';
        $stmt = $db->prepare($SQL);
        $stmt->execute([
            ':id' => $id,
        ]);
        $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $res;
    }
}