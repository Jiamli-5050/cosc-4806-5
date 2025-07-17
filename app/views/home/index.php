<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12 text-center mt-5">
                <h1>Hey! Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
            </div>
        </div>    
<?php if (!empty($data['lastReminder'])): ?>
    <div class="row justify-content-center mt-4">
    <div class="col-md-8">
    <div class="alert alert-primary text-center mb-0" role="alert">
        Last Created Reminder: <strong><?= htmlspecialchars($data['lastReminder']['subject']) ?></strong>
        </div>
    </div>
</div>
    <?php endif; ?>
        </div>
    </div>

    <?php require_once 'app/views/templates/footer.php' ?> 
