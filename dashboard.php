<?php

include "includes/auth/header.php"; ?>

<!-- Main Content -->
<div class="container">
    <div class="card">
        <h1>Welcome! <?= $user['first_name'] ?></h1>
        <p>You are now logged in to your Book Collection dashboard. You can upload and manage your books here.</p>
    </div>
</div>
<?php include "includes/auth/footer.php"; ?>