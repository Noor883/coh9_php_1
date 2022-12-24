<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;
use Core\Helpers\Helper;
use Core\Model\Item;
use Core\Model\Tag;

class Items extends Controller
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
     * Gets all items
     *
     * @return array
     */
    public function index()
    {
         $this->permissions(['item:read']);
        $this->view = 'item.index';
        $item = new Items; // new model item.
        $this->data['item'] = $item->get_all();
        $this->data['items_count'] = count($item->get_all());
    }

    public function single()
    {
        $this->permissions(['item:read']);
        $this->view = 'items.single';
        $item = new Item();
        $this->data['item'] = $item->get_by_id($_GET['id']);
    }

    /**
     * Display the HTML form for item creation
     *
     * @return void
     */
    public function create()
    {
      $this->permissions(['item:create']);
        $this->view = 'items.create';
    }

    /**
     * Creates new item
     *
     * @return void
     */
    public function store()
    {
        $this->permissions(['item:create']);
        $item = new Item();
        $_POST['user_id'] = $_SESSION['user']['user_id']; // this is the id of the current logged in user. Because the item creator would be the same logged in user.
        $item->create($_POST);
        Helper::redirect('/items');
    }

    /**
     * Display the HTML form for item update
     *
     * @return void
     */
    public function edit()
    {
       $this->permissions(['item:read', 'item:update']);
        $this->view = 'items.edit';
        $item = new Item();
        //$tag = new Tag();
        $selected_item = $item->get_by_id($_GET['id']);
        $selected_item->tags = $tag->get_all();
        $this->data['item'] = $selected_item;
    }

    /**
     * Updates the item
     *
     * @return void
     */
    public function update()
    {
        $this->permissions(['item:read', 'item:update']);
        $item = new Item();

        // Handle items_tags relations
        $item_id = $_POST['id'];
        $related_tags = $_POST['tags'] ?? null;
        if (!empty($related_tags)) {
            foreach ($related_tags as $tag_id) {
                $sql = "INSERT INTO items_tags (item_id, tag_id) VALUES ($item_id, $tag_id)";
                $item->connection->query($sql);
            }
        }
        unset($_POST['tags']);

        $item->update($_POST);
        Helper::redirect('/item?id=' . $_POST['id']);
    }

    /**
     * Delete the item
     *
     * @return void
     */
    public function delete()
    {
        $this->permissions(['item:read', 'item:delete']);
        $item = new Item();
        $item->delete($_GET['id']);
        Helper::redirect('/items');
    }
}
