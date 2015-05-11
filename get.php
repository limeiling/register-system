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