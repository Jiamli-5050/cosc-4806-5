<?php require_once 'app/views/templates/header.php'; ?>

<?php if (isset($_SESSION['username']) && $_SESSION['username'] === 'admin'): ?>
  <div class="toast-container position-fixed top-50 start-50 translate-middle p-4">
    <div id="adminToast" class="toast align-items-center text-white bg-primary border-0 show fs-4 px-4 py-3 text-center"
      style="min-width: max-content; max-width: 90vw;"
      role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">
          Admins can not create reminders.
        </div>  
        </div>
      </div>
    </div>
  <?php endif; ?>


<div class="container mt-4"> 
  <h3> Create a reminder</h3>
  <form method="post" action="/reminders/store">
    <table class="table table-bordered mt-3">
      <thead>
        <tr>
          <th> New Reminder</th>
          <th style ="width: 100px">Action </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <input type="text" name="subject" class="form-control" placeholder="Enter reminder" required>
          </td>  
          <td>
            <button type="submit" class="btn btn-primary"
            <?php if (isset($_SESSION['username']) && $_SESSION['username'] === 'admin') echo 'disabled'; ?>>
            Create
          </button>
       </td>
    </tr>
  </tbody>
 </table>
</form>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php if (isset($_SESSION['username']) && $_SESSION['username'] === 'admin'): ?>
  <script>
    const toastEl = document.getElementById('adminToast');
    const toast = new bootstrap.Toast(toastEl, { autohide: false});
    toast.show();
    </script>
  <?php endif; ?>

<?php require_once 'app/views/templates/footer.php' ?>
