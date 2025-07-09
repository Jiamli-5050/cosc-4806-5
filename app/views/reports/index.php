<?php require_once 'app/views/templates/header.php'; ?>

  <div class="container mt-4">
    <h1>Admin Reports</h1>
    <p>Welcome to the admin reports page.</p>
    <p>Here you can view reports on user activity and other relevant information.</p>    

    <h3 class="mt-4">All reminders grouped by user</h3>

    <table class="table table-bordered mt-3">
      <thead>
        <tr>
          <th>User</th>
          <th>Reminders</th>
          <th>Created At</th>
          
        </tr>
      </thead>
    <tbody>
      <?php foreach ($data['reminders'] as $reminder): ?>
      <tr>
        <td><?= htmlspecialchars($reminder['username']); ?></td>
        <td><?= htmlspecialchars($reminder['subject']); ?></td>
        <td><?= htmlspecialchars($reminder['created_at']); ?></td>
      </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    </div>

  <?php require_once 'app/views/templates/footer.php'; ?>