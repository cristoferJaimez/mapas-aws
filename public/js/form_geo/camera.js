var text_64 = document.querySelector("#text_img")
var open_camera = document.querySelector("#camera_open")
var screamshot = document.querySelector("#startbutton")
var video = document.querySelector("#video")
var photo = document.querySelector("#photo")
var navigator;


try {
    function camera() {
        $('#camera_open').addClass('d-none')
        $('#photo').addClass('d-none')
        $("#video").removeClass("d-none")
        $("#startbutton").removeClass("d-none")
        try {


            var streaming = false,
                video = document.querySelector('#video'),
                canvas = document.querySelector('#canvas'),
                photo = document.querySelector('#photo'),
                startbutton = document.querySelector('#startbutton'),
                width = 300,
                height = 0;

            navigator.getMedia = (navigator.getUserMedia ||
                navigator.webkitGetUserMedia ||
                navigator.mozGetUserMedia ||
                navigator.msGetUserMedia ||
                navigator.mediaDevices.getUserMedia);

            navigator.getMedia({
                    video: {
                        width: { ideal: 1080 },
                        height: { ideal: 720 },
                        facingMode: ("environment")
                    },
                    audio: false,
                },
                function(stream) {
                    if (navigator.mozGetUserMedia) {
                        video.mozSrcObject = stream;
                    } else {
                        var vendorURL = window.URL || window.webkitURL;
                        var img = video.srcObject = stream;
                        //console.log(img);
                    }
                    video.play();
                },
                function(err) {
                    console.log("An error occured! " + err);
                }
            );

            video.addEventListener('canplay', function(ev) {
                if (!streaming) {
                    height = video.videoHeight / (video.videoWidth / width);
                    video.setAttribute('width', width);
                    video.setAttribute('height', height);
                    canvas.setAttribute('width', width);
                    canvas.setAttribute('height', height);
                    console.log(streaming);
                    streaming = true;
                }
            }, false);

            function takepicture() {
                canvas.width = width;
                canvas.height = height;
                canvas.getContext('2d').drawImage(video, 0, 0, width, height);
                var data = canvas.toDataURL('image/png');
                console.log(data);
                $(text_64).val(data)
                photo.setAttribute('src', data);
            }

            video.addEventListener('click', function(ev) {
                takepicture();
                $('#video').addClass('d-none')
                $('#camera_open').removeClass('d-none')
                $('#photo').removeClass('d-none')
                $("#startbutton").addClass("d-none")
                ev.preventDefault();
            }, false);

            screamshot.addEventListener('click', function(ev) {
                takepicture();
                $('#video').addClass('d-none')
                $('#camera_open').removeClass('d-none')
                $('#photo').removeClass('d-none')
                $("#startbutton").addClass("d-none")
                ev.preventDefault();
            }, false);
        } catch (error) {
            alert(error)
        }

    }
} catch (error) {
    alert(error)
}