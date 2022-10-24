// <?php 
// if(isset($_POST['submit'])){
//     $username = $_POST['fullname'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];

// registerUser($username, $email, $password);

// }

// function registerUser($username, $email, $password){
//     //save data into the file

    
    
//     // echo "OKAY";
// }
// echo "HANDLE THIS PAGE";

if(isset($_POST['submit'])){
    //Trim form inputs of unwanted spaces
    $username = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if(registerUser($username, $email, $password)){
        echo "User registered successfully!";
        echo '<meta http-equiv="refresh" content="2; url=../forms/login.html">';
    } else {
        echo "User not registered!"; 
        echo '<meta http-equiv="refresh" content="2; url=../forms/register.html">';
    }
}

function registerUser($username, $email, $password){
    //save data into the file
    // echo "OKAY";

    $filename = "../storage/users.csv";
    $handle = fopen($filename, 'w');
    $data = array($username, $email, $password);
    $delimeter = ",";
    
    if(fputcsv($handle, $data, $delimeter)){
        return true;
     } else return false;

    fclose($handle);
}