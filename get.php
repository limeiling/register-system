<html>
<head><title>提交成功！</title></head>
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

$content = "name: ".$name.";birth: ".$birth.";sex: ".$sex.";contact_person: ".$contact_person.";telephone: ".$telephone.";recommended: ".$recommended.";email: ".$email.";experience: ".$experience."\n\n";
			

$file = fopen("record.txt","a+");
fwrite($file,$content);
fclose($file);
?>

<h1>提交成功！您可以关掉这个界面。</h1>
</body>
</html>