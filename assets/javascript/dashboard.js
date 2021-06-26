$(document).ready(() => {

    axios.get('../../controller/getAllProduct.php?action=fetch')
        .then(res => {
            allProduct(res)
        })
        .catch(err => { console.error(err) })

    const allProduct = (res) => {
        const data = Object.values(res.data).slice(0, 5)
        if (res.data.status === "success") {
            data.map((item) => {
                const temp = `
                <tr>
                     <td> <img src="../../assets/images/${item.image2}" alt="" class="recentimg"> </td>
                      <td>${item.pname}</td>
                      <td class="d-flex justify-content-center align-content-center">     <i class="fa fa-dollar mr-1"></i>
                     <h6>${item.price.toLocaleString()}</h6>
                     </div>                              
                     <td>${item.qty}</td>
                     <td>${item.createdAt}</td>
                    </tr>
                  `
                $("#miniproductbody").append(temp)
            })
        } else {
            $("#miniproductbody").append(`<p>${res.message}</p>`)
        }

    }

    axios.get('../../controller/getAllProduct.php?action=total')
        .then(res => {
            $("#productcount").append(`<h6> <strong>${res.data.totalProduct}</strong> </h6>`)

        })
        .catch(err => { console.error(err) })

    axios.get('../../controller/getMessages.php?action=total')
        .then(res => {
            $("#messagecount").append(`<h6 class="text-white"><strong>${res.data.totalMessage}</strong> </h6>`)

        })
        .catch(err => { console.error(err) })

    axios.get('../../controller/getAllOrder.php?action=fetch')
        .then(res => {
            allOrder(res.data)
        })
        .catch(err => { console.error(err) })

    const allOrder = (res) => {
        const data = Object.values(res).slice(0, 5)
        if (res.status === "success") {
            data.map((item) => {
                const temp = `
                <tr>
                <td>${item.id}</td>
                <td>${item.orderid}</td>
                <td> ${item.productname} </td>
                <td>${item.productid}</td>
                <td>${item.qty}</td>
                <td>${item.full_name}</td>
                <td>${item.full_address}</td>
                <td>
                ${item.email}
                </td>
                <td>${item.createdAt}</td>
            </tr>
                  `
                $("#minordertable").append(temp)
            })
        } else {
            $("#minordertable").append(`<p>${res.message}</p>`)
        }
    }



})