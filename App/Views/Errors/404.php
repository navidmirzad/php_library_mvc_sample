<?php include dirname(__DIR__) . '/Layout/header.php'; ?>
<?php include dirname(__DIR__) . '/Layout/nav.php'; ?>
    <main>
        <h3>Page not found</h3>
    </main>
    <?= $errorInfo ?? '' ?>
<?php include dirname(__DIR__) . '/Layout/footer.php'; ?>