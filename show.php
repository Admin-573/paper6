<?php
 include 'init.php';
 $getEmail = $_GET[$email];
 //echo $getEmail;

 ?>
    <center>
        <table border="1px">
            <h1>Show Data</h1>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Password</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Height</th>
                <th>Status</th>  
                <th>Mother Tounge</th> 
                <th>Religious</th>
                <th>City</th>
                <th>Mno</th>
            </tr>
            <tr>
                <?php
                    include 'init.php';
                    $sql = "select $religious,$rcity from $reg where $remail='$getEmail'";
                    $queryExe=mysqli_query($con,$sql);
                    $data=mysqli_num_rows($queryExe);
                    $row = mysqli_fetch_array($queryExe);
                    if($data){
                        $sql = "SELECT * FROM $reg where $religious='$row[$religious]' AND $rcity='$row[$rcity]'";
                        //print_r($sql);
                        $queryExe= mysqli_query($con,$sql);
                        $data=mysqli_num_rows($queryExe);
                        if($data){
                            while($row =  mysqli_fetch_array($queryExe))
                            {
                                ?>
                                    <tr>
                                        <td><?php echo $row[$rid]; ?></td>
                                        <td><?php echo $row[$remail]; ?></td>
                                        <td><?php echo $row[$rpass]; ?></td>
                                        <td><?php echo $row[$rdate]; ?></td>
                                        <td><?php echo $row[$rgender]; ?></td>
                                        <td><?php echo $row[$rheight]; ?></td>
                                        <td><?php echo $row[$rstatus]; ?></td>
                                        <td><?php echo $row[$rlang]; ?></td>
                                        <td><?php echo $row[$religious]; ?></td>
                                        <td><?php echo $row[$rcity]; ?></td>
                                        <td><?php echo $row[$rmno]; ?></td>
                                    </tr>
                                <?php
                            }
                        }
                    }
                ?>
            </tr>
        </table>
    </center>
 <?php
?>