<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12 text-center mt-5">
                <h1>Hey! Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
            </div>
        </div>
    </div>
</div>

    <?php require_once 'app/views/templates/footer.php' ?>
