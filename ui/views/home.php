<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Hill - Home page</title>


        <link rel="stylesheet" type="text/css" href="/ui/styles/main.css">
        <link rel="stylesheet" type="text/css" href="/ui/styles/navbar.css">
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
                <a href="">Profile</a>
            </nav>
        </header>

        <div class="products" style="margin-top: 25vh;">

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
            <?php $this->insert('contents::footer'); ?>
        </footer>

    </body>
</html>
