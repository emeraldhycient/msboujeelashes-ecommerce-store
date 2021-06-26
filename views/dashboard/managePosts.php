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
            <a href="./managePosts.php" class="active"><i class="fa fa-tag mr-1"></i><span class="hidden">All
                    Products</span></a>
            <a href="./addProduct.php"><i class="fa fa-plus-circle mr-1"></i><Span class="hidden">Add
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
                <div class="row pl-2">

                    <div class="col-md-3 mt-3">
                        <div id="dash-card" class="shadow">
                            <div class="d-flex justify-content-between">
                                <h6>Products</h6>
                                <i class="fa fa-tag mr-1 dash-icon-circle fa-2x "></i>
                            </div>
                            <div class="badge badge-primary" id="productcount">

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- ending point of the top cards-->

            <!-- start of recent upload and recent orders-->
            <div class="ml-md-5 ml-sm-4 ml-xs-4 mt-3">
                <div class="row pl-2">

                    <!--start of upload -->
                    <div class="col-md-12 mt-4">
                        <div class="shadow uploads" style="overflow-y: auto;">
                            <div class="d-flex justify-content-between">
                                <h6>
                                    <strong>Products</strong>
                                </h6>
                                <div class="d-flex justify-content-around">
                                    <button class="btn"><a href="./addProduct.php"><i
                                                class="fa fa-plus mr-1"></i></a></button>
                                    <i class="fa fa-tag mr-1 dash-icon-circle"></i>
                                </div>
                            </div>
                            <hr>
                            <div class="" style="overflow: auto;" id="table">
                                <table class="table table-bordered table-striped" width='100%'>
                                    <thead>
                                        <th>id</th>
                                        <th></th>
                                        <th><small>Products Name</small></th>
                                        <th><small>Price</small></th>
                                        <th><small>Qty</small></th>
                                        <th><small>Description</small></th>
                                        <th><small>Date</small></th>
                                        <th><small>Action</small></th>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--end of upload-->

                    <!--start of recent orders-->

                    <!--end of recent orders-->
                </div>
            </div>
            <!--end of recent upload and recent orders -->
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="../../assets/javascript/logout.js"></script>
    <script src="../../assets/javascript/manageproduct.js"></script>
</body>

</html>