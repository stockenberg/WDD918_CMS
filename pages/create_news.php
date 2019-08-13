<h2>Manage news</h2>
<p><a href="?page=manage_news">Back to news Management</a></p>
<form action="?page=create_news&action=create" enctype="multipart/form-data" method="post">
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
    <div>
        <label for="upload">Upload Files</label>
        <input type="file" name="image" id="upload">
    </div>
    <button class="button" type="submit">Speichern</button>
</form>