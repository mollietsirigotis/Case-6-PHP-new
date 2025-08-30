<!-- navigering mellan olika filer / sidor -->
<nav>
    <a href="/">Home</a> |
    <a href="/all-poems.php">All Poems</a> |
    
    <?php

    if (isset($_SESSION['username'])) {
        
        // Visa vem som är inloggad
        // Länk till att logga ut ...

        
        echo '<a href="/my-poems.php">My Poems</a> |';
        echo '<a href="/write-poem.php">Write Poem</a>';
        echo " | ";
        echo "<a> Logged in: ". $_SESSION['username']. "</a>";
        echo " | ";
        echo  '<a href="/logout.php">Log Out</a>';
        
        

    } else {
        echo  '<a href="/login.php">Log in</a> |';
        echo '<a href="/register.php">Register</a>';
    }

    
    ?>

</nav>