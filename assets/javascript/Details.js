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