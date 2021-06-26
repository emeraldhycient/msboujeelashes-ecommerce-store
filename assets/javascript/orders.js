$(document).ready(() => {

    const urlParams = new URLSearchParams(window.location.search);
    const deleteid = urlParams.get('deleteid');

    if (deleteid) {
        const formdata = new FormData();
        formdata.append("deleteid", deleteid)
        axios({
                method: 'post',
                url: '../../controller/getAllOrder.php',
                data: formdata
            }).then(res => {
                if (res.data.status === "success") {
                    alert(res.data.message)
                    location.href = "./orders.php"
                } else {
                    alert(res.data.message)
                }
                console.log(res);
            })
            .catch(err => { console.error(err) })
    }

    axios.get('../../controller/getAllOrder.php?action=fetch')
        .then(res => {
            allOrder(res.data)
        })
        .catch(err => { console.error(err) })

    const allOrder = (res) => {
        const data = Object.values(res)
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
                <td><button class="btn btn-danger"><a href="./orders.php?deleteid=${item.id}"><i class="fa fa-trash"></i></a></button></td>
            </tr>
                  `
                $("tbody").append(temp)
            })
        } else {
            $("tbody").append(`<p>${res.message}</p>`)
        }
    }

    axios.get('../../controller/getAllOrder.php?action=total')
        .then(res => {
            $("#ordercount").append(`<h6> <strong>${res.data.totalOrders}</strong> </h6>`)

        })
        .catch(err => { console.error(err) })

})