<header class="navbar">
    <hgroup>
    <a href="/">
        <h1>Hill</h1>
        <h2 id="header-subtitle"></h2>
    </a>
    </hgroup>

    <nav class="navbar_links">
        <ul>
            <li><a href="/about">Sobre</a></li>
            <li><a href="/contact">Contato</a></li>
            <li><a href="/services">Serviços</a></li>
        </ul> 
    </nav>

    <nav class="navbar_search-form">
        <form method="POST" action="/product/search">

            @csrf

            <input type="text" placeholder="Search" name="search" id="searchField"/>

            <button type="submit">
                <img src="{{ asset('/icons/search.svg') }}" alt="Search"/>
            </button>
        </form>

        <div class="results" id="results-box">

        <!--
            <article id="containerFromProductSearch">
                <a href="" id="product-link">
                    <h1 id="titleFromProductSearch"></h1>
                    <span id="priceFromProductSearch"></span>
                </a>
            </article> 

        -->

        </div>

    </nav>
</header>

<script src="{{ asset('/js/header-typewriter.js') }}"></script>
<script src="{{ asset('/js/debounce.js') }}"></script>
