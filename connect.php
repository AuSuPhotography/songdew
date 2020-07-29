<?php

$fname = filter_input(INPUT_POST, 'fname');
$lname = filter_input(INPUT_POST, 'lname');
$age = filter_input(INPUT_POST, 'age');
$email = filter_input(INPUT_POST, 'email');
if (!empty($fname))
{
    if(!empty($lname))
    {
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "songdew";

        //Create Connection
        $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

        if (mysqli_connect_error())
        {
            die('Connect Error('.mysqli_connect_errno().')'
            .mysqli_connect_error());
        }
        else
        {
            $sql = "INSERT INTO form (fname, lname, age, email)
            values ('$fname','$lname','$age','$email')";
            if ($conn->query($sql))
            {
                echo "New Data Created";
            }
            else
            {
                echo "Error: ".$sql ."<br>".$conn->error;
            }
            $conn->close();
        }
    }
    else
    {
        echo "last name cannot be empty";
        die();
    }
}
else
{
    echo "First name cannot be empty";
    die();
}

?>