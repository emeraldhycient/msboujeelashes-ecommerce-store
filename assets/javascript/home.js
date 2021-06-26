$(document).ready(() => {

    axios.get('./controller/getAllProduct.php?action=fetch')
        .then(res => {
            const val = Object.values(res.data)
            const tenval = val.slice(0, 15)
            popular(tenval)
        })
        .catch(err => { console.error(err) })


    const popular = (data) => {
        data.map((item) => {
            const temp = `
              <div class="mb-4 p-2 shadow" id="card" data-aos="flip-left" data-aos-duration="2000">
                    <img src="./assets/images/${item.image1}" class="productsimage" alt="">
                    <div class="mt-3 text-muted p-2">
                        <h6 style="overflow-wrap: break-word;">${item.pname}</h6>
                        <div class="d-flex">
                            <i class="fa fa-dollar"></i>
                            <h6>${item.price.toLocaleString()}</h6>
                        </div>
                        <button class="btn btn-sm w-100 mt-2" id="btn"><a href="./views/details.html?productId=${item.id}" class="text-success">View Product</a> </button>
                    </div>
                </div>
              `
            $("#productcontainer").append(temp)
                //$("#allproduct").append(temp)
        })
    }


})