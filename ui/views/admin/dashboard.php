<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Administration - Hill</title>

        <link rel="stylesheet" type="text/css" href="/ui/styles/main.css">
        <link rel="stylesheet" type="text/css" href="/ui/styles/navbar.css">
        <link rel="stylesheet" type="text/css" href="/ui/styles/dashboard.css">
        <link rel="stylesheet" type="text/css" href="/ui/styles/cards.css">
    </head>
    <body>
        <header class="navbar">
            <div class="navbar_container">
                <h1>hill - Dashboard</h1>
            </div>
        </header>
        
        <div class="dashboard">
            <section class="dashboard__navigation">
                <span onclick="showSidebarContent('pages')">Pages</span>
                <span onclick="showSidebarContent('categories')">Categories</span>
                <span onclick="showSidebarContent('users')">Users</span>
                <span onclick="showSidebarContent('products')">Products</span>
                <span onclick="showSidebarContent('financial')">Financial</span>
                <span onclick="showSidebarContent('theme')">Theme</span>
            </section>

            <section class="dashboard__content">
                <main class="pages" id="content">
                    <h1>Pages</h1>

                    <div class="pages__section">

                    <?php if(isset($_SESSION["error"])) { ?>

                        <span class="card__error" style="margin-bottom: 15px;"><?= $this->e($_SESSION['error']) ?></span>

                    <?php } unset($_SESSION['error']); ?>

                    <?php foreach ($pages as $page) { ?>                      
                    
                        <div onclick="displayPageOptions(<?= $this->e($page['id'])?>)">
                            <span>/<?= $this->e($page["name"])?></span>

                            <main class="page_option" id="option-<?= $this->e($page['id'])?>">
                                <form class="page_option--update" method="POST" action="/page/update"> 
                                    <input type="hidden" value="<?= $this->e($page["id"])?>" name="id">
                                    <input type="text" name="name" value="<?= $this->e($page["name"])?>" placeholder="Page">
                                    <button type="submit">Update</button>
                                </form>
                            </main>
                        </div>

                    <?php } ?>
                
                </main>

                <main class="categories" id="content">
                    <h1>Categories</h1>
                </main>


                <main class="users" id="content">
                    <h1>Users</h1>
                </main>

                <main class="products" id="content">
                    <h1>Products</h1>
                </main>

                <main class="financial" id="content">
                    <h1>Financial</h1>
                </main>

                <main class="theme" id="content">
                    <h1>Theme</h1>
                </main>

            </section>
        </div>

        <script src="/ui/js/dashboard/events.js"></script>
    </body>
</html>
