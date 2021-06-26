$(document).ready(() => {

    axios.get('../../controller/getMessages.php?action=fetch')
        .then(res => {
            allmessages(res.data)
        })
        .catch(err => { console.error(err) })

    const allmessages = (res) => {
        const data = Object.values(res)
        if (res.status === "success") {
            data.map((item) => {
                const temp = `
                <div class="shadow uploads m-2">
                                <div class=""><i class="fa fa-user-circle fa-2x mb-1"></i></div>
                                <div class="card">
                                    <div class="card-header">${item.senderemail}</div>
                                    <div class="card-body">
                                            ${item.messages}
                                     </div>
                                    <div class="card-footer">
                                    ${item.sendername} ::::
                                    ${item.sentOn}
                                    </div>
                                </div>
                            </div>
                  `
                $("#messagesholder").append(temp)
            })
        } else {
            $("#messagesholder").append(`<p>${res.message}</p>`)
        }
    }

    axios.get('../../controller/getMessages.php?action=total')
        .then(res => {
            $("#messagecount").append(`<h6 class="text-white"> <strong>${res.data.totalMessage}</strong> </h6>`)

        })
        .catch(err => { console.error(err) })

})