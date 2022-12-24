<?php
session_start();

use Core\Helpers\Fake;
use Core\Router;

require_once 'vendor/autoload.php';

spl_autoload_register(function ($class_name) {
    if (strpos($class_name, 'Core') === false)
        return;
    $class_name = str_replace("\\", '/', $class_name); // \\ = \
    $file_path = __DIR__ . "/" . $class_name . ".php";
    require_once $file_path;
});

// This code will run only at the first time of using theapp.Fake::is_first_time();
// For public access

Router::get('/', 'authentication.login'); // Display home.php


// For web administrators

Router::get('/logout', "authentication.logout"); // Logs the user out   <a href="/logout">logout<a>
Router::post('/authenticate', "authentication.validate"); // Displays the login form

// athenticated
Router::get('/dashboard', "admin.index"); // Displays the admin dashboard

// athenticated + permissions [item:read]
Router::get('/items', "items.index"); // list of items (HTML)
Router::get('/item', "items.single"); // Displays single itemt (HTML)
// athenticated + permissions [item:create]
Router::get('/items/create', "items.create"); // Display the creation form (HTML)
Router::post('/items/store', "items.store"); // Creates the items (PHP)
// athenticated + permissions [item:read, item:create]
Router::get('/items/edit', "items.edit"); // Display the edit form (HTML)
Router::post('/items/update', "items.update"); // Updates the items (PHP)
// athenticated + permissions [item:read, item:detele]
Router::get('/items/delete', "items.delete"); // Delete the item (PHP)


// athenticated + permissions [transaction:read]
Router::get('/transactions', "transactions.index"); // list of transactions (HTML)
Router::get('/transaction', "transactions.single"); // Displays single transaction (HTML)
// athenticated + permissions [transaction:create]
Router::get('/transactions/create', "transactions.create"); // Display the creation form (HTML)
Router::post('/transactions/store', "transactions.store"); // Creates the transactions (PHP)
// athenticated + permissions [transaction:read, transaction:create]
Router::get('/transactions/edit', "transactions.edit"); // Display the edit form (HTML)
Router::post('/transactions/update', "transactions.update"); // Updates the transactions (PHP)
// athenticated + permissions [transaction:read, transaction:detele]
Router::get('/transactions/delete', "transactions.delete"); // Delete the transaction (PHP)


// athenticated + permissions [post:read]
Router::get('/tags', "tags.index"); // list of tags (HTML)
Router::get('/tag', "tags.single"); // Displays single tag (HTML)
// athenticated + permissions [tag:create]
Router::get('/tags/create', "tags.create"); // Display the creation form (HTML)
Router::post('/tags/store', "tags.store"); // Creates the tags (PHP)
// athenticated + permissions [tag:read, tag:create]
Router::get('/tags/edit', "tags.edit"); // Display the edit form (HTML)
Router::post('/tags/update', "tags.update"); // Updates the tags (PHP)
// athenticated + permissions [tag:read, tag:detele]
Router::get('/tags/delete', "tags.delete"); // Delete the tag (PHP)

// athenticated + permissions [user:read]
Router::get('/users', "users.index"); // list of users (HTML)
Router::get('/user', "users.single"); // Displays single item (HTML)
// athenticated + permissions [user:create]
Router::get('/users/create', "users.create"); // Display the creation form (HTML)
Router::post('/users/store', "users.store"); // Creates the users (PHP)
// athenticated + permissions [user:read, user:create]
Router::get('/users/edit', "users.edit"); // Display the edit form (HTML)
Router::post('/users/update', "users.update"); // Updates the users (PHP)
// athenticated + permissions [user:read, user:delete]
Router::get('/users/delete', "users.delete"); // Delete the post (PHP)



Router::redirect();
