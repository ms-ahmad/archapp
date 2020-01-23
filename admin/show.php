<?php
//include database configuration file

            include_once '../Connection.php';

     



               
//`id`, `UserName`, `password`, `addevent`, `addvideo`, `addaudio`, `addphoto`,

                $sql_join = " SELECT * FROM `users` WHERE id=20 ";
                $result_join = mysqli_query($conn, $sql_join);
                if (mysqli_num_rows($result_join) > 0) {
                    while ($row = mysqli_fetch_assoc($result_join)) {
                        echo "<br>";
                        echo $row['addevent'];
                        echo "<br>";
                        
                        $addevent= json_decode( $row['addevent'] ); 
                        echo "<br>";
                        print_r( $addevent);
                        echo "<br>";
                        echo $addevent->e;
                        echo "<br>";
                        echo $addevent->a;
                        echo "<br>";
                        echo $addevent->s;
                        echo "<br>";
                        if ($addevent->a=='edit') {
                            echo " edit security events";
                        }elseif ($addevent->s=='read') {
                             echo "read only security events";
                        }else{
                            echo "noting";
                        }
                        echo "<br>";
                        echo "<br>";
                    }
                }

    ?>