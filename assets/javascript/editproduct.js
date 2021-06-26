$(document).ready(() => {

    const urlParams = new URLSearchParams(window.location.search);
    const editid = urlParams.get('editid');

    if (editid) {
        const formdata = new FormData();
        formdata.append("editid", editid)
        axios({
                method: 'post',
                url: '../../controller/editProduct.php',
                data: formdata
            }).then(res => {
                if (res.data.status === "success") {
                    createUpdateForm(res.data.data);
                } else {
                    alert(res.data.message)
                }
            })
            .catch(err => { console.error(err) })
    }


    function createUpdateForm(data) {
        document.getElementById("name").value = data.pname
        document.getElementById("price").value = data.price
        document.getElementById("qty").value = data.qty
        document.getElementById("id").value = data.id
        document.getElementById("editor1").value = data.details

    }

    $('#btn').click((e) => {
        e.preventDefault()

        const form = $('form')[0]

        const formData = new FormData(form);
        var data = CKEDITOR.instances.editor1.getData();
        formData.append('description', data)

        axios({
                method: 'post',
                url: '../../controller/editProduct.php',
                data: formData
            })
            .then(res => {
                if (res.data.status === "success") {
                    $("#alert").append(` <div class="alert alert-primary" role="alert">
                        ${res.data.message}
                        </div>`)
                    setTimeout(() => {
                        $("#alert").empty()
                        location.href = "managePosts.php"
                    }, 3000)
                } else {
                    $("#alert").append(` <div class="alert alert-warning" role="alert">
                            ${res.data.message}
                        </div>`)
                    setTimeout(() => {
                        $("#alert").empty()
                    }, 3000)
                }
            })
            .catch(err => console.log(err))

    })

})