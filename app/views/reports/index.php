<?php require_once 'app/views/templates/header.php'; ?>

  <div class="container mt-4">
    <h1>Admin Reports</h1>
    <p>Welcome to the admin reports page.</p>
    <p>Here you can view reports on user activity and other relevant information.</p>    

    <!-- Accordion for all reminders grouped by user -->
    <div class="accordion mt-4" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            All reminders grouped by user
          </button>  
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <table class="table table-bordered mt-3">
                <thead>
                  <tr>
                    <th>User</th>
                    <th>Reminders</th>
                    <th>Created On</th>
                  </tr>
                </thead>
              <tbody>
                <?php foreach ($data['reminders'] as $reminder): ?>
                <tr>
                  <td><?= htmlspecialchars($reminder['username']) ?></td>
                  <td><?= htmlspecialchars($reminder['subject']) ?></td>
                  <td><?= htmlspecialchars($reminder['created_at']) ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
              </table>
                </div>
              </div>
            </div>

      <!-- Accordion for total reminders by user -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Total reminders by user
          </button>
          </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>User</th>
                      <th>Total Reminders</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!empty($data['reminderCounts'])) : ?>
                    <?php foreach ($data['reminderCounts'] as $row): ?>
                    <tr>
                      <td><?= htmlspecialchars($row['username']) ?></td>
                      <td><?= $row['reminder_count'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                      <td colspan="2">No reminders found.</td>
                    </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
                </div>
              </div>
            </div>

      <!-- Accordion for count of logins in the last 30 days by user -->  
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Count of Logins in the last 30 days by user
          </button>
          </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>User</th>
                      <th>Login Count</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if (!empty($data['loginCounts'])) : ?>
                    <?php foreach ($data['loginCounts'] as $login): ?>
                    <tr>
                      <td><?= htmlspecialchars($login['username']) ?></td>
                      <td><?= $login['login_count'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                      <td colspan="2">No logins found.</td>
                    </tr>
                    <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

      <!-- Accordion for login chart -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            Login Chart (In the last 30 days)
            </button>
            </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <canvas id="loginChart" height="100"></canvas>
                  </div>
                </div>
              </div>
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