<?php require_once 'app/views/templates/header.php'; ?>


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
            <button type="submit" class="btn btn-primary">Create</button>
       </td>
    </tr>
  </tbody>
 </table>
</form>
<?php require_once 'app/views/templates/footer.php' ?>
