
<nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
    <ul class="site-menu main-menu js-clone-nav ml-auto ">
        <li class="active"><a href="index.php" class="nav-link">Home</a></li>
        <li><a href="about.php" class="nav-link">About</a></li>
        <li><a href="blog.php" class="nav-link">Blog</a></li>
        <li><a href="shop.php" class="nav-link">Gallery</a></li>
        <li><a href="contact.php" class="nav-link">Contact</a></li>
        <?php 
        if($_SESSION['login'] == true){
            echo "<li><a href='logout.php' class='nav-link'>Logout</a></li>";
            }else{
            echo "<li><a href='login.php' class='nav-link'>Login</a></li>
                <li><a href='signup.php' class='nav-link'>Sign Up</a></li>";
        }?>
    </ul>
</nav>