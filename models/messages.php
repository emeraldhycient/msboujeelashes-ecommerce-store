<?php

require_once '../config/connection.php';

class Messages extends Connection {

    public static function sendMessage($name,$email,$message)
    {
        $data = [];
        $name = self::filter($name);
        $email = self::filter($email);
        $message= self::filter($message);

        $sql = "INSERT INTO messages (sendername,senderemail,messages) VALUES (?,?,?)";
        $query = self::$connect->prepare($sql);
        $query->bind_param("sss",$name,$email,$message);
        $query->execute();
        if($query->affected_rows > 0){
            $heremail = "ms.boujeelasheshair@gmail.com";
            $date = date("y-m-d");
            $emailBody = "
            <center>
            <h4>senders name : '$name'</h4>
            <h6>senders  email :'$email'</h6>
                <h6>
                   <p>message:</p>
                   <p>'$message'</p>
                </h6>
            </center>
            ";
        self::sendmail($heremail, 'Ms.BoujeeLashes&Hair', 'new message on your Ms.BoujeeLashes&Hair website dashboard', $emailBody);
            $data = [
                "status" => "success",
                "message" =>  "message sent successfully"
            ];
        }else{
             $data = [
                 "status" => "failed",
                 "message" => "unable to send message :".$query->error
             ];
        }

        return json_encode($data);
        $query->close();

    }

    public static function fetchMessage()
    {
        $data = [];
        $sql = 'SELECT * FROM messages ORDER BY id DESC';
        $query = self::$connect->prepare($sql);
        $query->execute();
        $result = $query->get_result();
        if($result->num_rows > 0){
            while ($row = $result->fetch_object()) {
                $data['status'] = 'success';
                $data[$row->id] = $row;
            }
        }else{
             $data = [
                 'status' => 'failed',
                 'message' => 'no data found'.$query->error
             ];
        }
        return json_encode($data);
        $query->close();  
    }

    public static function totalMessage(){
        $data = [];
        $sql = "SELECT COUNT(id) FROM messages";
        $query = self::$connect->prepare($sql);
        $query->execute();
        $data = $query->get_result();
        if ($data->num_rows > 0) {
             $row = $data->fetch_array();
             $data = [
                 'status' => 'success',
                 'totalMessage' => $row[0]
             ];
        }else{
          $data = [
              'status' => 'failed',
              'message' => "no data found"
          ];
        }
        return json_encode($data);
        $query->close();  
    }

}