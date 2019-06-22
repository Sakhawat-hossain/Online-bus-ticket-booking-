<!DOCTYPE HTML>  
<html>
    <head>
        <style>
            .error {
                color: #FF0000;
            }
            body{
                margin: 0 auto;
            }
            h2{
                text-align: center;
            }
            form{
                text-align: left;
                margin: 0 auto;
                padding-left: 10px; 
            }
            .bgimage{
                background-color:  #e0e0e0;
                background-position: center;   
                
                height: 100%;
                width: 300px;
            }
        </style>
    </head>
    <body>  

    <?php
        // define variables and set to empty values
        $fnameErr = $lnameErr = $hsnoErr = $streetErr = $thanaErr = $disttrictErr = $phnoErr = $usernameErr = $passwordErr1 = $passwordErr2="";
        $fname = $lname = $houseno = $street  = $thana = $district = $phno = $username = $password1 = $password2 = "";
       
        $errormgs="";
        $mgs="1";
       

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
        
    ?>

        <h2>Create an account for online orders </h2>
        <div align="center">
            <div class="bgimage">
        <form method="POST" action="{{url('user')}}">
            {{csrf_field()}}

            Username : <input type="text" name="username" size="35" value="<?php echo $username;?>">
            <span class="error">* <?php echo $usernameErr;?></span>
            <br>
            Password : <input type="password" name="password" size="35" value="<?php echo $password1;?>">
            <span class="error">* <?php echo $passwordErr1;?></span>
            <br>  
            Email : <input type="text" name="email" size="35" value="<?php echo $fname;?>">
            <span class="error">* <?php echo $fnameErr;?></span>
            <br>
            <div align="center">
                <input type="submit">  
            </div>
        </form>
        <p><span class="error">* required field.</span></p>
            </div>
        </div>
    
        <form method="GET" action="{{url('user')}}">
            <div align="center">
                <input type="submit" value="Show index">
            </div>
        </form>

        <form method="GET" action="{{url('user/1')}}">
            <div align="center">
                <input type="submit" value="Show profile">
            </div>
        </form>
    </body>
</html>