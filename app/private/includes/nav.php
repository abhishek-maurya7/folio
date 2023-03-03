<header class="header">
    <div class="logo">
        <a href="index">Folio</a>
    </div>
    <nav class="nav">
        <input type="checkbox" id="nav-check">
        <ul class="nav-links">
            <li>
                <a href="https://github.com/NewbieCodes1/folio" target="_blank" rel="noopener">Github</a>
            </li>
            <li><a href="pricing">Pricing</a></li>
            <li><a href="mailto:shashankpatil360@gmail.com">Contact Us</a></li>
            <li><a href="" target="_blank">About Us</a></li>
            <?php
            $url = $_SERVER['REQUEST_URI'];
            if (strpos($url, 'login') == false || strpos($url, 'signup') == false) {
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
                    echo '<li><a href="' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . 'logout' . '">Logout</a></li>';
                } else {
                    if (strpos($url, 'login')) {
                        echo '<li><a href="' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . 'signup' . '">Signup</a></li>';
                    } elseif (strpos($url, 'signup')) {
                        echo '<li><a href="' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . 'login' . '">Login</a></li>';
                    }
                }
            }
            ?>
        </ul>
    </nav>
    <div class="hamburger-container">
        <label class="hamburger" for="nav-check">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </label>
    </div>
</header>
<hr />