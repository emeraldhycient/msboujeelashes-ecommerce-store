<?php

require_once '../config/connection.php';

class Auth extends Connection {

    public static function login($email,$password){
        $data = [];
        $email = self::filter($email);
        $password = self::filter($password);
        
        $sql = "SELECT * FROM user WHERE email =?";
        $query = self::$connect->prepare($sql);
        $query->bind_param("s",$email);
        $query->execute();
        $result = $query->get_result();
        if($result->num_rows > 0){
               while($row = $result->fetch_object()){
                   if(password_verify($password,$row->pass )){
                       //if($row->pass === $password){
                    $_SESSION["loggedin"] = $row->userid;
                    $_SESSION["email"] = $row->email;
                    $date = date("Y-m-d h:i:sa");
                    $agent = $_SERVER['HTTP_USER_AGENT'];
                    $emailBody = "
                        <center>
                           <p>your dashboard at <a href='https://www.Ms.BoujeeLashes&Hair.com'>Ms.BoujeeLashes&Hair</a>
                           was accessed on '$date' if it wasnt you, quickly change your password
        
                           login device detail :'$agent'
                           </p>
                        </center>
                        ";
                    self::sendmail($email, 'Ms.BoujeeLashes&Hair', 'a login on your Ms.BoujeeLashes&Hair website dashboard', $emailBody);
                    $data = [
                        "status" => "success",
                        "message" => "login successful"
                    ];
                   }else{
                    $data = [
                        "status" => "failed",
                        "message" => "please check the email or password"
                    ];
                   }
               }
        }else{
                 $data = [
                     "status" => "failed",
                     "message" => "no such user found"
                 ];
        }

     
      return json_encode($data);
      $query->close();
    } 

    public static function change($email,$password){
        $email = self::filter($email);
        $password = self::filter($password);
        $password = password_hash($password,PASSWORD_BCRYPT);
        $data = [];
        $oldmail = $_SESSION["email"];
        $sql = "UPDATE user SET email= ? , pass = ? WHERE email = ?";
        $query = self::$connect->prepare($sql);
        $query->bind_param('sss',$email,$password,$oldmail);
        $query->execute();
        if($query->affected_rows == 0 ){
            $data = array(
                'status' => 'failed',
                'Message'=> $query->error
            );
        }else{
            $date = date("Y-m-d h:i:sa");
            $email = $_SESSION["email"];
            $agent = $_SERVER['HTTP_USER_AGENT'];
            $emailBody = "
            <center>
               <p>your dashboard at <a href='https://www.Ms.BoujeeLashes&Hair.com'>Ms.BoujeeLashes&Hair</a>
               was accessed on '$date' if it wasnt you, quickly change your password

               a new login detail was created by this :'$agent'
               </p>
               <p>these are the newly created details</p>
               <table>
               <thead>
               <th>email</th>
               <th>password</th>
               </thead>
               <tbody>
               <tr>
               <td>'$email'</td>
               <td>'$password'</td>
               </tr>
               </tbody>
               </table>
            </center>
            ";
            self::sendmail($oldmail,'Ms.BoujeeLashes&Hair','your login details where updated',$emailBody);
            $data = array(
                'status' => 'success',
                'Message'=> 'update made successfully'
            );
        }

        return json_encode($data);
        $query->close();
    }

    public static function fetchSocialLinks()
    {
        $data = [];
        $sql = "SELECT * FROM  sociallinks";
        $query = self::$connect->prepare($sql);
        $query->execute();
        $result = $query->get_result();
        if($result->num_rows > 0 ){
            while($row = $result->fetch_object()){
                $data = array(
                    'status' => 'success',
                    'sociallinks'=> $row
                );
            }
        }else{
            $data = array(
                'status' => 'failed',
                'Message'=> 'unable to fetch social links'
            );
        }
        return json_encode($data);
        $query->close();
    }
    public static function updateSocialLinks($facebook,$email,$whatsapp,$phone,$instagram)
    {
        $data = [];
        $userid = $_SESSION["loggedin"];
        $sql = "UPDATE sociallinks SET email= ?, phone = ? , whatsapp = ?, facebook = ? , instagram = ?  WHERE userid =? ";
        $query = self::$connect->prepare($sql);
        $query->bind_param("ssssss",$email,$phone,$whatsapp,$facebook,$instagram,$userid);
        $query->execute();
        if($query->affected_rows > 0){
            $data = array(
                'status' => 'success',
                'Message'=> 'social links update updated successfully '
            );
        }else{
            $data = array(
                'status' => 'failed',
                'Message'=> 'unable to update social links'
            );
        }

        return json_encode($data);
        $query->close();
    }
    public static function logout()
    {
        $data = [];
        if(session_destroy()){
                  $data = [
                      "status" => "success",
                      "message" => "logout successful"
                  ];
        }else{
            $data = [
                "status" => "failed",
                "message" => "logout unsuccessful"
            ];
        }
        return json_encode($data);
    }
}