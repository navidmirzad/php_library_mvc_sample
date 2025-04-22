<?php include dirname(__DIR__) . '/Layout/header.php'; ?>
<?php include dirname(__DIR__) . '/Layout/nav.php'; ?>
<main>
    <section>
        <header>
            <h2>Book list</h2>
        </header>
        <?php if (isset($_SESSION['message'])): ?>
            <section class="message">
                <p><?=$_SESSION['message'] ?></p>
                <?php unset($_SESSION['message']); ?>
            </section>
        <?php endif; ?>
    </section>

    <button>
        <a href="books/new">Add new Book</a>
    </button>

    <?php foreach ($books as $book): ?>
    <article class="card">
        <header>
            <h3><?= htmlspecialchars($book['title']) ?></h3>
            <h4><?= htmlspecialchars($book['author_first_name'] . ' ' . $book['author_last_name']) ?></h4>
        </header>
        <p><?= htmlspecialchars($book['publisher'] . ', ' . $book['publishing_year']) ?></p>
    </article>
    <?php endforeach; ?>
</main>

<?php include dirname(__DIR__) . '/Layout/footer.php'; ?>
