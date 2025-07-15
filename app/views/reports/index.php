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

    <h3 class="mt-4">Count of reminders by user</h3>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>User</th>
        <th>Reminders</th>
          </tr>  
            </thead>
             <tbody>
                <?php if (!empty($data['reminderCounts'])) : ?>
                <?php foreach ($data['reminderCounts'] as $row): ?>
         <tr>
         <td><?= htmlspecialchars($row['username']) ?></td>
         <td><?= $row['reminder_count']; ?></td>             </tr> 
         <?php endforeach; ?>
        <?php else: ?>
        <tr>
        <td colspan="2">No reminders found.</td>
      </tr>
      <?php endif; ?>
  </tbody>
  </table>

    <h3 class="mt-4">Count of Logins in the last 30 days by user</h3>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>User</th>
          <th>Logins</th>
        </tr>
      </thead>
    <tbody>
      <?php if (!empty($data['loginCounts'])) : ?>
      <?php foreach ($data['loginCounts'] as $login): ?>
      <tr>
        <td><?=htmlspecialchars($login['username']); ?></td>
        <td><?= $login['login_count']; ?></td>
      </tr>
      <?php endforeach; ?>
      <?php else: ?>
      <tr>
        <td colspan="2">No logins found.</td>
        </tr>
      <?php endif; ?>
      </tbody>
  </table>

<h3 class="mt-4">Login Chart (Last 30 Days)</h3>
<canvas id="loginChart" height="100"></canvas>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('loginChart').getContext('2d');
  const loginChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?= json_encode(array_column($data['loginCounts'], 'username')) ?>,
    datasets: [{
      label: 'Logins in the last 30 days',
      data: <?= json_encode(array_column($data['loginCounts'], 'login_count')) ?>,
      backgroundColor: 'rgba(75, 192, 192, 0.2)',
      borderColor: 'rgba(75, 192, 192, 1)',
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
          ticks: { stepSize: 1 }
      }
    }
  }
  });
</script>
    


  <?php require_once 'app/views/templates/footer.php'; ?>