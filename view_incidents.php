<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Incidents</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include 'navbar.php'; ?>

  <div class="container mt-5">
    <h1>View Incidents</h1>
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Incident Type</th>
          <th>Description</th>
          <th>Severity</th>
          <th>Priority</th>
          <th>Created At</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'db_connection.php';

        // Fetch incident reports from the database
        $sql = "SELECT * FROM incidents ORDER BY created_at DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["incident_type"] . "</td>";
                echo "<td>" . $row["description"] . "</td>";
                echo "<td>" . $row["severity"] . "</td>";
                echo "<td>" . $row["priority"] . "</td>";
                echo "<td>" . $row["created_at"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo '<tr><td colspan="6">No incidents found</td></tr>';
        }
        $conn->close();
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
