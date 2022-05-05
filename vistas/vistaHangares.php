<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <video src="" id="video"></video>

        <script>
            navigator.mediaDevices.enumerateDevices().then(devices => {
                const videoDevices = devices.filter(device => device.kind === 'videoinput');
                console.log(videoDevices);
            });
            /*navigator.getUserMedia = navigator.getUserMedia ||
                    navigator.webkitGetUserMedia ||
                    navigator.mozGetUserMedia;*/

            if (navigator.getUserMedia) {
                navigator.getUserMedia({video: {deviceId: "c2655272c9adb45654daacc93842ee0bd8adc135188fc19a92de686b49b41c53"}},
                        function (stream) {
                            var video = document.querySelector('video');
                            video.srcObject = stream;
                            video.onloadedmetadata = function (e) {
                                video.play();
                            };
                        },
                        function (err) {
                            console.log("The following error occurred: " + err.name);
                        }
                );
            } else {
                console.log("getUserMedia not supported");
            }
        </script>
    </body>
</html>
