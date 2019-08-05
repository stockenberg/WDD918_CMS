<div class="grid-x grid-margin-x">
    <aside class="cell large-4">
        <div class="card">
            <div class="card-divider">
                User
            </div>
            <img src="https://loremflickr.com/cache/resized/7890_47168836642_83843e88b5_320_240_nofilter.jpg">
            <div class="card-section">
                <?php if(!\app\App::isLoggedIn()) : ?>
                    <h4>Login</h4>
                    <a href="?page=login">Login</a>
                <?php else : ?>
                    <h4>Hello <?= $_SESSION['auth']['username'] ?></h4>
                <?php endif; ?>
            </div>
        </div>
    </aside>
    <div class="cell large-8">Content</div>
</div>