const logout = document.getElementById("logout")

logout.addEventListener("click", (e) => {
    axios.get('../../controller/login.php?action=logout')
        .then(res => {
            if (res.data.status === "success") {
                alert(res.data.message);
                location.href = "../login.html"
            } else {
                alert(res.data.message);
            }
        })
        .catch(err => { console.error(err) })
})