<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require_once 'app/views/templates/header.php' ?>

<!-- View reports reminder, ADMIN ONLY -->
<?php if (isset($_SESSION['username']) && $_SESSION['username'] === 'admin'): ?>
<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="reminderToast" class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        Want to see who created which reminders? <a href="/reports" class="text-white text-decoration-underline">Click Here!</a>
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </div>
  <?php endif; ?>

<div class="container">
  <div class="page-header" id="banner">
    <div class="row">
      <div class="col-lg-12">
        <h1>Here is a list of all reminders</h1>
      </div>
    </div>  
  </div>

  <table class="table table-bordered mt-3">
    <thead>
      <tr>
        <th>Reminder</th>
        <th style="width: 180px;">Action</th>
      </tr>
    </thead>
  <tbody>
<!-- Loop through the reminders and display them in a table -->
  <?php foreach ($data['reminders'] as $reminder) : ?>
    <tr>
      <td><?= htmlspecialchars($reminder['subject']) ?></td>
      <td>
        <!-- Update button -->
      <form method ='post' action="/reminders/update" class="mb-2 d-inline-block me-2">
        <input type="hidden" name="id" value="<?= $reminder['id'] ?>">
        <input type="text" 
        name="subject" 
        placeholder="Type here to update"
        class="form-control form-control-sm d-inline-block" 
        style="width: auto;" required>
        <button type="submit" class="btn btn-sm btn-warning">Update</button>
      </form>

        <!-- Delete button -->
      <form method ="post" action="/reminders/delete" style="display: inline;">
        <input type="hidden" name="id" value="<?= $reminder['id'] ?>">
        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
      </form>
      </td>
  </tr>
   <?php endforeach; ?>
  </tbody>  
  </table>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php if (isset($_SESSION['username']) && $_SESSION['username'] === 'admin'): ?>
  <script>
    const toastEl = document.getElementById('reminderToast');
    if (toastEl) {
      const toast = new bootstrap.Toast(toastEl, { autohide: false });
      toast.show();
    }
    </script>
  <?php endif; ?>

<?php require_once 'app/views/templates/footer.php' ?>
