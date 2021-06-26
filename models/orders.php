<?php

require_once '../config/connection.php';

class Orders extends Connection {

    public static function bookOrder($qty,$productname,$productid,$address,$name,$email){
        $data = [];
        $orderid = uniqid();
        $productname = self::filter($productname);
        $productid = self::filter($productid);
        $qty = self::filter($qty);
        $address = self::filter($address);
        $name= self::filter($name);
        $email = self::filter($email);
        $createdAt = date("y-m-d");

        $sql = "INSERT INTO orders (orderid,productid,productname,qty,full_address,full_name,email,createdAt) VALUES (?,?,?,?,?,?,?,?)";
        $query = self::$connect->prepare($sql);
        $query->bind_param("sisissss",$orderid,$productid,$productname,$qty,$address,$name,$email,$createdAt);
        $query->execute();
        if($query->affected_rows > 0){
            $heremail = "ms.boujeelasheshair@gmail.com";
            $emailBody = "
            <center>
               <p>these are details of the newly created order</p>
               <table>
               <thead>
               <th>orderid</th>
               <th>productname</th>
               <th>productid</th>
               <th>qty</th>
               <th>customer's name</th>
               <th>Full Address</th>
               <th>email</th>
               <th>created At</th>
               </thead>
               <tbody>
               <tr>
               <td>'$orderid'</td>
               <td>'$productname'</td>
               <td>'$productid'</td>
               <td>'$qty'</td>
               <td>'$name'</td>
               <td>'$address'</td>
               <td>'$email'</td>
               <td>'$createdAt'</td>
               </tr>
               </tbody>
               </table>
            </center>
            ";
            self::sendmail($email,$name,'order invoice',$emailBody);
            self::sendmail($heremail,'Ms.BoujeeLashes&Hair','a new order',$emailBody);
            $data = [
                "status" => "success",
                "message" => "order placed successfully. your order id =".$orderid
            ];
        }else{
              $data = [
                  "status" => "failed",
                  "message" => "unable to place your order at the moment due to server error please contact the vendor :".$query->error
              ];
        }
            return json_encode($data);
            $query->close();
                    
    }

    public static function getorders(){
        $data = [];
        $sql = "SELECT * FROM orders";
        $query = self::$connect->prepare($sql);
        $query->execute();
        $result = $query->get_result();
        if($query->affected_rows > 0){
               while($row = $result->fetch_object()){
                   $data["status"] = "success";
                   $data[$row->id] = $row;
               }
        }else{
            $data = [
                "status" => "failed",
                "message" => "No orders found :".$query->error
            ];
        }
        return json_encode($data);
        $query->close();
    }

    public static function deleteOrder($id){
        $data = [];
        $id = self::filter($id);
        $sql = "DELETE FROM orders WHERE id =?";
        $query = self::$connect->prepare($sql);
        $query->bind_param("i",$id);
        $query->execute();
        if($query->affected_rows > 0){
            //send mail here
            $heremail = "ms.boujeelasheshair@gmail.com";
            $emailBody = "
            <center>
               <p>these are details of the newly created order</p>
            </center>
            ";
            self::sendmail($heremail,"ms.boujeelashes&hairs",'order invoice',$emailBody);
            $data = [
                'status' => 'success',
                'message' => 'order deleted successfully'
            ];
        }else{
            $data = [
                'status' => 'failed',
                'message' => 'unable to delete order :'.$query->error
            ];
        }
        return json_encode($data);
        $query->close();  
    }

    public static function totalOrders(){
        $data = [];
        $sql = "SELECT COUNT(id) FROM orders";
        $query = self::$connect->prepare($sql);
        $query->execute();
        $data = $query->get_result();
        if ($data->num_rows > 0) {
             $row = $data->fetch_array();
             $data = [
                 'status' => 'success',
                 'totalOrders' => $row[0]
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