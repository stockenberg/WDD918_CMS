<h2>All News</h2>
<p>Create a news Entry <a href="?page=create_news" class="button">Here</a></p>
<hr>
<ul>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Erstellt am</th>
            <th>Manage</th>
        </tr>
        </thead>
        <tbody>
        <?php
        /**
         * @var $news \app\model\transfer\NewsTransfer
         */
        foreach ($app->data as $index => $news) : ?>
            <tr>
                <td><?= $news['id'] ?></td>
                <td><?= $news['title'] ?></td>
                <td><?= $news['content'] ?></td>
                <td><?= $news['created_at'] ?></td>
                <td><a href="?page=manage_news&action=delete&id=<?= $news['id'] ?>" class="button alert">Delete</a>
                    <a href="?page=edit_news&action=edit&id=<?= $news['id'] ?>" class="button warning">Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</ul>