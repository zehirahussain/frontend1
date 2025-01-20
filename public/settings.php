
<?php
session_start();
$servername = "sql12.freesqldatabase.com";
$username = "sql12756836";
$password = "qEaH9rPgZn";
$database = "sql12756836";


// Check if user is not logged i
if (!isset($_SESSION['email'])) {
    // Redirect to login page
    header("Location: ../backend/php/login.php");
    exit();
}

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

// Prepare and execute SQL query to retrieve user details
$sql = "SELECT name, password FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch user details
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $password = $row['password'];
} else {
    // Handle case where user details are not found
    $name = "Name not found";
    $password = "Password not found";
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>



    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Settings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('../assets/graph.jpeg');
            background-size: cover;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 10px;
            font-size:17px;
        }
        .BOX {
            border-radius: 27px;
            padding: 30px 20px 0px 30px;
            font-family: calibri;
            /*float: right;*/
            background-color: aliceblue;
            text-align: center;
            width: 625px; /* Adjust the width as needed */
            margin: 0 auto; /* Centers the div horizontally */
            padding: 138px 0px 200px 0px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .input-group {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }
        .input-group input {
            margin-right: 10px;
        }
        .input-group button {
            background-color: #005288;
            border: none;
            color: white;
            padding: 3px 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2);
            transition: all 0.3s;
        }
        .input-group button:hover {
            background-color: #003d66;
            cursor: pointer;
        }
        .button {
            background-color: #005288;
            border: none;
            color: white;
            padding: 10px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: all 0.3s;
            margin-top: 15px;
        }
        .button:hover {
            background-color: #003d66;
            cursor: pointer;
        }
        .delete{
            background-color: rgb(188, 9, 9);
        }
    </style>
</head>
<body>
    <div class="BOX">
        <h1>User Settings</h1>
        <form action="../backend/php/update.php" method="post">
            <div class="input-group">
               <p>Name:</p>
                <input type="text" class="req" name="name" value="<?php echo $name; ?>">
              <!--  <a href="updatedata.php?id=<?php echo $Id; ?>"><button type="submit">Edit</button></a> -->
            </div>
          <div class="input-group">
                <p>Email:</p> 
                <input type="text" class="req" name="email" value="<?php echo $email; ?>">    
            </div> 
            <div class="input-group">
                <p>Password:</p>
                <input type="text" class="req" name="password" value="<?php echo $password; ?>">
             <!--   <a href="updatedata.php?id=<?php echo $Id; ?>"><button type="submit">Edit</button></a> -->
            </div>
            <!-- <button type="submit" class="button">Submit</button></a> -->
        </form>
<p style="color: red;">Warning: Deleting your account is permanent!</p> <br>
<a href="../backend/php/deletedata.php?email=<?php echo $_SESSION['email']; ?>" class="button delete">Delete Account</a><br>
        <a href="decisionn.html"><button class="button">Back</button></a>
    </div>
</body>
</html>


