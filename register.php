<?php include "includes/header.php"; ?>
<div class="container">
    <h1>Account</h1>
    <p>Create a new account</p>

    <!-- Register Form -->
    <div class="card">
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <div class="form-row">
                <input type="text" name="first_name" placeholder="First Name" required>
                <input type="text" name="last_name" placeholder="Last Name" required>
            </div>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button class="btn-primary" type="submit">Register</button>
            <a href="login.php">Already have an account? Login here</a>
        </form>
    </div>
</div>
<?php include "includes/footer.php"; ?>