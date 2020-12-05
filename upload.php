<?php

require('cloudconvert-php-3.0.0/vendor/autoload.php');


use CloudConvert\Api;


$api = new Api("eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMjFiOTgyMWM1MzcxMjM3YTFhOTg0ZDUzMTFmOTY0M2IzYjgxOTk2M2FiMGQzNzNmZDc3YjczNTBhY2YyYjNkYWZjMDE4NmJmN2QzYjYwOTQiLCJpYXQiOjE2MDcxMDU5MjYsIm5iZiI6MTYwNzEwNTkyNiwiZXhwIjo0NzYyNzc5NTI2LCJzdWIiOiI0NzI5MzY3OCIsInNjb3BlcyI6WyJ1c2VyLnJlYWQiLCJ1c2VyLndyaXRlIiwidGFzay5yZWFkIiwidGFzay53cml0ZSIsIndlYmhvb2sucmVhZCIsInByZXNldC5yZWFkIiwid2ViaG9vay53cml0ZSIsInByZXNldC53cml0ZSJdfQ.P8pMD6eW7kXLsc1A-5xO_XSoq6GUk98tocUedsXbeEet9Gsw_8aYwGTIFCAFOFvMWkV42WdE5ivBSpDgM3vKuGZ272XDs7StgnuhIIomWn2TBSQf6pxlfLRPyE2Ic66oygdpFYypyzMG7Tf0LMafjlpIZEhbAqJNLKmOcoB5OsVkcteVKvrruYc7s6t7OqnXE79jv3eyKTEEcFZt_A-yuRwDuNbawmntOEnBsjKCrqV0qyZGivENrcXIqLD6p8amGkejPlCIc9dzUtMgzUIbvq_iz2moOnHf2MatJgBNFlIcLHfGIDT9cUIKgFBqjyBSeB791BYxTWlMQBp622BWhA-I5TvhK_GeyAwNNE7z9HdGi6LDQX82-3PvaUGROJWSR4vx_GNw-O_2LoAVLt4WXA09nX8UtI8Fw8mSCIJYjg5jJiFmfeG05c-H8Z7LVgDjvJYc46mVQGzZv3EbgbmhI2B4l00ZATHszOpXvJaL62Xbsa2BNDEucz3ew924FqC-m-9OLpM8PIAz8hamlgxhQF35sLoCSL-lNUholei3HLXjDjCVOaAE5xr7m9NST71IO94mRk-M3WyzJB6mj79K89ruqGIwj7jUgMO-rse0XLlMrJc2nhHWhO7q8vbGVE7td9TYlybK7p4kwEc8OusKFyxitdtXIK6H3wsyYmGqd-w");

function test(){
if(!empty($_FILES["file"])){
 try {


    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $uploadFilePath = 'uploads/test.'.$ext;
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);


    $api->convert([
      'inputformat' => $ext,
      'outputformat' => 'pdf',
      'input' => 'upload',
      'file' => fopen($uploadFilePath, 'r'),
    ])
    ->wait()
    ->download('uploads/output.pdf');


 } catch (Exception $e) {
    echo "Something else went wrong: " . $e->getMessage() . "\n";
 }


  print_r("File change format successfully.");
  exit;
}else{
  print_r("Pls Select image");
  exit;
}
}

?>