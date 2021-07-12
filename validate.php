<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .error {color:#FF0000;}
    </style>
    <title>Form validation</title>
</head>
<body>
    <?php
    //define variables and set to empty
    $nameErr = $emailErr = $genderErr = $websiteErr = "";
    $name = $email = $gender = $comment = $website = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST['name'])){
            $nameErr = "please enter a valid name";
        }else{
            $name = test_input($_POST['name']);
            if(!preg_match("/^[a-zA-Z_']*$/",$name)){
                $nameErr = "only letters and white spaces allow";
            }
        }
    }
    if(empty($_POST['email'])){
        $emailErr = "valid email address";
    }else{
        $email = test_input($_POST['email']);   
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr = "the email address is incorrect";
        }
    }

    if(empty($_POST['website'])){
        $website = "";
    }else{
        $website = test_input($_POST['website']);
        if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)){
            $websiteErr = "enter a valid website url";
        }
    }

    if(empty($_POST["comment"])){
        $comment = "";
    }else{
        $comment = test_input($_POST['comment']);
    }

    if(empty($_POST['gender'])){
        $genderErr = "please select a gender";
    }
    else{
        $gender = test_input($_POST['gender']);
    }


    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    ?>

    <h2>php from validation example</h2>
    <p><span class="error">* Require field</span></p>
    <form method="POST" action="" <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>>
    Full Name : <input type="text" name="name">
    <span class="error"><?php echo $nameErr;  ?></span>
    <br><br>
    E-mail Address : <input type="text" name="email">
    <span class="error"><?php echo $emailErr;  ?></span>
    <br><br>
    Website : <input type="text" name="website">
    <span class="error"><?php echo $websiteErr; ?></span>
    <br><br>
    Comment : <textarea name="comment" id="" cols="30" rows="10"></textarea>
    <br><br>
    Gender :
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <span class="error"><?php echo $genderErr;  ?></span>
    <br><br>
    <input type="submit" name="submit" value="submit">

    </form>

    <?php
        echo "<h2>Your input :</h2>";
        echo $name;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $website;
        echo "<br>";
        echo $comment;
        echo "<br>";
        echo $gender;

    ?>
</body>
</html>