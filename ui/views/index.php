<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>My Store - Hill</title>

        <link rel="stylesheet" type="text/css" href="/ui/styles/main.css">
        <link rel="stylesheet" type="text/css" href="/ui/styles/navbar.css">
        <link rel="stylesheet" type="text/css" href="/ui/styles/signin.css">
        <link rel="stylesheet" type="text/css" href="/ui/styles/products.css">
        <link rel="stylesheet" type="text/css" href="/ui/styles/footer.css">
    </head>
    <body>

        <header class="navbar">
            <div class="navbar_container">
                <h1>hill</h1>

                <form class="navbar_container__form" method="POST">
                    <div class="form_container">
                        <input type="text" placeholder="Search"/>
                        <button>
                            <img src="/ui/images/search.svg">
                        </button>
                    </div>
                </form>
            </div>

            <nav class="navbar__items">
                <a href="">Latest</a>
                <a href="">Categories</a>
                <a href="">Privacy Policy</a>
                <a href="/register">Sign Up</a>
            </nav>
        </header>

        <div class="signin">
            <h1>Login to your account here</h1>
            <div class="signin_container">
                <form method="POST" action="/user/login">
                    <input type="text" name="email" placeholder="Email" />
                    <input type="password" name="password" placeholder="Password" />
                    <button type="submit">Sign In</button>
                </form>
            </div>

            <?php
                if(isset($_SESSION["error"])) {
            ?>
                <span class="signin__error"><?= $this->e($_SESSION['error']) ?></span>
            <?php
            
            }
           
            session_unset();

            ?>

        </div>

        <div class="products">

            <nav class="products_section__navigation">
                <h1>Most recent</h1>
                <a href="">View more</a>
            </nav>

            <section class="products_section">
                <main></main>
                <main></main>
                <main></main>
                <main></main>
                <main></main>
            </section>

            <nav class="products_section__navigation">
                <h1>You might be interested</h1>
                <a href="">View more</a>
            </nav>

            <section class="products_section">
                <main></main>
                <main></main>
                <main></main>
                <main></main>
                <main></main>
            </section>

            <nav class="products_section__navigation">
                <h1>Most Wanted</h1>
                <a href="">View more</a>
            </nav>

            <section class="products_section">
                <main></main>
                <main></main>
                <main></main>
                <main></main>
                <main></main>
            </section>
        </div>

        <footer>
            <main>
                <nav>
                    <h1>About</h1>
                    <ul>
                        <li><a href="">Label1<a></li>
                        <li><a href="">Label2<a></li>
                        <li><a href="">Label3<a></li>
                    </ul>
                </nav>

                <nav>
                    <h1>Services</h1>
                    <ul>
                        <li><a href="">Label1<a></li>
                        <li><a href="">Label2<a></li>
                        <li><a href="">Label3<a></li>
                    </ul>
                </nav>

                <nav>
                    <h1>Contact</h1>
                    <ul>
                        <li><a href="">Label1<a></li>
                        <li><a href="">Label2<a></li>
                        <li><a href="">Label3<a></li>
                    </ul>
                </nav>
            </main> 
        </footer>
    </body>
</html>
