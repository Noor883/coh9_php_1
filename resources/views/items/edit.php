<h1>Edit Post</h1>

<form action="/items/update" method="POST" class="w-50">
    <input type="hidden" name="id" value="<?= $data->item->id ?>">
    <div class="mb-3">
        <label for="item-title" class="form-label">Item_Name</label>
        <input type="text" class="form-control" id="item-title" name="title" value="<?= $data->item->item_name ?>">
    </div>
    <div class="mb-3">
        <label for="item-title" class="form-label">Item_Cost</label>
        <input type="text" class="form-control" id="item-title" name="title" value="<?= $data->item->item_cost ?>">
    </div>

    <div class="form-floating">
        <textarea class="form-control" placeholder="Your item content.." id="item-content" style="height: 100px" name="content"><?= $data->item->content ?></textarea>
        <label for="item-content">Item Content</label>
    </div>


    <div class="my-3">
        <label for="item-tags">Tags</label>
        <select class="form-select" multiple aria-label="multiple select example" name="tags[]">
            <?php foreach ($data->item->tags as $tag) : ?>
                <option value="<?= $tag->id ?>"><?= $tag->name ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-warning mt-4">Update</button>
</form>