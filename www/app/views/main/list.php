<h1>List View</h1>
<?php foreach ($rows as $row): ?>
    <div class="db_row">
        <div class="row_header">
            <div>
                <?=$row['title']?>
            </div>
            <div>
                <?=$row['create_at']?>
            </div>

        </div>
        <div class="row_description">
            <?=$row['description']?>
        </div>
        <div class="row_body">
            <?=$row['body']?>
        </div>
        <div class="row_footer">
            <?= "Author: ".$row->getAuthor(); ?>
        </div>

    </div>
<?php endforeach ?>
