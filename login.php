<?php include "includes/header.php"; ?>
<div class="container">
    <h1>Account</h1>
    <p>Login to your account</p>

    <!-- Login Form -->
    <div class="card">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button class="btn-primary" type="submit">Login</button>
            <a href="register.php">Not registered yet? Create account here</a>
        </form>
    </div>
</div>
<?php include "includes/footer.php"; ?>