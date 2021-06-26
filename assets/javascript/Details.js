function up(max) {
    document.getElementById("qty").value = parseInt(document.getElementById("qty").value) + 1;
    if (document.getElementById("qty").value >= parseInt(max)) {
        document.getElementById("qty").value = max;
    }
}

function down(min) {
    document.getElementById("qty").value = parseInt(document.getElementById("qty").value) - 1;
    if (document.getElementById("qty").value <= parseInt(min)) {
        document.getElementById("qty").value = min;
    }
}

function grabQty() {
    const qty = document.getElementById("qty").value
    document.getElementById("qty2").value = qty

}

$(document).ready(() => {

    const sendbtn = document.getElementById("sendmssg");
    sendbtn.addEventListener("click", (e) => {
        e.preventDefault()

        const name = document.getElementById("yourname").value
        const email = document.getElementById("youremail").value
        const message = document.getElementById("yourmessage").value

        const formdata = new FormData();
        formdata.append("name", name)
        formdata.append("email", email)
        formdata.append("message", message)

        axios.post("../controller/sendMessages.php", formdata)
            .then(res => {
                if (res.data.status === "success") {
                    $("#alert2").append(` <div class="alert alert-primary" role="alert">
                        ${res.data.message}
                        </div>`)
                    setTimeout(() => {
                        $("#alert2").empty()
                        location.reload();
                    }, 5000)
                } else {
                    $("#alert2").append(` <div class="alert alert-warning" role="alert">
                            ${res.data.message}
                        </div>`)
                    setTimeout(() => {
                        $("#alert2").empty()
                    }, 3000)
                }
            })
            .catch(err => console.error(err))

        return false
    })

    $(document).on("click", "#bookorder", (e) => {
        e.preventDefault()
        const pname = $("#productname").val()
        const id = $("#productid").val()
        const qty = $("#qty2").val()
        const email = $("#email").val()
        const address = $("#address").val()
        const name = $("#fullname").val()

        const formdata = new FormData()
        formdata.append("productname", pname)
        formdata.append("id", id)
        formdata.append("qty", qty)
        formdata.append("email", email)
        formdata.append("address", address)
        formdata.append("fullname", name)

        axios({
                url: "../controller/bookorder.php",
                method: "post",
                data: formdata
            })
            .then((res) => {
                if (res.data.status === "success") {
                    $("#alert").append(` <div class="alert alert-success" role="alert">
                    ${res.data.message}
                </div>`)
                    setTimeout(() => {
                        $("#alert").empty()
                    }, 5000)
                } else {
                    $("#alert").append(` <div class="alert alert-warning" role="alert">
                    ${res.data.message}
                </div>`)
                    setTimeout(() => {
                        $("#alert").empty()
                    }, 5000)
                }
            })
            .catch(err => console.log(err))


    })


    const urlParams = new URLSearchParams(window.location.search);
    const productId = urlParams.get('productId');

    axios.get(`../controller/fetchone.php?productId=${productId}`)
        .then((res) => {
            parseDetails(res.data)
        })
        .catch(err => console.error(err))


    const parseDetails = (data) => {
        let temp = "";
        if (data.status === "success") {
            const item = data.data;
            temp = `
                                 <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-6 bg-white shadow pt-1" id="imageContainer">
                            <img src="../assets/images/${item.image1}" style="width:100%;height:360px;">
                            <div class="imagelist mt-3">
                                <img src="../assets/images/${item.image1}" alt="">
                                <img src="../assets/images/${item.image2}" alt="">
                                <img src="../assets/images/${item.image3}" alt="">
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-3 mt-sm-3" id="btncontainer">
                            <div class="w-100 bg-white shadow pt-3 pl-2" id="priceConatiner">
                                <div class="d-flex mb-3 ml-3">
                                    <i class="fa fa-dollar mr-1 text-muted" style="font-weight: bolder;"></i>
                                    <h4 class="text-muted"><strong>${item.price.toLocaleString()}</strong></h4>
                                </div>
                                <div class="qty d-flex justify-content-around">
                                    <button class="btn" onclick="up(100)"><i class="fa fa-plus-circle" style="font-size: large;"></i></button>
                                    <input type="number" name="" id="qty" value="1" class="form-control input-sm counter">
                                    <button class="btn" onclick="down(1)"><i class="fa fa-minus-circle" style="font-size: large;"></i></button>
                                </div>
                                <center>
                                    <button class="btn btn-sm w-75 mt-4 text-success" data-toggle="modal" data-target="#order"  id="btn" onclick="grabQty()"><i class="fa fa-credit-card mr-1"></i>Buy Now</button>
                                </center>
                            </div>
                            <div class="w-100 bg-white  mt-3 shadow p-3" id="contactContainer">
                                <div class="d-flex justify-content-around">
                                    <div class="circle bg-dark mr-1">
                                        <i class="fa fa-user-circle fa-2x text-info"></i>
                                    </div>
                                    <div class="">
                                        <h6 class="">Ms.BoujeeLashes&Hair</h6>
                                        <p class="bg-light"><i class="fa fa-envelope-open text-warning"></i><small class="text-muted"> Instant Call Response</small></p>
                                    </div>
                                </div>
                                <center>
                                    <div class="">
                                        <button class="btn btn-success mt-2 w-100 btn-sm" id="btn">
                                        <a href="tel:+">
                                        <i class="fa fa-phone fa-2x text-white"></i>
                                        </a>
                                </button>
                                        <button class="btn btn-sm w-100 mt-2 text-success" data-toggle="modal" data-target="#exampleModalLong" id="btn"><i class="fa fa-envelope-o mr-1"></i>Message Seller</button>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-1"></div>
                        <div class="col-md-6 bg-white shadow pt-2">
                            <div class="pl-1">
                                <h4>Description :</h4>
                                <hr>
                            </div>
                            <div class="mt-2 text-muted">
                                <p>
                                   ${item.details}
                                </p>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                <!--order Modal -->
                <div class="modal fade" id="order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Message Seller</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <form class="form-group" method="post" id="order">
                                    <div id="alert">

                                    </div>
                                    <input type="hidden" name="productname" id="productname" value="${item.pname}" class="form-control col mr-1 input-sm">
                                    <input type="hidden" name="productid" id="productid" value="${item.id}" class="form-control col mr-1 input-sm">
                                    <input type="text" id="fullname" class="form-control col mr-1 input-sm" placeholder="Full Name">
                                        <div class="form-inline mb-2">
                                        <label>qty</label>
                                        <input type="number" name="" id="qty2" value="" class="form-control mb-2 mt-2 input-sm counter">
                                            <input type="text" id="email" class="form-control col mr-1 input-sm mb-2 mt-2" placeholder="Email">
                                        </div>
                                            <input type="text" id="address" class="form-control col mr-1 input-sm" placeholder="Full Address">
                                        <button type="submit" class="btn btn-primary btn-sm float-right mt-2" id="bookorder">send</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--order Modal -->
                                 `

        } else {
            temp = `
                                 <div class="m-5">
                                    <p>No Product With Such Id Found </p>
                                    <small>${data.message}</small>
                                    </div>
                             `
        }
        $("main").append(temp)
    }



})