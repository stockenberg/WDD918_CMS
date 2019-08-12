<?php


namespace app\controller;


use app\App;
use app\core\Status;
use app\model\News;
use app\model\transfer\NewsTransfer;

class NewsController
{

    public function init()
    {
        $model = new News();

        switch($_GET['action'] ?? ''){
            case 'create':
                if($this->isValid($_POST)){
                    $newsTransfer = new NewsTransfer();
                    $newsTransfer->setTitle($_POST['title']);
                    $newsTransfer->setContent($_POST['content']);

                    if($model->save($newsTransfer)){
                        App::redirect('manage_news');
                    }
                }
                break;

            case 'update':
                if($this->isValid($_POST)){
                    $newsTransfer = new NewsTransfer();
                    $newsTransfer->setTitle($_POST['title']);
                    $newsTransfer->setContent($_POST['content']);

                    if($model->update($newsTransfer)){
                        App::redirect('manage_news');
                    }
                }
                break;

            case 'delete':
                if($model->delete((int) $_GET['id'])){
                    App::redirect('manage_news');
                }
                break;

            case 'edit':
                return $model->getNewsById((int) $_GET['id']);
                break;

            default:
                return $model->getNews();
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