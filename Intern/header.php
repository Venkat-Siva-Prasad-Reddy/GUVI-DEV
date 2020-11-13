<header>
    <a href="<?php echo 'index.php' ?>" class="logo">
        <h2 class="logo-text"><span>GUVI INTERN</span></h2>
    </a>
    <i class="fa fa-bars menu-toggle"></i>
    <ul class="nav">
        <li>
            <a href="<?php echo 'index.php' ?>">Home</a>
        </li>
        
        <?php if (isset($_SESSION['id'])): ?>
        <li>
            <a href="#">
                <i class="fa fa-user"></i>
                <?php echo $_SESSION['username']; ?>
                <i class="fa fa-chevron-down"style="fount-size: .8em"></i>
            </a>
        </li>
        <?php else: ?> 
            <li><a href="<?php echo 'register.php' ?>">Sign Up</a></li>
            <li><a href="<?php echo 'login.php' ?>">Login</a></li>
        <?php endif; ?>
    </ul>
</header>