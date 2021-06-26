<?php

require_once "../../config/connection.php";

if(!isset($_SESSION["loggedin"])) die("<p>please proceed to login first <a href='../login.html'>here</a></p>")

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="../../assets/css/main.css" rel="stylesheet" type="text/css">
    <style>
    body {
        background-color: whitesmoke;
    }

    main {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100vh;
    }
    </style>

    <head>
        <title>msboujees 3D Lashes and human hair store</title>
    </head>

<body>

    <main>
        <div class="sidebar">
            <div class="bg-secondary">
                <H5 class="text-light">Dashboard</H5>
            </div>
            <a href="./index.php"><i class="fa fa-dashboard mr-1"></i><span class="hidden">Home</span></a>
            <a href="./managePosts.php"><i class="fa fa-tag mr-1"></i><span class="hidden">All Products</span></a>
            <a href="./addProduct.php" class="active"><i class="fa fa-plus-circle mr-1"></i><Span class="hidden">Add
                    Products</Span></a>
            <a href="./orders.php"><i class="fa fa-first-order mr-1"></i><span class="hidden">Orders</span></a>
            <a href="./messages.php"><i class="fa fa-comments mr-1"></i><span class="hidden">Messages</span></a>
            <a href="./settings.php"><i class="fa fa-cog mr-1"></i><span class="hidden">Settings</span></a>
            <button class="btn btn-danger btn-sm ml-2" id="logout" style="margin-top:30vh;">
                <i class="fa fa-fire-extinguisher mr-1"></i><span class="hidden">logout</span>
            </button>
        </div>
        <div class="maincontent">
            <!-- page header starts-->
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
                <h5 class="navbar-brand" href="#" style="font-family:Lucida Bright;">
                    Ms.BoujeeLashes&Hair
                </h5>
            </nav>
            <!-- page header starts-->

            <!-- starting point of the top cards-->
            <div class="ml-md-5 ml-sm-4 ml-xs-4 mt-3">
                <div class="row pl-4 pr-4">
                    <div class="col-md-10 m-auto shadow p-2" style="background-color: #fafafa;">
                        <form class="form-group" method="POST" id="addproduct" enctype="multipart/form-data">
                            <div id="alert">

                            </div>
                            <label>Name:</label>
                            <input type="" class="form-control mb-2" name="name" placeholder="Products Name" required>
                            <label>Price:</label>
                            <input type="number" class="form-control mb-2" name="price" placeholder="Price" required>
                            <label>Qty:</label>
                            <input type="number" class="form-control mb-2" name="qty" placeholder="Available  quantity"
                                required>
                            <label>category:</label>
                            <select name="category" name="category" class=" form-control bg-primary text-white"
                                required>
                                <option value="3D_Eyelashes">3D Eyelashes</option>
                                <option value="Human_Hair">Human Hair</option>
                                </option>
                            </select><br>
                            <div class="d-flex">
                                <input type="file" name="image1" class="form-control mb-2" required>
                                <input type="file" name="image2" class="form-control mb-2" required>
                                <input type="file" name="image3" class="form-control mb-2" required>
                            </div>
                            <label>Description:</label>
                            <textarea name="editor1" name="editor1" rows="10" cols="80" class="form-control" required> Talk about this Great Product in details...
                            </textarea>
                            <button type="submit" class="btn float-right mt-1" id="btn">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- ending point of the top cards-->


        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="../../assets/javascript/addProduct.js"></script>
    <script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="../../assets/javascript/logout.js"></script>

    <script>
    CKEDITOR.replace('editor1');
    </script>

</body>

</html>