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
            <a href="./addProduct.php"><i class="fa fa-plus-circle mr-1"></i><Span class="hidden">Add
                    Products</Span></a>
            <a href="./orders.php"><i class="fa fa-first-order mr-1"></i><span class="hidden">Orders</span></a>
            <a href="./messages.php"><i class="fa fa-comments mr-1"></i><span class="hidden">Messages</span></a>
            <a href="./settings.php" class="active"><i class="fa fa-cog mr-1"></i><span
                    class="hidden">Settings</span></a>
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
            <!--page title-->
            <div class="ml-md-5 ml-sm-4 ml-xs-4 mt-3">
                <h3>Settings <i class="fa fa-cog mr-1"></i></h3>
            </div>
            <!--page title ends-->
            <!--social settings-->
            <div class="ml-md-5 ml-sm-4 ml-xs-4 mt-5">
                <div class="col-md-7 m-auto">
                    <h6>--Update Social Links <i class="fa fa-cog mr-1"></i></h6>
                    <div class="loginform bg-white p-5 shadow">
                        <form action="" method="post" class="form-group" id="social">
                            <div id="alert">

                            </div>
                            <label>Instagram Link</label>
                            <input type="url" name="instagram" id="instagram" class="form-control mb-3 bg-light"
                                required>
                            <label>Email </label>
                            <input type="email" name="email" id="email" class="form-control mb-3 bg-light" required>
                            <label>Facebook</label>
                            <input type="url" name="facebook" id="facebook" class="form-control mb-3 bg-light" required>
                            <label>Whatsapp</label>
                            <input type="url" name="whatsapp" id="whatsapp" class="form-control mb-3 bg-light" required>
                            <label>Phone</label>
                            <input type="tel" name="phone" id="phone" class="form-control mb-3 bg-light" required>
                            <button class="btn text-dark float-right" id="btn">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <!--social settings-->
            <!--Create a New login-->
            <div class="ml-md-5 ml-sm-4 ml-xs-4 mt-5 mb-4">
                <div class="col-md-7 m-auto">
                    <h6>--Update your login<i class="fa fa-cog mr-1"></i></h6>
                    <div class="loginform bg-white p-5 shadow">
                        <form action="" method="post" class="form-group" id="login">
                            <div id="alert2">
                            </div>
                            <input type="email" name="email" id="loginemail" placeholder="Email"
                                class="form-control mb-3 bg-light" required>
                            <input type="password" name="password" id="password" placeholder="Password"
                                class="form-control mb-3 bg-light" required>
                            <button class="btn  btn-success text-white float-right" id="btn2">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <!--Create a New login-->
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="../../assets/javascript/logout.js"></script>
    <script>
    $(document).ready(() => {


        $('#btn').click((e) => {
            e.preventDefault()

            const form = $('#social')[0]

            const formData = new FormData(form);


            axios({
                    method: 'post',
                    url: '../../controller/sociallinks.php',
                    data: formData
                })
                .then(res => {
                    if (res.data.status === "success") {
                        $("#alert").append(` <div class="alert alert-primary" role="alert">
                    ${res.data.message}
                    </div>`)
                        setTimeout(() => {
                            $("#alert").empty()
                            location.href = "index.php"
                        }, 3000)
                    } else {
                        $("#alert").append(` <div class="alert alert-warning" role="alert">
                        ${res.data.message}
                    </div>`)
                        setTimeout(() => {
                            $("#alert").empty()
                        }, 3000)
                    }
                    console.log(res);
                })
                .catch(err => console.log(err))

        })

        axios.get("../../controller/sociallinks.php?action=fetch")
            .then(res => {
                if (res.data.status === "success") {
                    document.getElementById("facebook").value = res.data.sociallinks.facebook
                    document.getElementById("whatsapp").value = res.data.sociallinks.whatsapp
                    document.getElementById("instagram").value = res.data.sociallinks.instagram
                    document.getElementById("phone").value = res.data.sociallinks.phone
                    document.getElementById("email").value = res.data.sociallinks.email

                }
            })
            .catch(err => console.error(err))


        $('#btn2').click((e) => {
            e.preventDefault()

            const form = $('#login')[0]

            const formData = new FormData(form);
            formData.append("updatelogin", "updatelogin");


            axios({
                    method: 'post',
                    url: '../../controller/login.php',
                    data: formData
                })
                .then(res => {
                    if (res.data.status === "success") {
                        $("#alert2").append(` <div class="alert alert-primary" role="alert">
                    ${res.data.message}
                    </div>`)
                        setTimeout(() => {
                            $("#alert2").empty()
                            location.href = "index.php"
                        }, 3000)
                    } else {
                        $("#alert2").append(` <div class="alert alert-warning" role="alert">
                        ${res.data.message}
                    </div>`)
                        setTimeout(() => {
                            $("#alert2").empty()
                        }, 3000)
                    }
                    console.log(res);
                })
                .catch(err => console.log(err))

        })

    })
    </script>
</body>

</html>