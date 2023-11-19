<?php
  include("../phpFiles/dbConnect.php");
  session_start();
  
  $searchKeyword = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $searchKeyword = $_POST["searchKeyword"];
  }

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  //normal function
  $sql = "SELECT accountID, accFirstName, accLastName, accEmail,  accPassword, accRole FROM accounts";
          

  //search if search not empty
  if (!empty($searchKeyword)) {
      $sql .= " WHERE accFirstName LIKE '%$searchKeyword%' OR accLastName LIKE '%$searchKeyword%' OR accEmail LIKE '%$searchKeyword%' OR accPassword LIKE '%$searchKeyword%' OR accRole LIKE '%$searchKeyword%'";
  }

  $sql .= ";";

  $result = $conn->query($sql);

  if (!$result) {
      die("Error in SQL query: " . $conn->error);
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../styles/transaction.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/logoIcon.ico"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <?php include('adminSidebar.php'); ?>    
        <main>
          <h1>Account Management</h1>
          <div class="main-content">
            <div class="contain">
            <div class="button">
                        <a href="addAccount.php"><i class="fa-solid fa-plus"></i></a>
                    </div>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="search">
                <input type="text" name="searchKeyword" value="<?php echo $searchKeyword; ?>" placeholder="  Search">
                <i class="fa-solid fa-magnifying-glass"></i>
              </form>
            </div>
            <?php
              if ($result->num_rows > 0) {
                  echo "<table>";
                  echo "<tr><th>Account ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Password</th><th>Role</th><th>Action</th>";
  
                  while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["accountID"] . "</td>";
                    echo "<td>" . $row["accFirstName"] . "</td>";
                    echo "<td>" . $row["accLastName"] . "</td>";
                    echo "<td>" . $row["accEmail"] . "</td>";
                    echo "<td>" . $row["accPassword"] . "</td>";
                    echo "<td>" . $row["accRole"] . "</td>";
  
                    echo "</td>";
  
                    echo "<td>
                            <div class='action-buttons'>
                                <button class='edit'><a href='./editAccount.php?accountID=$row[accountID]'><i class='fas fa-edit'></i></a></button>
                                <button class='delete'><a href='./deleteAccount.php?accountID=$row[accountID]'><i class='fa-solid fa-trash'></i></a></button>
                          </td>";
                    echo "</tr>";
                    
                  }
                  echo "</div>";
                  
                  echo "</table>";
              } else {
                  echo "0 results";
              }
  
              $conn->close();
            ?>
          </div>

        </main> 
  </div>

</body>
</html>