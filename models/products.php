<?php

require_once '../config/connection.php';

class Products extends Connection {
    public static function addProduct($name,$price,$qty,$category,$imgI,$imgII,$imgIII,$description){
        $data = [];
       $userid = $_SESSION["loggedin"];
       $name = self::filter($name);
        $price = self::filter($price);
        $qty = self::filter($qty);
        $cat = self::filter($category);
        $imageIext = pathinfo($imgI['name'],PATHINFO_EXTENSION);
        $imageI = uniqid().".".$imageIext ;
        $uploadpath1 = "../assets/images/".$imageI;
        $imageIIext = pathinfo($imgII['name'],PATHINFO_EXTENSION);
        $imageII = uniqid().".".$imageIIext ;
        $uploadpath2 = "../assets/images/".$imageII;
        $imageIIIext = pathinfo($imgIII['name'],PATHINFO_EXTENSION);
        $imageIII = uniqid().".".$imageIIIext ;
        $uploadpath3 = "../assets/images/".$imageIII;
        $date = date("Y-m-d");
        $description = $description;

        //check image extension
        if (in_array($imageIext, ['gif','png','jpeg','jpg']) && in_array($imageIIext, ['gif','png','jpeg','jpg']) && in_array($imageIIIext, ['gif','png','jpeg','jpg'])) {
           
            if(move_uploaded_file($imgI["tmp_name"],$uploadpath1) && move_uploaded_file($imgII["tmp_name"],$uploadpath2) && move_uploaded_file($imgIII["tmp_name"],$uploadpath3) ){
                $sql = "INSERT INTO product (userid,pname,price,qty,category,image1,image2,image3,details,createdAt) VALUES(?,?,?,?,?,?,?,?,?,?)";
                $query = self::$connect->prepare($sql);
                $query->bind_param("ssiissssss",$userid,$name,$price,$qty,$cat,$imageI,$imageII,$imageIII,$description,$date);
                $query->execute();
                if($query->affected_rows > 0){
                    //send mail here
                    $heremail = "ms.boujeelasheshair@gmail.com";
                    $date = date("y-m-d");
                    $emailBody = "
                    <center>
                       <p>your dashboard at <a href='https://www.Ms.BoujeeLashes&Hair.com'>Ms.BoujeeLashes&Hair</a>
                       was accessed on '$date' if it wasnt you, quickly change your password
                       </p>
                       <p>
                       a new product was added 
                       </p>
                    </center>
                    ";
                self::sendmail($heremail, 'Ms.BoujeeLashes&Hair', 'an action on your Ms.BoujeeLashes&Hair website dashboard', $emailBody);
                    $data = [
                        'status' => 'success',
                        'message' => 'product uploaded successfully',
                        'data' => [
                            $userid,$name,$price,$qty,$cat,$imageI,$imageII,$imageIII,$description,$imageIext,$imageIIext,$imageIIIext              
                            ]
                    ];
                }else{
                    $data = [
                        'status' => 'failed',
                        'message' => 'upload failed due to :'.$query->error,
                        'data' => [
                            $userid,$name,$price,$qty,$cat,$imageI,$imageII,$imageIII,$description,$imageIext,$imageIIext,$imageIIIext              
                            ]
                    ];
                }
            }else{
                $data = [
                    'status' => 'failed',
                    'message' => 'unable to upload image',
                    'data' => [
                        $userid,$name,$price,$qty,$cat,$imageI,$imageII,$imageIII,$description,$imageIext,$imageIIext,$imageIIIext              
                        ]
                ];
            }
        }else{
            $data = [
                'status' => 'failed',
                'message' => 'Select image of any of type gif,png,jpeg,jpg',
                'data' => [
                    $userid,$name,$price,$qty,$cat,$imageI,$imageII,$imageIII,$description,$imageIext,$imageIIext,$imageIIIext              
                          ]
            ];
        }
       
        return json_encode($data);
        $query->close();  

    }
    public static function deleteProduct($id){
        $data = [];
        $id = self::filter($id);
        $sql = "DELETE FROM product WHERE id =?";
        $query = self::$connect->prepare($sql);
        $query->bind_param("i",$id);
        $query->execute();
        if($query->affected_rows > 0){
            //send mail here
            $heremail = "ms.boujeelasheshair@gmail.com";
            $date = date("y-m-d");
            $emailBody = "
            <center>
               <p>your dashboard at <a href='https://www.Ms.BoujeeLashes&Hair.com'>Ms.BoujeeLashes&Hair</a>
               was accessed on '$date' if it wasnt you, quickly change your password

               a product with this id : '$id' was deleted
               </p>
            </center>
            ";
        self::sendmail($heremail, 'Ms.BoujeeLashes&Hair', 'an action  on your Ms.BoujeeLashes&Hair website dashboard', $emailBody);
            $data = [
                'status' => 'success',
                'message' => 'product deleted successfully'
            ];
        }else{
            $data = [
                'status' => 'failed',
                'message' => 'unable to delete product :'.$query->error
            ];
        }
        return json_encode($data);
        $query->close();  
    }
    public static function editProduct($id,$name,$price,$qty,$category,$description){
        $data = [];
        $id = $id;
       $name = self::filter($name);
        $price = self::filter($price);
        $qty = self::filter($qty);
        $cat = self::filter($category);
        $description = $description;
    
                $sql = "UPDATE product SET pname=?,price=?,qty=?,category=?,details=? WHERE id = ?";
                $query = self::$connect->prepare($sql);
                $query->bind_param("siissi",$name,$price,$qty,$cat,$description,$id);
                $query->execute();
                if($query->affected_rows > 0){
                    //send mail here
                    $heremail = "ms.boujeelasheshair@gmail.com";
                    $date = date("y-m-d");
                    $emailBody = "
                    <center>
                       <p>your dashboard at <a href='https://www.Ms.BoujeeLashes&Hair.com'>Ms.BoujeeLashes&Hair</a>
                       was accessed on '$date' if it wasnt you, quickly change your password
    
                       a product with this id : '$id' was edited
                       </p>
                    </center>
                    ";
                self::sendmail($heremail, 'Ms.BoujeeLashes&Hair', 'an action on your Ms.BoujeeLashes&Hair website dashboard', $emailBody);
                    $data = [
                        'status' => 'success',
                        'message' => 'product update successfully',
                        'data' => [
                            $name,$price,$qty,$cat,$description            
                            ]
                    ];
                }else{
                    $data = [
                        'status' => 'failed',
                        'message' => 'update failed due to :'.$query->error,
                        'data' => [
                            $name,$price,$qty,$cat,$description            
                            ]
                    ];
                }
          
        return json_encode($data);
        $query->close();  

    }
    public static function fetchOne($id){
        $id = self::filter($id);
        $data = [];
        $sql = 'SELECT * FROM `product` WHERE id = ?';
        $query = self::$connect->prepare($sql);
        $query->bind_param("i",$id);
        $query->execute();
        $result = $query->get_result();
        if($result->num_rows > 0){
            while ($row = $result->fetch_object()) {
                $data['status'] = 'success';
                $data["data"] = $row ;
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
    public static function fetchCategory($cat){
        $data = [];
        $cat = self::filter($cat);
        $sql = 'SELECT * FROM product WHERE category = ?';
        $query = self::$connect->prepare($sql);
        $query->bind_param("s",$cat);
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
    public static function fetchAll(){
        $data = [];
        $sql = 'SELECT * FROM product ORDER BY id DESC';
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

      public static function totalProduct(){
          $data = [];
          $sql = "SELECT COUNT(id) FROM product";
          $query = self::$connect->prepare($sql);
          $query->execute();
          $data = $query->get_result();
          if ($data->num_rows > 0) {
               $row = $data->fetch_array();
               $data = [
                   'status' => 'successful',
                   'totalProduct' => $row[0]
               ];
          }else{
            $data = [
                'status' => 'successful',
                'message' => $query->error
            ];
          }
          return json_encode($data);
          $query->close();  
      }

}