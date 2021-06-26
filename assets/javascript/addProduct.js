$(document).ready(() => {


    $('#btn').click((e) => {
        e.preventDefault()

        const form = $('form')[0]

        const formData = new FormData(form);
        var data = CKEDITOR.instances.editor1.getData();
        formData.append('description', data)

        axios({
                method: 'post',
                url: '../../controller/addproducts.php',
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
            })
            .catch(err => console.log(err))

    })

})