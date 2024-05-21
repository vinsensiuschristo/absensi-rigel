// $(document).ready(function () {
//     // Configure a few settings and attach camera
//     Webcam.set({
//         width: 320,
//         height: 240,
//         image_format: "jpeg",
//         jpeg_quality: 100,
//     });
//     Webcam.attach("#my_camera");
// });

// preload shutter audio clip
var shutter = new Audio();

$(document).ready(function () {
    Webcam.set({
        image_format: "jpeg",
        jpeg_quality: 90,
    });

    Webcam.attach("#my_camera");
});

function take_snapshot() {
    Webcam.snap(function (data_uri) {
        $(".image-tag").val(data_uri);
        document.getElementById("results").innerHTML =
            '<img src="' + data_uri + '"/>';
    });
}

// let video = document.querySelector("#videoElement");

// if (navigator.mediaDevices.getUserMedia) {
//     navigator.mediaDevices
//         .getUserMedia({ video: true })
//         .then(function (stream) {
//             video.srcObject = stream;
//         })
//         .catch(function (error) {
//             console.log("Something went wrong!");
//         });
// } else {
//     console.log("getUserMedia not supported");
// }
// });

// function take_snapshot() {
//     console.log("Taking snapshot...");

//     // play sound effect
//     shutter.play();

//     // take snapshot and get image data
//     Webcam.snap(function (data_uri) {
//         // display results in page
//         document.getElementById("results").innerHTML =
//             '<img src="' + data_uri + '"/>';
//         document.getElementById("resultsvalue").innerHTML =
//             '<textarea name="image" hidden>' + data_uri + "</textarea>";
//     });
// }
