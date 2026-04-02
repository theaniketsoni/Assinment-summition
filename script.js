function validateFile() {
    let file = document.getElementById("file").value;
    if(file === ""){
        alert("Upload file!");
        return false;
    }
    return true;
}
