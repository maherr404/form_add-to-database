
<?php
$servername = "localhost";
$username = "root";
$password = "root";


// Create connection
$conn = mysqli_connect($servername, $username, $password,"fuck");




// Function to select one record
function selectOne($id)
{
    global $conn;
    $query = "SELECT * FROM your_table WHERE id = " . mysqli_real_escape_string($conn, $id);
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
}



// Function to delete a record
function delete($id)
{
    global $conn;
    $query = "DELETE FROM your_table WHERE id = " . mysqli_real_escape_string($conn, $id);
    $result = mysqli_query($conn, $query);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

// Function to edit a record
function edit($id, $data)
{
    global $conn;
    $name = mysqli_real_escape_string($conn, $data['name']);
    $email = mysqli_real_escape_string($conn, $data['email']);
    $phone = mysqli_real_escape_string($conn, $data['phone']);

    $query = "UPDATE your_table SET name = '$name', email = '$email', phone = '$phone' WHERE id = " . mysqli_real_escape_string($conn, $id);
    $result = mysqli_query($conn, $query);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

// Function to search records
function search($keyword)
{
    global $conn;
    $keyword = mysqli_real_escape_string($conn, $keyword);
    $query = "SELECT * FROM your_table WHERE name LIKE '%$keyword%' OR email LIKE '%$keyword%' OR phone LIKE '%$keyword%'";
    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Close the connection



?>