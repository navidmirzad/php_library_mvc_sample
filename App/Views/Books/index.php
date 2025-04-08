<?php include dirname(__DIR__) . '/Layout/header.php'; ?>
<?php include dirname(__DIR__) . '/Layout/nav.php'; ?>
    <main>
        <h3>Books in KEA's Library</h3>
    </main>

    <ul>
        <?php foreach($books as $book): ?>
            <p><?= $book ?></p>
        <?php endforeach; ?>
    </ul>

    
<?php include dirname(__DIR__) . '/Layout/footer.php'; ?>