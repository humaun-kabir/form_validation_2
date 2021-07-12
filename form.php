<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form validation</title>
</head>
<body>

    <?php
    // define valiables and set to empty values
    $fullname= $email= $gender= $comment = $number =$age = "";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $fullname = test_input($_POST['name']);
        $email = test_input($_POST['email']);
        $number = test_input($_POST['number']);
        $comment = test_input($_POST['comment']);
        $gender = test_input($_POST['gender']);
        $age = test_input($_POST['age']);
    }

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    ?>

    <h2>Form Validation</h2>
    <form method="POST" action="" <?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>>
    Full Name : <input type="text" name="name">
    <br><br>
    E-mail : <input type="text" name="email">
    <br><br>
    Number(optional) : <input type="text" name="number">
    <br><br>
    Age : <input type="text" name="age">
    <br><br>
    Comment : <textarea name="comment" id="" cols="30" rows="10"></textarea>
    <br><br>
    Gender :
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <br><br>
    <input type="submit" name="click here" value="click here">

    </form>


    <?php
        echo "<h2>Your input :</h2>";
        echo $fullname;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $age;
        echo "<br>";
        echo $number;
        echo "<br>";
        echo $comment;
        echo "<br>";
        echo $gender;
    ?>
</body>
</html>