
                    <div class="addGuest">
                        <div class="main__form">
                            <div class="main__form--title text-center">Send message</div>
                            <form onSubmit="return validateform()"   action="" method="POST">
                                <div class="form-row">
                                <div class="col col-12">
                                    <label class="input2">
                                    <?php

                                        $sessionId=$_SESSION['id'];
                                        if(isset($_GET['super']))
                                        {
                                            $sender=$_GET['super'];
                                            ?>To: <?php echo $sender;?>
                                        <?php }
                                        else if(isset($_GET['sender']))
                                        {
                                            $sender=$_GET['sender'];
                                            ?>To: <?php echo $sender;?>
                                        <?php }
                                        else
                                        {
                                            $sql2 = "SELECT * FROM enumerators where supervisor_id='$sessionId'";
                                            //echo $sql2;
                                            $result2 = $connection->query($sql2);
                                            echo '<div class="col col-12">
                                            <label class="input"> To:';
                                            echo'<select name="receiver">';
                                            while($row2 = $result2->fetch_assoc()) {
                                            
                                            echo '<option value="'.$row2['enumerator_id'].'">'.$row2['fname']." ".$row2['lname'].'</option>';
                                            
                                            }
                                        ?></select>
                                        <?php 
                                        }

                                        ?>
                                        
                                    </label>
                                </div>
                                <div class="col col-12">
                                    <label class="input2">
                                        
                                        <textarea rows= "15" cols="100" name="message" placeholder="your message..."  required></textarea>
                                    </label>
                                </div>
                                   
                                    <input type="hidden" name="action" value="feedback">
                                    
                                    <div class="col col-12">
                                        <input type="submit" name= "submit" value="Send">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
        <?php
        if(isset($_POST["submit"]))
        {
            
            
           $sessionId = $_SESSION['id'] ?? '';
            $now=date('d-m-y h:i:s');
            $message=$_POST['message'];
            if(isset($_POST['receiver']))
            {
                $sender=$_POST['receiver'];
                $query = "INSERT INTO notification(sender,receiver,message,date) VALUES ('{$sessionId}','{$sender}','{$message}','{$now}')";
            }
            else{
            $query = "INSERT INTO notification(sender,receiver,message,date) VALUES ('{$sessionId}','{$sender}','{$message}','{$now}')";

            }
            $query = "INSERT INTO notification(sender,receiver,message,date) VALUES ('{$sessionId}','{$sender}','{$message}','{$now}')";
            echo "$query";
            mysqli_query( $connection, $query ) or die(mysqli_error($connection));
            echo "<script type=\"text/javascript\">
            alert(\"Message sent Successfully\"); 
            window.location = \"cms.php\";
  </script>";
        }
        
        ?>   