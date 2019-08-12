<h2>Edit news</h2>
<p><a href="?page=manage_news">Back to news Management</a></p>
<form action="?page=manage_news&action=update&id=<?= $app->data[0]['id'] ?>" method="post">
    <div>
        <label>Title</label>
        <input type="text" name="title" value="<?= $app->data[0]['title'] ?>">
        <p><?= \app\core\Status::read('title') ?></p>
    </div>
    <div>
        <label for="">Content</label>
        <textarea name="content" id="" cols="30" rows="10"><?= $app->data[0]['content'] ?></textarea>
        <p><?= \app\core\Status::read('content') ?></p>
    </div>
    <button class="button" type="submit">Speichern</button>
</form>