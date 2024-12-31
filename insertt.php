







<?php
include "inde.php";


header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



// Function to insert a record
function insert($data)
{
    
    global $conn;
    $name = $data['name'];
    $email = $data['email'];
    $password = password_hash($data['password'],PASSWORD_BCRYPT);
 

    $query = "INSERT INTO lala(name, email, password) VALUES ('$name', '$email', '$password')";
   $result = mysqli_query($conn, $query);

   
    if ($result) {
        // Data inserted successfully
        $response = [
            'status' => 'success',
            'message' => 'Data inserted successfully'
        ];
        return json_encode($response);

        // Redirect back to the website
    //    header('Location: file:///E:/xampp/htdocs/form.html');
       // exit;
    } else {
        // Error inserting data
        $response = [
            'status' => 'error',
            'message' => 'Failed to insert data'
        ];
        return json_encode($response);
    }
}





if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have already included the necessary database connection code
    // $data = json_decode(file_get_contents("php://input"), true);
    // echo "<pre>";
    // print_r($data);
    // echo  "</pre>";
    // Get the form data
    $name = $_POST['name'];
    // echo $name;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $data =['name'=>$name,'email'=>$email,'password'=>$password]; 
    print_r(insert($data));
     mysqli_close($conn);


}




?>