<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report Incident</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include 'navbar.php'; ?>

  <div class="container mt-5">
    <h1>Report Incident</h1>
    <form id="incidentForm">
      <div class="mb-3">
        <label for="incidentType" class="form-label">Incident Type</label>
        <input type="text" class="form-control" id="incidentType" name="incidentType">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
      </div>
      <div class="mb-3">
        <label for="severity" class="form-label">Severity</label>
        <select class="form-select" id="severity" name="severity">
          <option value="Low">Low</option>
          <option value="Medium">Medium</option>
          <option value="High">High</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="priority" class="form-label">Priority</label>
        <select class="form-select" id="priority" name="priority">
          <option value="Low">Low</option>
          <option value="Medium">Medium</option>
          <option value="High">High</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div id="responseMessage" class="mt-3"></div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#incidentForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
          type: 'POST',
          url: 'submit_incident.php',
          data: formData,
          success: function(response) {
            $('#responseMessage').html(response);
            $('#incidentForm')[0].reset();
          },
          error: function(xhr, status, error) {
            console.error(xhr.responseText);
            $('#responseMessage').html('<div class="alert alert-danger">Error occurred. Please try again later.</div>');
          }
        });
      });
    });
  </script>
</body>
</html>
