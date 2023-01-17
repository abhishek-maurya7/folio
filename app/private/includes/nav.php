<header class="header">
    <div class="logo">
        <a href="index.php">Folio</a>
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
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    echo '<li><a href="http://localhost/folio/logout">Logout</a></li>';
                } else {
                    echo '<li><a href="http://localhost/folio/login">Login</a></li>';
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