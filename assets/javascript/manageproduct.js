$(document).ready(() => {

    const urlParams = new URLSearchParams(window.location.search);
    const deleteid = urlParams.get('deleteid');

    if (deleteid) {
        const formdata = new FormData();
        formdata.append("deleteid", deleteid)
        axios({
                method: 'post',
                url: '../../controller/delete.php',
                data: formdata
            }).then(res => {
                if (res.data.status === "success") {
                    alert(res.data.message)
                    location.href = "./managePosts.php"
                } else {
                    alert(res.data.message)
                }
            })
            .catch(err => { console.error(err) })
    }

    axios.get('../../controller/getAllProduct.php?action=fetch')
        .then(res => {
            allProduct(res.data)
        })
        .catch(err => { console.error(err) })

    const allProduct = (res) => {
        const data = Object.values(res)
        if (res.status === "success") {
            data.map((item) => {
                const temp = `
                <tr>
                <td>${item.id}</td>
                <td> <img src="../../assets/images/${item.image1}" alt="" class="recentimg"> </td>
                <td>${item.image1}</td>
                <td class="d-flex justify-content-center align-content-center">     <i class="fa fa-dollar mr-1"></i>
                <h6>${item.price.toLocaleString()}</h6>
                </div>
                </td>
                <td>${item.qty}</td>
                <td class="col-sm-12">
                ${item.details}
                </td>
                <td>${item.createdAt}</td>
                <td><button class="btn btn-danger"><a href="./managePosts.php?deleteid=${item.id}"><i class="fa fa-trash text-white"></i></a></button><button class="btn btn-primary"><a href="./editProduct.php?editid=${item.id}"><i class="fa fa-edit text-white"></i></a></button></td>
            </tr>
                  `
                $("tbody").append(temp)
            })
        } else {
            $("tbody").append(`<p>${res.message}</p>`)
        }
    }

    axios.get('../../controller/getAllProduct.php?action=total')
        .then(res => {
            $("#productcount").append(`<h6> <strong>${res.data.totalProduct}</strong> </h6>`)

        })
        .catch(err => { console.error(err) })

})