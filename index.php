<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Luthfi Alfarisi">

    <title>Azure Web App</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="navbar-wrapper">
      <div class="container">
          <h1 align="center">Welcome Visitor</h1>
          <hr/>
      </div>
    </div>

    <br>
    
    <div class="container">
        <div class="col-md-offset-3 col-md-6" align="center">
          <form class="form-horizontal" action="index.php" method="post">
            
            <div class="form-group">
              <label class="control-label col-sm-2" for="name">Name :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Email :</label>
              <div class="col-sm-10"> 
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-sm-2" for="job">Job :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="job" name="job" placeholder="Enter your job">
              </div>
            </div>
           
            <div class="form-group"> 
                <button type="submit" name="register" class="btn btn-primary">Register</button>
            </div>
            
          </form>
        </div>
        
        <div class="col-md-offset-2 col-md-8" align="center">
          <br>
          <h3>Visitor History</h3>
          <br>
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Job</th>
                <th>Date</th>
              </tr>
            </thead>
            
            <tbody>
              <?php
                  include ("connection.php");
                  try {
                      $getdata = "SELECT * FROM Persons";
                      $stmt = $conn->query($getdata);
                      $data = $stmt->fetchAll(); 
                      if(count($data) > 0) {
                          $i = 1;
                          foreach($data as $person) {
                              echo "<tr><td>".$i++."</td>";
                              echo "<td>".$person['fullname']."</td>";
                              echo "<td>".$person['email']."</td>";
                              echo "<td>".$person['_job']."</td>";
                              echo "<td>".$person['_date']."</td></tr>";
                          }
                          
                      } else {
                          echo "<tr><td colspan=5>Data Empty</td></tr>";
                      }
                  } catch(Exception $e) {
                      echo "Error : " . $e;
                  }
              ?>
              
            </tbody>
          </table>
        </div>
    </div>

  <?php
      if (isset($_POST['register'])) {
        try {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $job = $_POST['job'];
            $date = date("Y-m-d");
            
            $insert_query = "INSERT INTO Persons (fullname, email, _job, _date) 
            VALUES (?,?,?,?)";
            $stmt = $conn->prepare($insert_query);
            $stmt->bindValue(1, $name);
            $stmt->bindValue(2, $email);
            $stmt->bindValue(3, $job);
            $stmt->bindValue(4, $date);
            $stmt->execute();
            
        } catch(Exception $e) {
            echo "Error: " . $e;
        }
      }
  ?>
  </body>
</html>
