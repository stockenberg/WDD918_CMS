<?php


namespace app\controller;


use app\core\Status;
use app\model\News;
use app\model\transfer\NewsTransfer;

class NewsController
{

    public function init()
    {
        switch($_GET['action'] ?? ''){
            case 'create':
                if($this->isValid($_POST)){
                    $newsTransfer = new NewsTransfer();
                    $newsTransfer->setTitle($_POST['title']);
                    $newsTransfer->setContent($_POST['content']);

                    $model = new News();
                    if($model->save($newsTransfer)){
                        Status::write('status', 'Success, news saved!');
                    }
                }
                break;
        }
    }

    private function buildConstants($post)
    {
        foreach ($post as $key => $val) {
            define(strtoupper($key), $val);
        }
    }

    /**
     * @param array $post
     * @return bool
     */
    public function isValid(Array $post = []) : bool
    {
        if (!empty($post)) {
            $this->buildConstants($post);

            if (empty(TITLE)) {
                Status::write('title', 'Bitte gib einen Titel für die Nachricht an');
            }
            if (empty(CONTENT)) {
                Status::write('content', 'Bitte gib deinen Inhalt für die Nachricht an');
            }

            if(Status::isEmpty()){
                return true;
            }
            return false;
        }
    }

}