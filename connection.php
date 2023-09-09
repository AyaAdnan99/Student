<?php
$conn = mysqli_connect("localhost:3306","root","root","student_grant");

// Check connection
if (mysqli_connect_errno())
  {
  echo "فشل في الاتصال بقاعدة البيانات" . mysqli_connect_error();
  }
?>