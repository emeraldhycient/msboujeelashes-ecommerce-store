$(document).ready(() => {


    const urlParams = new URLSearchParams(window.location.search);
    const cat = urlParams.get('cat');
    $("#action").append(`${cat}`)


    axios.get(`../controller/category.php?cat=${cat}`)
        .then(res => {
            const val = Object.values(res.data)
            allProduct(val)
        })
        .catch(err => { console.error(err) })

    const allProduct = (data) => {
        data.map((item) => {
            const temp = `
              <div class="mb-4 p-2 shadow" id="card" data-aos="flip-left" data-aos-duration="2000">
                    <img src="../assets/images/${item.image1}" class="productsimage" alt="">
                    <div class="mt-3 text-muted p-2">
                        <h6 style="overflow-wrap: break-word;">${item.pname}</h6>
                        <div class="d-flex">
                            <i class="fa fa-dollar"></i>
                            <h6>${item.price.toLocaleString()}</h6>
                        </div>
                        <button class="btn btn-sm w-100 mt-2" id="btn"><a href="./details.html?productId=${item.id}" class="text-success">View Product</a> </button>
                    </div>
                </div>
              `
            $("#allproduct").append(temp)
        })
    }

})