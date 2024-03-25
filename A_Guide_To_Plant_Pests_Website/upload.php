<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "Файл зображення - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "Файл не зображення";
    $uploadOk = 0;
  }
}
if (file_exists($target_file)) {
  echo "Такий файл вже існує";
  $uploadOk = 0;
}
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "Файл більше ніж 5МБ";
  $uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Доступні тільки зображення";
  $uploadOk = 0;
}
if ($uploadOk == 0) {
  echo "Файл не завантажено";
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "Файл ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " успішно завантажено";
  } else {
    echo "Помилка при завантаженні файлу";
  }
}
?>