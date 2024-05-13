<?php
include("database_connection.php"); // Include the database connection file
function showdata() {
    global $data; // Assuming $data is your database connection object

    $sql = "SELECT `doctorID`, `fullname`, `email`, `mobile`, `password`, `gender` FROM `doctor` "; 

    $result = $data->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Mobile</th><th>Password</th><th>Gender</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>".$value."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}


function insert_doctor($fullname, $email, $phoneno, $password, $gender) {
    global $data;

    // Prepare and bind statement
    $stmt = $data->prepare("INSERT INTO doctor (fullname, email, mobile,password, gender) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $fullname, $email, $phoneno, $password, $gender);

    // Execute statement
    $result = $stmt->execute();

    // Close statement
    $stmt->close();

    return $result;

}

function login($phoneno, $password) {
    global $data;

    // Prepare and execute the SQL query
    $stmt = $data->prepare("SELECT * FROM doctor WHERE phoneno=?");
    $stmt->bind_param("s", $phoneno);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
        // Error handling for query execution
        echo "Error: " . $data->error;
        return false;
    }

    if ($result->num_rows == 1) {
        // Fetch the user data
        $row = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $row['password'])) {
            return true; // Password matches
        } else {
            return false; // Password does not match
        }
    } else {
        return false; // No user found with the provided phone number
    }
}





?>
