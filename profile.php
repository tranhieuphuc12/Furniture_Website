<?php
require_once 'config/database.php';
$username = isset($_POST['username'])?$_POST['username']:null;
$memberModel = new Member();
$template = new Template();
$userInfo = $memberModel->getMember($username);

$slot = $template->render('profile_block',['username' => $username,
                                           'phoneNumber' => $userInfo['phone_number']]);
$data = [
    'title' => 'Profile',
    'slot' => $slot
];
$template->view('navbar_light_layout', $data);
// require_once 'config/database.php';
// $memberModel = new Member();
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
//     $filename = $_FILES["fileToUpload"]["name"];
//     $tmpFilePath = $_FILES["fileToUpload"]["tmp_name"];

//     // Check if the file was uploaded successfully
//     if (move_uploaded_file($tmpFilePath, "uploads/" . $filename)) {

//         // Open and read the file content
//         $fileContent = file_get_contents("uploads/" . $filename);

//         // Insert the file into the database
//         $memberModel->uploadFile($fileContent,"phuc");

//         echo "File uploaded successfully and saved in the database.";
//     } else {
//         echo "Error uploading file.";
//     }
// }

