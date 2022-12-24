<?php

use Core\Helpers\Helper;
?>
<div class="mt-5 d-flex flex-row-reverse gap-3">
    <?php if (Helper::check_permission(['transaction:read', 'transaction:update'])) : ?>
        <a href="/transactions/edit?id=<?= $data->transaction->id ?>" class="btn btn-warning">Edit</a>
    <?php endif;
    if (Helper::check_permission(['transaction:read', 'transaction:delete'])) :
    ?>
        <a href="/transactions/delete?id=<?= $data->transaction->id ?>" class="btn btn-danger">Delete</a>
    <?php endif; ?>
</div>

<div class="my-5">
    <!-- for admins -->
    <h1 class="text-center">
        <?= $data->transaction->title ?>
    </h1>

    <p>
        <?= $data->transaction->content ?>
    </p>
    <p>
        <?= $data->transaction->quantity ?>
    </p>
</div>