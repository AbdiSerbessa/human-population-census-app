<?php
            

                $sessionId = $_SESSION['id'] ?? '';
                $sessionRole = $_SESSION['role'] ?? '';
                $superquery="select supervisor_id from enumerators where enumerator_id='$sessionId'";
                //echo $superquery;
                $superresult = mysqli_query( $connection, $superquery );
                while($superrow=mysqli_fetch_assoc($superresult)){
                    $s=$superrow['supervisor_id'];
                }
                echo'<div class="main__form--title text-center">Messages</div>';
                if($sessionRole=='enumerator')
                $query = "SELECT *,supervisors.fname as na,supervisors.lname as la FROM notification inner join enumerators on notification.receiver=enumerators.enumerator_id inner join supervisors on notification.sender=supervisors.supervisor_id  where receiver= '$sessionId' order by not_id desc";
                if($sessionRole=='supervisor')
                $query = "SELECT * FROM notification inner join enumerators on notification.sender=enumerators.enumerator_id where receiver= '$sessionId' order by not_id desc";
                //echo $query;
                    
                    
                    ?>
                    <form action="" method="POST">
                    
                    <?php
                    $result = mysqli_query( $connection, $query );
                    while($row=mysqli_fetch_assoc($result))
                    
                    {
                        
                        $sessionRole=='enumerator'?$name=$row['na']." ".$name=$row['la']:$name=$row['fname']." ".$row['lname'];
                        
                        echo"<div class=\"message-list\">
                            <span class=\"from\">From: {$name}</span>
                            <span class=\"date\">date:{$row['date']}</span>
                            <span class=\"message\">{$row['message']}</span>
                            <button name =\"Send\" style=\"margin-left:70%\"class=\"btn btn-primary\" type=\"submit\" value=\"{$row['sender']}\">Reply</button>
                            </div>";
                        
                    }
                    ?></form>
                    <?php 
                    if($sessionRole=='supervisor'){?>
                    <a style="position:absolute;top:13%;" class = "newButton" href= "cms.php?id=send_message">
                <i class= "fas fa-user-plus"> New message</i>
                </a>  
                <?php } else if($sessionRole=='enumerator'){
                     ?>
                    <a style="position:absolute;top:13%;" class = "newButton" href= "cms.php?id=send_message&super=<?php echo $s ?>">
                <i class= "fas fa-user-plus"> New Message</i>
                </a>  
                <?php }?>
                    <?php
            
                    if(isset($_POST['Send'])){
                
                $sessionId = $_SESSION['id'] ?? '';
                $senderId=$_POST['Send'];
                echo $senderId;
                echo "<script type=\"text/javascript\">
           
            window.location = \"cms.php?id=send_message&sender=$senderId\";
  </script>";
        }
            ?>