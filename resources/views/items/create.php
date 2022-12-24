<h1>Create Item</h1>

<form action="/items/store" method="POST" class="w-50">
    <div class="mb-3">
        <label for="item-title" class="form-label">Item_name</label>
        <input type="text" class="form-control" id="item-title" name="Item_name">
    </div>
    <div class="mb-3">
        <label for="item-qty" class="form-label">Item_avilable qty</label>
        <input type="text" class="form-control" id="item-qty" name="content">
    </div>
   <!-- <div class="mb-3">
        <label for="item-cost" class="form-label">Item_cost</label>
        <input type="text" class="form-control" id="item-cost" name="item_cost">
    </div>-->

    <div class="form-floating">
        <textarea class="form-control" placeholder="Your item content.." id="item-content" style="height: 100px" name="content"></textarea>
        <label for="item-content">Item Content</label>
    </div>
  
    <button type="submit" class="btn btn-success mt-4">Create</button>
</form>