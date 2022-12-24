<h1>Create Transactions </h1>

<form action="/transactions/store" method="POST" class="w-50">
    <div class="mb-3">
        <label for="transaction-title" class="form-label">Transaction Title</label>
        <input type="text" class="form-control" id="transaction-title" name="title">
    </div>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Your transaction content.." id="transaction-content" style="height: 100px" name="content"></textarea>
        <label for="transaction-content">Transaction Content</label>
    </div>
    <button type="submit" class="btn btn-success mt-4">Create</button>
</form>