<?php include dirname(__DIR__) . '/Layout/header.php'; ?>
<?php include dirname(__DIR__) . '/Layout/nav.php'; ?>
<main>
    <?php if (isset($validationErrors)): ?>
        <section>
            <?php foreach ($validationErrors as $error): ?>
                <p><?=$error ?></p>
            <?php endforeach; ?>
        </section>
    <?php endif; ?>
    <section>
        <header>
            <h2>Add Book</h2>
        </header>
        <form action="<?= \App\Config::BASE_URL ?>/books/create" method="POST" novalidate>
            <div>
                <label for="txtTitle">Title</label>
                <input type="text" name="title" id="txtTitle">            
            </div>
            <div>
                <label for="cmbAuthors">Author</label>
                <select name="author" id="cmbAuthors">
                    <?php foreach ($authors as $author): ?> 
                        <option value="<?=htmlspecialchars($author["author_id"]) ?>">
                            <?=htmlspecialchars($author['first_name'] . ' ' . $author['last_name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="cmbPublish  er">Publisher</label>
                <select name="publisher" id="cmbPublisher">
                    <?php foreach ($publishers as $publisher): ?>
                        <option value="<?=htmlspecialchars($publisher['publisher_id']) ?>">
                            <?=htmlspecialchars($publisher['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="txtPublishingYear">Publishing Year</label>
                <input type="number" name="publishing_year" id="txtPublishingYear" pattern="\d{4}">
            </div>
            <div>
                <button type="submit">Add Book</button>
            </div>
        </form>
    </section>
</main>

<?php include dirname(__DIR__) . '/Layout/footer.php'; ?>
