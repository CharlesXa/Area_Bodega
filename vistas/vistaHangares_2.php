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
                navigator.getUserMedia({video: {deviceId: "bc137afd19998c02ddb274cefd41ab082fe4e9b49a85696c33adc386c93fcf21"}},
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
