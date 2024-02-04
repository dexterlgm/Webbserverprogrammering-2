<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form action="formhandler.php" method="post">
        <label for="firstName">First name:</label><br>
        <input type="text" name="firstName" required><br>
        <br><label for=lastName>Last name:</label><br>
        <input type="text" name="lastName" required><br>
    
        <br><label for="birthday">Date of birth:</label><br>
        <input type="date" name="dateOfBirth"><br>

        <br><label for="passwords">Password:</label><br>
        <input type="password" name="password" required>

        <fieldset>
            <legend>Gender</legend>
            <input type="radio" name="gender" id="male" value="male" checked><label for="male">Male</label><br>
            <input type="radio" name="gender" id="female" value="female" ><label for="male">Female</label><br>
            <input type="radio" name="gender" id="other" value="other" ><label for="other">Other</label><br>

        </fieldset>

        <br><input type="checkbox" name="agreeBox" value="termsAgreed">
        <label for="agreeBox">Yes, I agree with the terms</label><br><br>
        <?php 
            if(isset($_GET['unauthorized'])){
                echo "<p><strong>Du måste fylla i formuläret först!</strong></p>";
            }elseif(isset($_GET['notAgreed'])){
                echo "<p><strong>Du måste godkänna villkoren för att gå vidare!</strong></p>";
            }
        
        ?>
        <input type="submit" name="submit" value="Submit">
    </form>

</body>
</html>