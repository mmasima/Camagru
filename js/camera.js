const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const snap = document.getElementById('snap');
const apply = document.getElementById('apply');
// const apply = document.getElementById('apply');
const peace = document.getElementById('peace');
const arrow = document.getElementById('arrow');
const apex = document.getElementById('apex');
feed();
var context = canvas.getContext('2d');
snap.addEventListener("click", function () {
    context.drawImage(video, 0, 0, 300, 300);
});
function feed() {
    var constrains = {
        video: { width: 300, height: 300 }
    };
    navigator.mediaDevices.getUserMedia(constrains).then(stream => {
        video.srcObject = stream;
    });
}
apply.addEventListener("click", function() {
    var x = document.getElementById('stickers').value;
    if (x == "peace")
        context.drawImage(peace, 50, 50, 80, 80);
    else if (x == "arrow")
        context.drawImage(arrow, 80, 20, 80, 80);
    else if (x == "apex")
        context.drawImage(apex, 20, 80, 80, 80);
    else
        context.drawImage(video, 0, 0, 300, 300);
})
var save = document.getElementById("save");
save.addEventListener("click", function () {
    var data = "img=" + canvas.toDataURL();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            this.responseText;
        }
    };
    xhttp.open("POST", "../controller/upload_images.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(data);
    window.location = "../view/images.php";
});