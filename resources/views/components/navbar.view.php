<header>
    <a href="/" class="logo">
        <img src="<?= assets('logo-white.png') ?>" alt="Logo"/>
    </a>
    <ul class="nav">
        <li class="navlink"><a href="/">Home</a></li>
        <?php if (\Core\Session\Session::$user !== NULL && \Core\Session\Session::$user->role === 'ADMIN'): ?>
            <li class="navlink"><a href="/admin/anime/add">Add Anime</a></li>
        <?php endif ?>
        <?php if (\Core\Session\Session::isAuthenticated()) : ?>
            <li class="navlink"><a href="/profile/<?= \Core\Session\Session::$user->id ?>">Profile</a></li>
            <li class="navlink">
                <form action="/logout" method="post">
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </li>
        <?php else: ?>
            <li class="navlink"><a href="/login">Login</a></li>
            <li class="navlink"><a href="/register">Register</a></li>
        <?php endif ?>
    </ul>
    <div class="burger">
        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
            <path fill="white"
                  d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/>
        </svg>
    </div>
</header>