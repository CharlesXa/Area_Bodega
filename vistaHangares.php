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
            navigator.mediaDevices.getUserMedia({video: true}).then((stream)=>{
                console.log(stream);
                
                let video = document.getElementById('video');
                video.srcObject = stream;
                
                video.onloadedmetadata = (ev) => video.play();
            }).catch((err)=>console.log(err));
        </script>
    </body>
</html>
