<header class="navbar">
    <hgroup>

        <h1>Hill</h1>
        <h2 id="header-subtitle"></h2>

    </hgroup>

    <nav class="navbar_links">
        <ul>
            <li><a href="/about">Sobre</a></li>
            <li><a href="/contact">Contato</a></li>
            <li><a href="/services">Serviços</a></li>
        </ul> 
    </nav>

    <nav class="navbar_search-form">
        <form method="POST">    
            <input type="text" placeholder="Search"/>
            <button>
                <img src="{{ asset('/icons/search.svg') }}" alt="Search"/>
            </button>
        </form>
    </nav>
</header>

<script src="{{ asset('/js/header-typewriter.js') }}"></script>
