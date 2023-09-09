<!DOCTYPE html>
<html lang="ar">



<style>
html{
font-size:20px;
}
.input-box input{

color:black;
}

input[type=submit]
{

 position: relative;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 150px;
    height: 50px;
    background: #081b29;
    border: 2px solid #081b29;
    border-radius: 8px ;
    font-size: 19px;
    color: white;
    text-decoration: none;
    font-weight: 600;
    letter-spacing: 1px;
  
}







</style>



<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=chrome">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>استمارة تسجيل الطلبة</title>
</head>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.9.0.min.js"></script>
<script type="text/javascript">
    var studentStructure = '<div id="container _cccc" class="inner"> ' +
        '<div class="column"> ' +
        ' <div class="input-box"> ' +' <label>اسم الطالب الثلاثي</label>' +
        ' <input type="text" placeholder="اسم الطالب الثلاثي" name="name _cccc"> ' +
        ' </div>' +
        ' <div class="input-box"> ' +
        '<label>اسم المدرسة</label> ' +
        '<input type="text" placeholder="اسم المدرسة" name="school _cccc"> ' +
        '</div>' +
        '</div>' +
        '<div class="div column"> ' +
        ' <div class="input-box"> ' +
        '  <label>تاريخ الميلاد</label>' +
        '  <input type="text"placeholder="يوم \ شهر \ سنة " name="Birth1" onfocus="(this.type='date')"> ' +
        '</div>' +
        '<div class="input-box"> ' +
        '</div>' +
        '</div>' +
        '<div class="column">' +
        '<div class="input-box"> ' +
        '<div class="select-box" name="stage _cccc"> ' +
        '<label>المرحلة</label> ' +
        '<select>' +
        ' <option>الابتدائية</option> ' +
        '  <option>المتوسطة</option> ' +
        '   <option>الاعدادية</option> ' +
        '</select> ' +
        '      </div></div>' +
        '   <div class="input-box"> ' +
        '        <label>الصف</label> ' +
        '         <input type="text" placeholder="الصف" name="Class _cccc"> ' +
        '      </div> ' +
        '   </div> ' +
        '          <hr> ' +
        '       </div> ' +
        '      <br> ' +
        '</div> ';
    var numberOfStudent = 1;
    var div = document.getElementById("bigContainer");
    var display =0;
    function hideshow()
    {
        if(display==1)
        {
            div.style.display='block';
            display=0;
        }
        else{
            div.style.display='none';
            display=1;
        }
    }
    function addCode() {
        numberOfStudent++;
        var s = studentStructure.replaceAll(' _cccc', numberOfStudent.toString());
        document.getElementById("bigContainer").insertAdjacentHTML("afterend", s);
       // document.getElementById("bigContainer2").insertAdjacentHTML("afterend", s);
        document.getElementById("no_children").value = numberOfStudent;
    }
    function addDominant() {
        $('#domain').append($('#container').clone());
    }
   
</script>

