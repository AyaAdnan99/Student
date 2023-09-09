<!DOCTYPE html>
<html lang="ab">



<style>


.home{
    background: url("Images/b1.jpg") no-repeat;
    background-size: cover;
    background-position: center;
    height: 100vh;
    display: flex;
    align-content: center;
    padding: 14% 70px ;

}


footer{
 text-align: center;
    align-items: center;
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background:transperent;
    height: auto;
    width: 100vw;
    padding-top: 10px;
    color: #fff;
}

.footer-content{
     top:0;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
}


.footer-content h3{
   
    text-align: center;
    font-size: 2.1rem;
    font-weight: 500;
    text-transform: capitalize;
    line-height: 3rem;
}



.footer-content p{
  
    max-width: 500px;
    margin: 10px auto;
    padding-top:70px;
    margin-top:70px;
    line-height: 28px;
    font-size: 14px;
    color: #cacdd9;
}

</style>



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content ="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>منحةالطالب</title>
    <link rel="stylesheet" href="style.css">
</head>
<body dir="rtl">

    <?php
	session_start();
	session_destroy();
	session_start();
    if(isset($_POST['sendCard']))	
    {
    $_SESSION['cardNumber']=$_POST['card'];
    header('location: inputpage.php');	
     }	

    
    ?>
         
<header class="header">
    <img src="Images/minstray_logo.png">
    <a href="#"class="logo">وزارة التربية العراقية</a>


</header>

<section class="home">

    <div class="home-content">

    <h1>  استمارة تسجيل الطلبة المشمولين</h1>
    <h3>بمنحة وزارة التربية  </h3>
        <br>
    <p>في حال عدم صحة المعلومات المدخلة تهمل الاستمارة .
    <br>

    </p>
        <br>
    <div class="btn">
        <div class="btn">
            <form method="post">
                <input class="inputtext" type="text" id="card" name="card"
                       placeholder="ادخل رقم البطاقة الذكية" required oninvalid="setCustomValidity('ادخل رقم البطاقة الذكية') "oninput="setCustomValidity('')">
                <a href="inputpage.html"> <input  class="button" type="submit" value="دخول" name='sendCard'></a>

               
                
                    

            </form>

    </div>
    </div>
</div>
</section>


<footer >

<div class=”footer-content”>

 <p>جميع الحقوق محفوظة الى مديرية تقنية المعلومات </p>
</div>

</footer>

</body>
</html>