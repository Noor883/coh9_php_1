<h1>Edit Post</h1>

<form action="/transactions/update" method="POST" class="w-50">
    <input type="hidden" name="id" value="<?= $data->transaction->id ?>">
    <div class="mb-3">
        <label for="transaction-title" class="form-label">Transaction Title</label>
        <input type="text" class="form-control" id="transaction-title" name="title" value="<?= $data->transaction->title ?>">
    </div>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Your transaction content.." id="transaction-content" style="height: 100px" name="content"><?= $data->transaction->content ?></textarea>
        <label for="transaction-content">Transaction Content</label>
    </div>
    <div class="my-3">
        <label for="transaction-tags">Tags</label>
        <select class="form-select" multiple aria-label="multiple select example" name="tags[]">
            <?php foreach ($data->transaction->tags as $tag) : ?>
                <option value="<?= $tag->id ?>"><?= $tag->name ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-warning mt-4">Update</button>
</form>