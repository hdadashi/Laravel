<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administration - Hill</title>

        <link rel="stylesheet" type="text/css" href="/ui/styles/main.css">
        <link rel="stylesheet" type="text/css" href="/ui/styles/navbar.css">
        <link rel="stylesheet" type="text/css" href="/ui/styles/signin.css">
        <link rel="stylesheet" type="text/css" href="/ui/styles/footer.css">
        <link rel="stylesheet" type="text/css" href="/ui/styles/cards.css">

</head>
<body>

    <header class="navbar">
        <div class="navbar_container">
            <h1>hill</h1>
        </div>
    </header>


    <div class="signin">
        <h1>Login to your admin account here</h1>

        <div class="signin_container">
            <form method="POST" action="/admin/login">
                <input type="text" name="email" placeholder="Email" />
                <input type="password" name="password" placeholder="Password" />
                <button type="submit">Login</button>
            </form>
        </div>

        <?php if(isset($_SESSION["error"])) { ?>
                
            <span class="card__error"><?= $this->e($_SESSION['error']) ?></span>
            
        <?php } unset($_SESSION['error']); ?>


    </div>


    <footer style="padding-bottom: 50vh;">
        <main>
            <nav>
                <h1>about</h1>

                <ul>
                    <li><a href="">label1<a></li>
                    <li><a href="">label2<a></li>
                    <li><a href="">label3<a></li>
                </ul>
            </nav>

            <nav>
                <h1>services</h1>

                <ul>
                    <li><a href="">label1<a></li>
                    <li><a href="">label2<a></li>
                    <li><a href="">label3<a></li>
                </ul>
            </nav>

            <nav>
                <h1>contact</h1>

                <ul>
                    <li><a href="">label1<a></li>
                    <li><a href="">label2<a></li>
                    <li><a href="">label3<a></li>
                </ul>
            </nav>
        </main> 
    </footer>
</body>
</html>
