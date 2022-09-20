<div class="row nav">
    <input type="checkbox" id="nav-check">
    <div class="nav-header">
        <div class="nav-title">
            Folio
        </div>
    </div>
    <div class="nav-btn">
        <label for="nav-check">
            <span></span>
            <span></span>
            <span></span>
        </label>
    </div>
    <div class="nav-links">
        <a href="https://github.com/NewbieCodes1/folio" target="_blank" rel="noopener">Github</a>
        <a href="pricing">Pricing</a>
        <a href="mailto:shashankpatil360@gmail.com">Contact Us</a>
        <a href="" target="_blank">About Us</a>
        <?php
        $url = $_SERVER['REQUEST_URI'];
        if (strpos($url, 'login') == false || strpos($url, 'signup') == false) {
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo '<a href="logout">Logout</a>';
            } else {
                echo '<a href="login">Login</a>';
            }
        }
        ?>
    </div>
</div>
<hr>