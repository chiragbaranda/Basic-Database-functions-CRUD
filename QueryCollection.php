<?php

try 
    { 
        $dbh = new PDO("mysql:host=localhost;dbname=000759867", "000759867",    "19960609");
        echo "Database connection Successful!!";
    
    } 
catch (Exception $e) 
    {
    die("ERROR: Couldn't connect. {$e->getMessage()}"); 
    }
    
$firstName= rtrim(filter_input(INPUT_POST, "FirstName", FILTER_SANITIZE_SPECIAL_CHARS));    
$lastName= rtrim(filter_input(INPUT_POST, "LastName", FILTER_SANITIZE_SPECIAL_CHARS));    
$studentID= rtrim(filter_input(INPUT_POST, "StudentID", FILTER_SANITIZE_SPECIAL_CHARS));        
$OnlineAssignment= rtrim(filter_input(INPUT_POST, "OnlineAssignment", FILTER_SANITIZE_SPECIAL_CHARS));
$Assignment1= rtrim(filter_input(INPUT_POST, "Assignment1", FILTER_SANITIZE_SPECIAL_CHARS));
$Assignment2= rtrim(filter_input(INPUT_POST, "Assignment2", FILTER_SANITIZE_SPECIAL_CHARS));
$Assignment3= rtrim(filter_input(INPUT_POST, "Assignment3", FILTER_SANITIZE_SPECIAL_CHARS));
$PhpExam= rtrim(filter_input(INPUT_POST, "PhpExam", FILTER_SANITIZE_SPECIAL_CHARS));
$StartDate= rtrim(filter_input(INPUT_POST, "StartDate", FILTER_SANITIZE_SPECIAL_CHARS));
$CompletionDate= rtrim(filter_input(INPUT_POST, "CompletionDate", FILTER_SANITIZE_SPECIAL_CHARS));
$StudentReflaction= rtrim(filter_input(INPUT_POST, "StudentReflaction", FILTER_SANITIZE_SPECIAL_CHARS));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    

    if (isset($_POST['insert'])) 
    {
       $sql= "INSERT INTO `Student_Marks_Chirag`(`FirstName`, `LastName`, `StudentID`, `OnlineAssignment`, `Assignment1`, `Assignment2`, `Assignment3`, `PhpExam`, `StartDate`, `CompletionDate`, `StudentReflaction`) VALUES ('$firstName','$lastName','$studentID','$OnlineAssignment','$Assignment1','$Assignment2','$Assignment3','$PhpExam','$StartDate','$CompletionDate','$StudentReflaction')";
       
    }
    elseif (isset($_POST['update'])) 
    {
       $sql= "UPDATE `Student_Marks_Chirag` SET `PhpExam`='$PhpExam' WHERE StudentID = '$studentID'"; 
    }
    elseif (isset($_POST['delete'])) 
    {
            $sql= "DELETE FROM `Student_Marks_Chirag` WHERE StudentID = '$studentID'";
    }
}    

$stmt = $dbh->prepare($sql);  
$success = $stmt->execute();


if ($success) 
    { 
        echo "<p>successfull query run</p>"; 
        echo "<p> $sql </p>"; 
        echo "<p> {$stmt->rowCount()} rows were affected by your  query.</p>"; 
    }
else 
    { echo "<p> Fail, Query Run</p>"; }

