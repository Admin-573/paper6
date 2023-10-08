<html>
    <head>
        <title>Matrimonial Website</title>
    </head>
    <body>
        <center>
            <h2>Matrimonial Website</h2>  
            <table border="1px" style="text-align: center;">
                <tr>
                    <td>
                        <h3>Registration</h3>  
                        <form action="" method="post"> 
                        <table cellpadding="4px">
                            <tr>
                                <td>User ID</td>
                                <td><input type="number" name="rid" required/></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="email" name="remail" required/></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="password" name="rpass" required/></td>
                            </tr>
                            <tr>
                                <td>Birth Date</td>
                                <td><input type="date" name="rdate" required/></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>
                                    <select name="rgender">
                                        <option name="rmale">Male</option>
                                        <option name="rfemale">Female</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Height</td>
                                <td>
                                    <input type="number" name="rheight" required/>
                                </td>
                            </tr>
                            <tr>
                                <td>Martial Status</td>
                                <td>
                                    <select name="rstatus">
                                        <option name="rmarried">Married</option>
                                        <option name="runmarried">Un-Married</option>
                                        <option name="none">None</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Mother Tounge</td>
                                <td>
                                    <select name="rlang">
                                        <option name="hindi">Hindi</option>
                                        <option name="gujarati">Gujarati</option>
                                        <option name="english">English</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Religious</td>
                                <td>
                                    <select name="religious">
                                        <option name="hindu">Hindu</option>
                                        <option name="parsi">Parsi</option>
                                        <option name="mullaa">Mulla</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td>
                                    <select name="rcity">
                                        <option name="surat">Surat</option>
                                        <option name="mumbai">Mumbai</option>
                                        <option name="delhi">Delhi</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Mobile No</td>
                                <td>
                                    <input type="number" name="rmno" required/>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="btn_reg" value="Register"/>
                                </td>
                            </tr>
                        </table>
                        </form>
                    </td> 

                    <td>  
                        <h3>Login</h3>   
                        <form action="" method="post">
                        <table cellpadding="4px">
                            <tr>
                                <td>Email</td>
                                <td><input type="email" name="lemail" required/></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="password" name="lpass" required/></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="btn_login" value="Login"/></td>
                            </tr>
                        </table>
                        </form>
                    </td>
                </tr>
            </table>   
        </center>
    </body>
</html>
<?php
    include "init.php";
    $create = "create table if not exists $reg
    (
        $rid integer primary key,
        $remail text,
        $rpass text,
        $rdate varchar(128),
        $rgender varchar(64),
        $rheight text,
        $rstatus varchar(128),
        $rlang varchar(128),
        $religious varchar(128),
        $rcity varchar(128),
        $rmno varchar(64)
    )";
    $queryExe = mysqli_query($con,$create);

    if(isset($_POST['btn_reg']))
    {
        $reg_id =$_POST[$rid];
        $reg_email=$_POST[$remail];
        $reg_pass=$_POST[$rpass];
        $reg_date=$_POST[$rdate];
        $reg_gender=$_POST[$rgender];
        $reg_height=$_POST[$rheight];
        $reg_status=$_POST[$rstatus];
        $reg_lang=$_POST[$rlang];
        $reg_religious=$_POST[$religious];
        $reg_city=$_POST[$rcity];
        $reg_mno = $_POST[$rmno];

        $sql = "select * from $reg where $reg_id=$rid";
        $queryExe = mysqli_query($con,$sql);
        $data = mysqli_num_rows($queryExe);

        if($data)
        {
            ?>
                <script>
                    alert("User Already Registered Please Login")
                </script>
            <?php
        }
        else 
        {
            $insert = "insert into $reg values
                        ($reg_id,'$reg_email',
                         '$reg_pass','$reg_date',
                         '$reg_gender','$reg_height',
                         '$reg_status','$reg_lang',
                         '$reg_religious','$reg_city',$reg_mno)";
            $queryExe = mysqli_query($con,$insert);
            if($queryExe)
            {   
                ?>
                    <script>
                        alert("User Registered")
                        window.open("http://localhost/paper6/index.php","_self")
                    </script>
                <?php
            } else {
                ?>
                    <script>
                        alert("Error")
                    </script>
                <?php
            }
        }
    }

    if(isset($_POST['btn_login'])){
        //error_reporting(0);
        $login_email = $_POST[$lemail];
        $login_pass = $_POST[$lpass];

        $sql = "select * from $reg where $remail='$login_email' and $rpass='$login_pass'";
        //print_r($sql);
        $queryExe = mysqli_query($con,$sql);
        $data = mysqli_num_rows($queryExe);
        if($data)
        {
            ?>
                <script>
                    alert("User Found")
                    window.open("http://localhost/paper6/show.php?email=<?php echo $login_email; ?>")
                </script>
            <?php
        }
        else 
        {
            ?>
                <script>
                    alert("User Not Found")
                </script>
            <?php
        }

    }
?>
