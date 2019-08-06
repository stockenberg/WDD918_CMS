<h2>Manage news</h2>

<form action="?page=manage_news&action=create" method="post">
    <div>
        <label>Title</label>
        <input type="text" name="title">
        <p><?= \app\core\Status::read('title') ?></p>
    </div>
    <div>
        <label for="">Content</label>
        <textarea name="content" id="" cols="30" rows="10"></textarea>
        <p><?= \app\core\Status::read('content') ?></p>
    </div>
    <button class="button" type="submit">Speichern</button>
</form>