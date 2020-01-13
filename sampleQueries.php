<?php
try 
    { 
        $dbh = new PDO("mysql:host=localhost;dbname=000759867", "000759867",    "19960609"); 
    
    } 
catch (Exception $e)
    {
    die("ERROR: Couldn't connect. {$e->getMessage()}"); 
    }
    
$sql = "INSERT INTO `Student_Marks_Chirag`(`FirstName`, `LastName`, `StudentID`) VALUES (\'Nishant\',\'Patel\',\'000759834\')";
$sql_del = "DELETE FROM `Student_Marks_Chirag` WHERE FirstName = \'Nishant\'";
$sql_update = "UPDATE `Student_Marks_Chirag` SET `Online Assignment`=50,`Assignment1`=50,`Assignment2`=50,`Assignment3`=50,`PhpExam`=50 WHERE StudentID = \'764979\'";

$stmt = $dbh->prepare($sql);  
$success = $stmt->execute();

if ($success) 
    { 
        echo "<p>Win!</p>"; 
        echo "<p> {$stmt->rowCount()} rows were affected by your  query.</p>"; 
        
    }
else 
    { echo "<p>Fail...</p>"; }

?>
