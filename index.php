<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<head>
  <title>报名界面 Register</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body> 
  <header id="top" class="main-header">
    <img src="img/logo.jpg" alt="logo" class="logo">
  </header>

<?php
//测试输入是否为空或正确格式
  $nameErr = $emailErr = $sexErr = $birthErr = $contactErr = $telErr = $exErr = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "姓名是必填的";
   } else {
     $name = test_input($_POST["name"]);
   }
   
   if (empty($_POST["email"])) {
     $emailErr = "电邮是必填的";
   } else {
     $email = test_input($_POST["email"]);
     // 检查电子邮件地址语法是否有效
     if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
       $emailErr = "无效的 电邮/email 格式"; 
     }
   }

   if (empty($_POST["birth"])) {
     $birthErr = "生日是必填的";
   } else {
     $birth = test_input($_POST["birth"]);
   }

   if (empty($_POST["contactN"])) {
     $contactErr = "联系人是必填的";
   } else {
     $contact_person = test_input($_POST["contact_person"]);
   }

   if (empty($_POST["sex"])) {
     $sexErr = "性别是必选的";
   } else {
     $sex = test_input($_POST["sex"]);
   }

   if (empty($_POST["telephone"])) {
     $telErr = "电话是必填的";
   } else {
     $telephone = test_input($_POST["telephone"]);
   }

   if (empty($_POST["ex"])) {
     $exErr = "经验是必选的";
   } else {
     $ex = test_input($_POST["ex"]);
   }   
 }

 function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
 }
 ?>

 <!-- 主要界面内容 -->
 <div class="primary-content">
  <h2>网上报名系统</h2>
  <p>
    芬兰赛区
  </p>
  <section>
  <ul id="gallery">
    <li class="slogan">
      <p class="s1">放飞梦想</p>
      <p>唱响中国</p>
    </li>
    <li>
      <form method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
        <p><span id="special">* 必需填写的部分 Where is required</span></p>
        <span class="error">* <?php echo $nameErr;?></span>
        姓名  /  Your name
        <br>
        <input type="text" name="name">
        <br><br>
        <span class="error">* <?php echo $birthErr;?></span>
        出生年月  /  Day Of Birth (填写格式：日月年 ｜ dd.mm.yyyy)
        <br>
        <input type="text" name="birth">
        <br><br>

        <span class="error">* <?php echo $sexErr;?></span>
        性别  /  Gender<br>
        <input type="radio" name="sex" value="male">男 / Male
        <input type="radio" name="sex" value="female">女 / Female
        <br><br>
        <span class="error">* <?php echo $contactErr;?></span>
        联系人姓名  /  Contact person
        <br>
        <input type="text" name="contactN">
        <br><br>
        <span class="error">* <?php echo $telErr;?></span>
        联系人电话  /  Telephone<br>
        <input type="text" name="telephone">
        <br><br>
        推荐单位  /  Recommended<br>
        <input type="text" name="recommended">
        <br><br>
        <span class="error">* <?php echo $emailErr;?></span>
        电邮地址  /  E-mail:<br>
        <input type="text" name="email">
        <br><br>
        <span class="error">* <?php echo $exErr;?></span>
        曾经在舞台上表演过  /  Experience performance<br>
        <input type="radio" name="ex" value="yes">是 / Yes
        <input type="radio" name="ex" value="no">否 / No
        <br><br>
        <input type="submit" name="submit" value="提交/Submit">
      </form>
    </li>
  </ul>
  </section>
</div>
<!-- End .primary-content -->
<footer>
  <p>All rights reserved to the <a href="#">Helsinki Chinese Business Association</a>.</p>
  <a href="#top">Back to top &raquo;</a>
</footer> 
</body>
</html>