<body dir="rtl">
    <section class="containeer">
        <header>استمارة تسجيل الطلبة</header>
        <header>
            <?php
            $submitButtonName = 'submitInfo';
            $submitButtonValue = 'حفظ';
            include('connection.php');
            session_start();
            if (!isset($_SESSION['cardNumber'])) // check if the person has card number
            {
                header('location: login.php');
               
            } else {
                if (isset($_POST['submitInfo'])) // if the person already has data
                {
                    if( $submitButtonValue = 'حفظ')
                    {
                      //$pId = $_POST['id_pk'];
                      $city = $_POST['city'];
                      $province = $_POST['province'];
                      $directorate = $_POST['directorate'];
                      $township = $_POST['township'];
                       $parent_1st_name = $_POST['parent_1st_name'];
                      $parent_2nd_name = $_POST['parent_2nd_name'];
                      $parent_3rd_name = $_POST['parent_3rd_name'];
                      $parent_4th_name = $_POST['parent_4th_name'];
                      $mother_name = $_POST['mother_name'];
                      $national_id = $_POST['national_id'];
                      $jinsiya_no = $_POST['jinsiya_no'];
                     $jinsiya_record = $_POST['jinsiya_record'];
                     $jinsiya_page = $_POST['jinsiya_page'];
                     $child_num = $_POST['no_children'];
                     $card = $_SESSION['cardNumber'];
                          // echo("تم حفظ قيد جديد");
                          ////////////////////////////////////////////////////
                          // mysqli_query($conn,"update `parents_details` set `qicard_number`=$city where `city`=$city");
                  

                          $queryString = "insert into `parents_details` (qicard_number,city,province,directorate,township,parent_1st_name,parent_2nd_name,parent_3rd_name,parent_4th_name,mother_name,national_id,jinsiya_no,jinsiya_record,jinsiya_page,no_children)
                         values ('$card','$city','$province','$directorate','$township','$parent_1st_name','$parent_2nd_name','$parent_3rd_name','$parent_4th_name','$mother_name','$national_id','$jinsiya_no','$jinsiya_record','$jinsiya_page','$child_num')";

                              mysqli_query($conn, $queryString);
                  
                              $sql = "SELECT * from parents_details where `qicard_number`='$card'";
                             $result = mysqli_query($conn, $sql);
                         $row = mysqli_fetch_assoc($result);
                         //echo( $pId);
                              // $pId = $row['id_pk'];
                 
                               //echo($queryString);
                              $cn = 7;
                          $c = 1;
                              while ($c <= $cn) {

                        $nameN = 'name' . strval($c);
                        $stageN = 'stage' . strval($c);
                        $schoolN = 'school' . strval($c);
                        $ClassN = 'Class' . strval($c);
                       // $genderN = 'gender' . strval($c);
                        $BirthN = 'Birth' . strval($c);
                        $name = $_POST[$nameN];
                        $stage = $_POST[$stageN];
                        $school = $_POST[$schoolN];
                        $Class = $_POST[$ClassN];
                       // $gender = $_POST[$genderN];
                        $Birth = $_POST[$BirthN];
                        $card = $_SESSION['cardNumber'];
                        date('y/m/d');
                        $queryString = "insert into `child_details` (name,stage,school,Class,Birth,id_fk)
                         values ('$name','$stage','$school','$Class','$Birth','$card') ";

                               mysqli_query($conn, $queryString);
                  
                        $c = $c + 1;
                       // echo($card);
                       header('location: done.html');
                    }
                }
                } ///here else if 
                else {
                    //echo(" قيد موجود مسبقا");
                    $cardnumber = $_SESSION['cardNumber'];
                    $sql = "SELECT * from parents_details where `qicard_number`='$cardnumber'";
                    $result = mysqli_query($conn, $sql);
                    $rowCount = mysqli_num_rows($result);
                    if ($rowCount == 1) 
                    {
                       // $submitButtonName = 'update';
                        $submitButtonValue = 'خروج';
                       
                        $row = mysqli_fetch_assoc($result);
                        $pId=$row['id_pk'];
                        $city = $row['city'];
                        $province = $row['province'];
                        $directorate = $row['directorate'];
                        $township = $row['township'];
                        $parent_1st_name = $row['parent_1st_name'];
                        $parent_2nd_name = $row['parent_2nd_name'];
                        $parent_3rd_name = $row['parent_3rd_name'];
                        $parent_4th_name = $row['parent_4th_name'];
                        $mother_name = $row['mother_name'];
                        $national_id = $row['national_id'];
                        $jinsiya_no = $row['jinsiya_no'];
                        $jinsiya_record = $row['jinsiya_record'];
                        $jinsiya_page = $row['jinsiya_page'];
                        $no_children = $row['no_children'];
                          if( $submitButtonValue = 'خروج')
                    {
                      
                        header('location: sorry.html');
                    }
                    } else 
                
                    {
                      //  echo("تفريغ الحقول");
                        $pId='';
                        $city = '';
                        $province = '';
                        $directorate = '';
                        $township = '';
                        $parent_1st_name = '';
                        $parent_2nd_name = '';
                        $parent_3rd_name = '';
                        $parent_4th_name = '';
                        $mother_name = '';
                        $national_id = '';
                        $jinsiya_no = '';
                        $jinsiya_record = '';
                        $jinsiya_page = '';
                        $no_children = '';
                    }
                }
            }
            ?>
        </header>
        <form class="form" method="POST">
        <label></label> 
       
                </div>
      <!--  <input type="text" placeholder="التسلسل"  name="id_pk" readonly="readonly" value='<?php echo ($pId) ?>'>   -->
            <div class="column">
                <div class="input-box">
                    <div class="select-box">
                        
                        <label>المحافظة</label>
                        <select required oninvalid="setCustomValidity('ادخل اسم المحافظة') "
                            oninput="setCustomValidity('')" name="city">
                            
                            <option value="بغداد">بغداد</option>
                            <option value="البصرة">البصرة</option>
                            <option value="الموصل">الموصل</option>
                            <option value="كربلاء">كربلاء</option>
                            <option value="النجف">النجف</option>
                            <option value="ذي قار">ذي قار</option>
                            <option value="المثنى">المثنى</option>
                            <option value="صلاح الدين">صلاح الدين</option>
                            <option value="ديالى">ديالى</option>
                            <option value="الديوانية ">الديوانية</option>
                            <option value="بابل">بابل</option>
                            <option value="الانبار">الانبار</option>
                            <option value="كركوك ">كركوك</option>
                            <option value="ميسان">ميسان</option>
                            <option value="واسط">واسط</option>
                        </select>
                    </div>
                </div>
                <div class="input-box">
                    <label>القضاء</label>
                    <input type="text" placeholder="القضاء" name="province">
                </div>

            </div>
            <div class="column">
                <div class="input-box">
                    <label>الناحية</label>
                    <input type="text" placeholder="الناحية" name="township">
                </div>
                <div class="input-box">
                    <div class="select-box">
                        <label>اسم التربية</label>
                        <select required oninvalid="setCustomValidity('ادخل اسم التربية') "
                            oninput="setCustomValidity('')" name="directorate">
                           
                            <option value="الرصافة الاولى ">الرصافة الاولى</option>
                            <option value="الرصافة الثانية ">الرصافة الثانية</option>
                            <option value="الرصافة الثالثة">الرصافة الثالثة</option>
                            <option value="الكرخ الاولى">الكرخ الاولى</option>
                            <option value="الكرخ الثانية">الكرخ الثانية</option>
                            <option value="الكرخ الثالثة">الكرخ الثالثة</option>
                            <option value="بغداد">بغداد</option>
                            <option value="البصرة">البصرة</option>
                            <option value="الموصل">الموصل</option>
                            <option value="كربلاء">كربلاء</option>
                            <option value="النجف">النجف</option>
                            <option value="ذي قار">ذي قار</option>
                            <option value="المثنى">المثنى</option>
                            <option value="صلاح الدين">صلاح الدين</option>
                            <option value="ديالى">ديالى</option>
                            <option value="الديوانية">الديوانية</option>
                            <option value="بابل">بابل</option>
                            <option value="الانبار">الانبار</option>
                            <option value="كركوك">كركوك</option>
                            <option value="ميسان">ميسان</option>
                            <option value="واسط">واسط</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            <header>معلومات رب الاسرة المشمول بالرعاية الاجتماعية</header>
            <div class="column">

                <div class="input-box">
                    <label>الاسم الاول</label>
                    <input type="text" placeholder="الاسم الاول" name="parent_1st_name"
                        value='<?php echo ($parent_1st_name) ?>'>
                </div>
                <div class="input-box">
                    <label>الاسم الثاني</label>
                    <input type="text" placeholder="الاسم الثاني" name="parent_2nd_name" value='<?php echo ($parent_2nd_name) ?>'>
                </div>
            </div>
            <div class="column">
                <div class="input-box">
                    <label>الاسم الثالث</label>
                    <input type="text" placeholder="الاسم الثالث" name="parent_3rd_name"
                        value='<?php echo ($parent_3rd_name) ?>'>
                </div>
                <div class="input-box">
                    <label>الاسم الرابع</label>
                    <input type="text" placeholder="الاسم الرابع" name="parent_4th_name"
                        value='<?php echo ($parent_4th_name) ?>'>
                </div>
            </div>
            <div class="column">
                <div class="input-box">
                    <label>اسم الام الثلاثي</label>
                    <input type="text" placeholder="اسم الام الثلاثي" name="mother_name"
                        value='<?php echo ($mother_name) ?>'>
                </div>
                <div class="input-box">
                    <label>رقم البطاقة الوطنية</label>
                    <input type="text" placeholder="رقم البطاقة الوطنية" name="national_id"
                        value='<?php echo ($national_id) ?>'>
                </div>
            </div>
            <div class="column">
                <div class="input-box">
                    <label>رقم هوية الاحوال المدنية</label>
                    <input type="text" placeholder="رقم هوية الاحوال المدنية" name="jinsiya_no"
                        value='<?php echo ($jinsiya_no) ?>'>
                </div>
                <div class="input-box">
                    <label>السجل</label>
                    <input type="text" placeholder="السجل" name="jinsiya_record"
                        value='<?php echo ($jinsiya_record) ?>'>
                </div>
                <div class="input-box">
                    <label>الصحيفة</label>
                    <input type="text" placeholder="الصحيفة" name="jinsiya_page" value='<?php echo ($jinsiya_page) ?>'>
                </div>
              
            </div>
            
            
            
            
              <div class="input-box">
                    <label></label>
                    <input type="hidden" placeholder=""  name="no_children" value=1    id="no_children">
                </div>
            
            
            
            
            <hr>
            <header>معلومات الابناء</header>
             
             
           
            <div id="bigContainer">
            
                <div id="container1" class="inner">
              
                    <div class="column">
                    <header>1</header>
                        <div class="input-box">
                            <label> اسم الطالب الثلاثي</label>
                            <input type="text" placeholder="اسم الطالب الثلاثي" name="name1">
                        </div>
                        <div class="input-box">
                            <label> اسم المدرسة</label>
                            <input type="text" placeholder="اسم المدرسة" name="school1">
                        </div>
                    </div>
                    <div class="column">
                        <div class="input-box">
                            <label> تاريخ الميلاد</label>
                            <input type="text"placeholder="يوم \ شهر \ سنة " name="Birth1" onfocus="(this.type='date')">
                        </div>
                        
                        <div class="input-box">
                      
                        </div>
                    
                   
                        <div class="input-box">
                            <div class="select-box" name="stage1">
                                <label> المرحلة</label>
                                <select required oninvalid="setCustomValidity('ادخل المرحلة') "
                            oninput="setCustomValidity('')" name="stage1">
                              
                                <option value="الابتدائية">الابتدائية</option>
                                    <option value="المتوسطة">المتوسطة</option>
                                    <option value="الاعدادية"> الاعدادية</option>

                                </select>
                            </div>
                        </div>
                        <div class="input-box">
                            <label> الصف</label>
                            <input type="text" placeholder="الصف" name="Class1">
                        </div>
                    </div>
                    <hr>
                </div>
                <br>
            </div>
            




    
            <div id="bigContainer2">
                <div id="container2" class="inner">
                    <div class="column"><header>2</header>
                        <div class="input-box">
                            <label> اسم الطالب الثلاثي</label>
                            <input type="text" placeholder="اسم الطالب الثلاثي" name="name2">
                        </div>
                        <div class="input-box">
                            <label> اسم المدرسة</label>
                            <input type="text" placeholder="اسم المدرسة" name="school2">
                        </div>
                    </div>
                   <div class="column">
                        <div class="input-box">
                            <label> تاريخ الميلاد</label>
                             <input type="text"placeholder="يوم \ شهر \ سنة " name="Birth2" onfocus="(this.type='date')">
                        </div>
                        
                        <div class="input-box">
                      
                        </div>
                 
                    
                        <div class="input-box">
                            <div class="select-box" name="stage2">
                                <label> المرحلة</label>
                                <select required oninvalid="setCustomValidity('ادخل المرحلة') "
                            oninput="setCustomValidity('')" name="stage2">
                              
                                <option value="الابتدائية">الابتدائية</option>
                                    <option value="المتوسطة">المتوسطة</option>
                                    <option value="الاعدادية"> الاعدادية</option>

                                </select>
                            </div>
                        </div>
                        <div class="input-box">
                            <label> الصف</label>
                            <input type="text" placeholder="الصف" name="Class2">
                        </div>
                    </div>
                    <hr>
                </div>
                <br>
            </div>








   
            <div id="bigContainer3">
                <div id="container3" class="inner">
                    <div class="column"> <header>3</header>
                        <div class="input-box">
                            <label> اسم الطالب الثلاثي</label>
                            <input type="text" placeholder="اسم الطالب الثلاثي" name="name3">
                        </div>
                        <div class="input-box">
                            <label> اسم المدرسة</label>
                            <input type="text" placeholder="اسم المدرسة" name="school3">
                        </div>
                    </div>
                     <div class="column">
                        <div class="input-box">
                            <label> تاريخ الميلاد</label>
                            <input type="text"placeholder="يوم \ شهر \ سنة " name="Birth3" onfocus="(this.type='date')">
                        </div>
                        
                        <div class="input-box">
                      
                        </div>
                    
                  
                        <div class="input-box">
                            <div class="select-box" name="stage3">
                                <label> المرحلة</label>
                                <select required oninvalid="setCustomValidity('ادخل المرحلة') "
                            oninput="setCustomValidity('')" name="stage3">
                              
                                <option value="الابتدائية">الابتدائية</option>
                                    <option value="المتوسطة">المتوسطة</option>
                                    <option value="الاعدادية"> الاعدادية</option>

                                </select>
                            </div>
                        </div>
                        <div class="input-box">
                            <label> الصف</label>
                            <input type="text" placeholder="الصف" name="Class3">
                        </div>
                    </div>
                    <hr>
                </div>
                <br>
            </div>







    
            <div id="bigContainer4">
                <div id="container4" class="inner">
                    <div class="column"><header>4</header>
                        <div class="input-box">
                            <label> اسم الطالب الثلاثي</label>
                            <input type="text" placeholder="اسم الطالب الثلاثي" name="name4">
                        </div>
                        <div class="input-box">
                            <label> اسم المدرسة</label>
                            <input type="text" placeholder="اسم المدرسة" name="school4">
                        </div>
                    </div>
                    <div class="column">
                        <div class="input-box">
                            <label> تاريخ الميلاد</label>
                             <input type="text"placeholder="يوم \ شهر \ سنة " name="Birth4" onfocus="(this.type='date')">
                        </div>
                        
                        <div class="input-box">
                      
                        </div>
                    
                   
                        <div class="input-box">
                            <div class="select-box" name="stage4">
                                <label> المرحلة</label>
                                <select required oninvalid="setCustomValidity('ادخل المرحلة') "
                            oninput="setCustomValidity('')" name="stage4">
                              
                                <option value="الابتدائية">الابتدائية</option>
                                    <option value="المتوسطة">المتوسطة</option>
                                    <option value="الاعدادية"> الاعدادية</option>

                                </select>
                            </div>
                        </div>
                        <div class="input-box">
                            <label> الصف</label>
                            <input type="text" placeholder="الصف" name="Class4">
                        </div>
                    </div>
                    <hr>
                </div>
                <br>
            </div>










    
            <div id="bigContainer5">
                <div id="container5" class="inner">
                    <div class="column"><header>5</header>
                        <div class="input-box">
                            <label> اسم الطالب الثلاثي</label>
                            <input type="text" placeholder="اسم الطالب الثلاثي" name="name5">
                        </div>
                        <div class="input-box">
                            <label> اسم المدرسة</label>
                            <input type="text" placeholder="اسم المدرسة" name="school5">
                        </div>
                    </div>
                     <div class="column">
                        <div class="input-box">
                            <label> تاريخ الميلاد</label>
                            <input type="text"placeholder="يوم \ شهر \ سنة " name="Birth5" onfocus="(this.type='date')">
                        </div>
                        
                        <div class="input-box">
                      
                        </div>
                    
                  
                        <div class="input-box">
                            <div class="select-box" name="stage5">
                                <label> المرحلة</label>
                                <select required oninvalid="setCustomValidity('ادخل المرحلة') "
                            oninput="setCustomValidity('')" name="stage5">
                              
                                <option value="الابتدائية">الابتدائية</option>
                                    <option value="المتوسطة">المتوسطة</option>
                                    <option value="الاعدادية"> الاعدادية</option>

                                </select>
                            </div>
                        </div>
                        <div class="input-box">
                            <label> الصف</label>
                            <input type="text" placeholder="الصف" name="Class5">
                        </div>
                    </div>
                    <hr>
                </div>
                <br>
            </div>












   
            <div id="bigContainer6">
                <div id="container6" class="inner">
                    <div class="column"> <header>6</header>
                        <div class="input-box">
                            <label> اسم الطالب الثلاثي</label>
                            <input type="text" placeholder="اسم الطالب الثلاثي" name="name6">
                        </div>
                        <div class="input-box">
                            <label> اسم المدرسة</label>
                            <input type="text" placeholder="اسم المدرسة" name="school6">
                        </div>
                    </div>
                    <div class="column">
                        <div class="input-box">
                            <label> تاريخ الميلاد</label>
                           <input type="text"placeholder="يوم \ شهر \ سنة " name="Birth6" onfocus="(this.type='date')">
                        </div>
                        
                        <div class="input-box">
                      
                        </div>
                    
                   
                        <div class="input-box">
                            <div class="select-box" name="stage6">
                                <label> المرحلة</label>
                                <select required oninvalid="setCustomValidity('ادخل المرحلة') "
                            oninput="setCustomValidity('')" name="stage6">
                              
                                <option value="الابتدائية">الابتدائية</option>
                                    <option value="المتوسطة">المتوسطة</option>
                                    <option value="الاعدادية"> الاعدادية</option>

                                </select>
                            </div>
                        </div>
                        <div class="input-box">
                            <label> الصف</label>
                            <input type="text" placeholder="الصف" name="Class6">
                        </div>
                    </div>
                    <hr>
                </div>
                <br>
            </div>










  
            <div id="bigContainer7">
                <div id="container7" class="inner">
                    <div class="column">  <header>7</header>
                        <div class="input-box">
                            <label> اسم الطالب الثلاثي</label>
                            <input type="text" placeholder="اسم الطالب الثلاثي" name="name7">
                        </div>
                        <div class="input-box">
                            <label> اسم المدرسة</label>
                            <input type="text" placeholder="اسم المدرسة" name="school7">
                        </div>
                    </div>
                     <div class="column">
                        <div class="input-box">
                            <label> تاريخ الميلاد</label>
                          <input type="text"placeholder="يوم \ شهر \ سنة " name="Birth7" onfocus="(this.type='date')">
                        </div>
                        
                        <div class="input-box">
                      
                        </div>
                    
                   
                        <div class="input-box">
                            <div class="select-box" name="stage7">
                                <label> المرحلة</label>
                                <select required oninvalid="setCustomValidity('ادخل المرحلة') "
                            oninput="setCustomValidity('')" name="stage7">
                              
                                <option value="الابتدائية">الابتدائية</option>
                                    <option value="المتوسطة">المتوسطة</option>
                                    <option value="الاعدادية"> الاعدادية</option>

                                </select>
                            </div>
                        </div>
                        <div class="input-box">
                            <label> الصف</label>
                            <input type="text" placeholder="الصف" name="Class7">
                        </div>
                    </div>
                    <hr>
                </div>
                <br>
            </div>


            </div>
            
            </div>
          
            
            
            
   <label class="form-control">
    <input type="checkbox" name="checkbox"     required oninput="setCustomValidity('')" >
    اتعهد بصحة المعلومات المدخلة.
  </label>
<br>
<label class="form-control">
    <input type="checkbox" name="checkbox"     required oninput="setCustomValidity('')" >
   انا متاكد من ملئ كافة الحقول وبخلافه اتحمل مسؤولية عدم حفظ البيانات.
  </label>
<br>
            <input type="submit" name="<?php echo ($submitButtonName); ?>" value="<?php echo ($submitButtonValue); ?>" class="sub">
        </form>
    </section>
</body>

</html>