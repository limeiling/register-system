<html>
<head>
<link rel="stylesheet" href="css/php.css">
<title>提交成功！</title>
</head>
<body>

<?php 
$name = $_POST['name'];
$birth = $_POST['birth'];
$sex = $_POST['sex'];
$contact_person = $_POST['contactN'];
$telephone = $_POST['telephone'];
$recommended = $_POST['recommended'];
$email = $_POST['email'];
$experience = $_POST['ex'];

//测试输入是否为空或正确格式
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
     $exErr = test_input($_POST["ex"]);
   }   
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

//把获取到的资料写入到本地csv格式的文件中
$list = array
(
	$content = "".$name.",".$birth.",".$sex.",".$contact_person.",".$telephone.",".$recommended.",".$email.",".$experience,
);
$file = fopen("record.csv","a+");
foreach ($list as $line)
  {
  fputcsv($file,split(',',$line));
  }
fclose($file);

?>

<h1>提交成功！您可以关掉这个界面。</h1>
</body>
</html>