<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;
use Core\Helpers\Helper;
use Core\Model\Transaction;
use Core\Model\Tag;

class Transactions extends Controller
{

    public function render()
    {
        if (!empty($this->view))
            $this->view();
    }

    function __construct()
    {
        $this->auth();
        $this->admin_view(true);
    }

    /**
     * Gets all transactions
     *
     * @return array
     */
    public function index()
    {
       /*  $this->permissions(['transaction:read']); */
        $this->view = 'transaction.index';
        $transaction = new transactions; // new model transaction.
        $this->data['transaction'] = $transaction->get_all();
        $this->data['transactions_count'] = count($transaction->get_all());
    }

    public function single()
    {
      //  $this->permissions(['transaction:read']);
        $this->view = 'transactions.single';
        $transaction = new Transaction();
        $this->data['transaction'] = $transaction->get_by_id($_GET['id']);
    }

    /**
     * Display the HTML form for transaction creation
     *
     * @return void
     */
    public function create()
    {
       // $this->permissions(['post:create']);
        $this->view = 'transactions.create';
    }

    /**
     * Creates new transaction
     *
     * @return void
     */
    public function store()
    {
        //$this->permissions(['post:create']);
        $transaction = new Transaction();
        $_POST['user_id'] = $_SESSION['user']['user_id']; // this is the id of the current logged in user. Because the transaction creator would be the same logged in user.
        $transaction->create($_POST);
        Helper::redirect('/transactions');
    }

    /**
     * Display the HTML form for transaction update
     *
     * @return void
     */
    public function edit()
    {
        //$this->permissions(['post:read', 'post:update']);
        $this->view = 'transactions.edit';
        $transaction = new Transaction ();
        $tag = new Tag();
        $selected_transaction= $transaction->get_by_id($_GET['id']);
        $selected_transaction->tags = $tag->get_all();
        $this->data['transaction'] = $selected_transaction;
    }

    /**
     * Updates the transaction
     *
     * @return void
     */
    public function update()
    {
       // $this->permissions(['post:read', 'post:update']);
        $transaction = new Transaction();

        // Handle transactions_tags relations
        $transaction_id = $_POST['id'];
        $related_tags = $_POST['tags'] ?? null;
        if (!empty($related_tags)) {
            foreach ($related_tags as $tag_id) {
                $sql = "INSERT INTO transactions_tags (transaction_id, tag_id) VALUES ($transaction_id, $tag_id)";
                $transaction->connection->query($sql);
            }
        }
        unset($_POST['tags']);

        $transaction->update($_POST);
        Helper::redirect('/transaction?id=' . $_POST['id']);
    }

    /**
     * Delete the transaction
     *
     * @return void
     */
    public function delete()
    {
        $this->permissions(['post:read', 'post:delete']);
        $transaction = new Transaction();
        $transaction->delete($_GET['id']);
        Helper::redirect('/transactions');
    }
}
