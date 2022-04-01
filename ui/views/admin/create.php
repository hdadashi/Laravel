<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Administration - Hill</title>

        <link rel="stylesheet" type="text/css" href="/ui/styles/main.css">
        <link rel="stylesheet" type="text/css" href="/ui/styles/navbar.css">
        <link rel="stylesheet" type="text/css" href="/ui/styles/signup.css">
        <link rel="stylesheet" type="text/css" href="/ui/styles/footer.css">
        <link rel="stylesheet" type="text/css" href="/ui/styles/cards.css">

    </head>
    <body>

        <header class="navbar">
            <div class="navbar_container">
                <h1>hill</h1> 
            </div>

            <nav class="navbar__items">
                <a href="">Latest</a>
                <a href="">Categories</a>
                <a href="">Privacy Policy</a>
            </nav>
        </header>

        <div class="signup">
            <form method="POST" action="/admin/create">
                <h1>Create your admin account.</h1> 
                <input type="text" name="name" placeholder="Name" />
                <input type="text" name="email" placeholder="Email" />
                <input type="password" name="password" placeholder="Password" />
                <input type="password" name="passwordConfirm" placeholder="Confirm the password" />
                <button type="submit">Create admin</button>

                <?php if(isset($_SESSION["error"])) { ?>

                    <span class="card__error" style="margin-top: 20px;"><?= $this->e($_SESSION['error']) ?></span>

                <?php } unset($_SESSION['error']); ?>

            </form>
        </div>

        <footer>
            <?php $this->insert('contents::footer'); ?>
        </footer>
    </body>
</html>
