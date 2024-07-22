<html>
<head>
<meta encoding="utf-8">
<title>Вход</title>
<link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>
<style>
body {
background: url("ems/bg.png");
background-size: cover; 
color: white;
}
.content {
width:100%;
height: 100%;
}
#logoimg {
margin-left:10%;
width:80%;
margin-top:35%;
height:30%;
margin-right:20%;
margin-bottom:35%;
background-color: transparent;
}
input {
box-sizing: border-box;
display: flex;
flex-direction: row;
align-items: center;
padding: 10px 20px;
gap: 80px;
width: 338px;
height: 38px;
background: #FFFFFF;
border: 1px solid #C7C9C8;
border-radius: 10px;
flex: none;
order: 1;
flex-grow: 0;

}
#loginbtn {

display: flex;
flex-direction: row;
justify-content: center;
align-items: center;
padding: 8px 144px;
gap: 10px;
margin-top:10px;
width: 338px;
height: 38px;
cursor:pointer;
background: #F1956F;
border-radius: 10px;

flex: none;
order: 0;
flex-grow: 0;

font-family: 'Noto Sans';
font-style: normal;
font-weight: 700;
font-size: 16px;
line-height: 22px;
text-align: center;

color: #FFFFFF;




}
</style>
</head>
<body>
<?php session_start(); 
$csrfToken = bin2hex(random_bytes(32));
$_SESSION['csrf_token'] = $csrfToken;
?>
<div class="content">
<table style="width:100%"><tr>
<td style="width:50%">

<svg id="logoimg" viewBox="0 0 391 85" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M63.1396 40C63.1396 21.2223 47.9173 6 29.1396 6C19.7608 6 11.2736 9.79364 5.11925 15.9373C3.94645 17.1078 2.04685 17.1062 0.876449 15.9336C-0.293954 14.761 -0.292351 12.8615 0.88005 11.691C8.11365 4.4702 18.1072 -2.2307e-06 29.1396 -1.74846e-06C51.231 -7.8281e-07 69.1396 17.9086 69.1396 40C69.1396 62.0912 51.231 80 29.1396 80C18.1072 80 8.11365 75.5296 0.880048 68.3092C-0.292354 67.1384 -0.293956 65.2388 0.876447 64.0664C2.04685 62.894 3.94645 62.892 5.11924 64.0628C11.2736 70.2064 19.7608 74 29.1396 74C47.9173 74 63.1396 58.7776 63.1396 40Z" fill="#F1956F"/>
<path d="M49.1396 40C49.1396 28.9543 40.1852 20 29.1396 20C23.6124 20 18.6136 22.2381 14.9908 25.8647C13.8196 27.0368 11.92 27.0377 10.748 25.8667C9.57605 24.6957 9.57485 22.7962 10.746 21.624C15.4484 16.9171 21.9564 14 29.1396 14C43.499 14 55.1396 25.6406 55.1396 40C55.1396 54.3596 43.499 66 29.1396 66C21.9564 66 15.4484 63.0828 10.746 58.376C9.57485 57.204 9.57604 55.3044 10.748 54.1332C11.92 52.9624 13.8196 52.9632 14.9908 54.1352C18.6136 57.762 23.6124 60 29.1396 60C40.1852 60 49.1396 51.0456 49.1396 40Z" fill="#F1956F"/>
<path d="M39.1396 40C39.1396 34.4772 34.6624 30 29.1396 30C23.6168 30 19.1396 34.4772 19.1396 40C19.1396 45.5228 23.6168 50 29.1396 50C34.6624 50 39.1396 45.5228 39.1396 40ZM29.1396 36C31.3488 36 33.1396 37.7908 33.1396 40C33.1396 42.2092 31.3488 44 29.1396 44C26.9304 44 25.1396 42.2092 25.1396 40C25.1396 37.7908 26.9304 36 29.1396 36Z" fill="#F1956F"/>
<path d="M86.22 45.29H100.98V50H81.03V29.75H100.77V34.43H86.22V37.73H97.59V41.81H86.22V45.29ZM127.306 29.75H132.826V50H127.726V38.39L121.036 48.74H117.076L110.446 38.39V50H105.376V29.75H110.896L119.056 42.38L127.306 29.75ZM149.511 50.54C143.691 50.54 140.151 49.61 137.211 47.12L139.641 42.86C141.831 44.72 144.741 45.86 149.271 45.86C152.961 45.86 155.121 45.23 155.121 43.94C155.121 42.86 154.311 42.53 152.031 42.32L145.491 41.84C139.611 41.45 137.751 38.78 137.751 35.72C137.751 31.43 141.171 29.21 148.701 29.21C152.361 29.21 156.171 29.69 160.041 31.94L158.091 36.32C155.301 34.52 152.061 33.83 148.281 33.83C144.081 33.83 142.971 34.46 142.971 35.6C142.971 36.62 143.841 37.07 146.751 37.31L151.371 37.64C157.191 38 160.311 39.35 160.311 43.52C160.311 48.47 156.021 50.54 149.511 50.54ZM188.19 40.37C188.19 44.48 186.63 47.39 183.48 49.01L186.9 50.84L184.68 54.41L177.9 50.45C177.24 50.51 176.52 50.54 175.8 50.54C167.52 50.54 163.47 47 163.47 40.37V39.35C163.47 32.75 167.52 29.21 175.8 29.21C184.11 29.21 188.19 32.75 188.19 39.35V40.37ZM168.69 40.43C168.69 44.45 171.96 45.74 175.8 45.74C179.7 45.74 182.97 44.45 182.97 40.43V39.32C182.97 35.27 179.7 34.01 175.8 34.01C171.96 34.01 168.69 35.27 168.69 39.32V40.43ZM208.712 50L207.452 47H196.862L195.632 50H189.872L198.902 29.69H205.352L214.472 50H208.712ZM198.572 42.83H205.712L202.142 34.22L198.572 42.83ZM225.098 45.32H237.638V50H216.758V46.04L229.178 34.43H216.308V29.75H237.248V33.89L225.098 45.32ZM258.282 50L257.022 47H246.432L245.202 50H239.442L248.472 29.69H254.922L264.042 50H258.282ZM248.142 42.83H255.282L251.712 34.22L248.142 42.83ZM290.437 40.37C290.437 44.48 288.877 47.39 285.727 49.01L289.147 50.84L286.927 54.41L280.147 50.45C279.487 50.51 278.767 50.54 278.047 50.54C269.767 50.54 265.717 47 265.717 40.37V39.35C265.717 32.75 269.767 29.21 278.047 29.21C286.357 29.21 290.437 32.75 290.437 39.35V40.37ZM270.937 40.43C270.937 44.45 274.207 45.74 278.047 45.74C281.947 45.74 285.217 44.45 285.217 40.43V39.32C285.217 35.27 281.947 34.01 278.047 34.01C274.207 34.01 270.937 35.27 270.937 39.32V40.43ZM305.371 50.54C299.551 50.54 296.011 49.61 293.071 47.12L295.501 42.86C297.691 44.72 300.601 45.86 305.131 45.86C308.821 45.86 310.981 45.23 310.981 43.94C310.981 42.86 310.171 42.53 307.891 42.32L301.351 41.84C295.471 41.45 293.611 38.78 293.611 35.72C293.611 31.43 297.031 29.21 304.561 29.21C308.221 29.21 312.031 29.69 315.901 31.94L313.951 36.32C311.161 34.52 307.921 33.83 304.141 33.83C299.941 33.83 298.831 34.46 298.831 35.6C298.831 36.62 299.701 37.07 302.611 37.31L307.231 37.64C313.051 38 316.171 39.35 316.171 43.52C316.171 48.47 311.881 50.54 305.371 50.54ZM338.852 29.75V34.43H330.722V50H325.502V34.43H317.342V29.75H338.852ZM356.163 50L354.903 47H344.313L343.083 50H337.323L346.353 29.69H352.803L361.923 50H356.163ZM346.023 42.83H353.163L349.593 34.22L346.023 42.83ZM381.939 29.75H387.039V50H381.819L370.719 37.04V50H365.649V29.75H370.839L381.939 42.62V29.75Z" fill="white"/>
<path d="M303.7 72.84C305.4 73.04 306.7 74.3 306.7 76.14C306.7 78.48 305.3 80 302.36 80H293.22V66.58H302.02C304.66 66.58 305.8 67.88 305.8 69.76C305.8 71.32 304.88 72.42 303.7 72.84ZM304.04 70.1C304.04 68.78 303.2 68.18 301.76 68.18H294.94V72.42H301.54C302.86 72.42 304.04 71.64 304.04 70.1ZM302.1 78.4C304.18 78.4 304.94 77.28 304.94 75.9C304.94 74.5 303.86 73.68 302.5 73.68H294.94V78.4H302.1ZM322.472 66.58L315.872 74.84V80H314.112V74.8L307.472 66.58H309.532L314.992 73.4L320.412 66.58H322.472ZM336.857 66.58C341.297 66.58 344.457 68.26 344.457 72.88V73.68C344.457 78.46 341.297 80 336.857 80H329.997V66.58H336.857ZM342.677 73.68V72.88C342.677 69.58 340.597 68.2 336.857 68.2H331.757V78.38H336.857C340.597 78.38 342.677 77.12 342.677 73.68ZM348.005 80V66.58H349.765V80H348.005ZM368.237 76.7C366.717 79.3 364.317 80.32 360.857 80.32C356.397 80.32 353.297 78.54 353.297 73.7V72.86C353.297 68.04 356.397 66.28 360.857 66.28C363.857 66.28 366.657 67.02 368.077 69.6L366.737 70.7C365.597 68.8 363.717 67.9 360.857 67.9C357.297 67.9 355.077 69.34 355.077 72.86V73.7C355.077 77.24 357.297 78.7 360.857 78.7C363.917 78.7 365.657 77.74 366.857 75.62L368.237 76.7ZM371.404 80V66.58H373.164V80H371.404ZM389.755 66.58V68.18H383.775V80H382.015V68.18H376.035V66.58H389.755Z" fill="white"/>
</svg>

</td>
<td align="center" style="width:50%">

<table style="width:300px; height:70%">
<tr>
<td align="center"><span style="font-family: 'Noto Sans'; font-style: normal; font-weight: 500; font-size: 24px;line-height: 140%;text-align: center; color: #FFFFFF;">Вход</td>
</tr>
<form id="loginForm" name="loginForm" method="post" >
<input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrfToken); ?>">
<tr>
<td><span style="font-family: 'Noto Sans'; font-style: normal; font-weight: 400; font-size: 10px; line-height: 140%;color: #7E8486; flex: none; order: 0; flex-grow: 0;">Логин</span>
<br>
<input placeholder="Логин" name="uname" type="text" />
</td>
</tr>
<tr>
<td><span style="font-family: 'Noto Sans'; font-style: normal; font-weight: 400; font-size: 10px; line-height: 140%;color: #7E8486; flex: none; order: 0; flex-grow: 0;">Пароль</span>
<br>
<input placeholder="******" name="pwd" type="password" />
</td>
</tr>
<tr>
<td><button id="loginbtn" onclick="">Вход</button></td>
</tr>
</form>
<tr>
<td align="center"><span style="font-family: 'Noto Sans'; font-style: normal; font-weight: 400; font-size: 12px; line-height: 16px; color: #7E8486;">Забыли пароль?</span><br><br></td>
</tr>
<tr>
<td align="center"><span style="font-family: 'Noto Sans'; font-style: normal; font-weight: 400; font-size: 14px; line-height: 19px; align-items: center; text-align: center; color: #FFFFFF;">Нет аккаунта?</span></td>
</tr>
<tr>
<td><button onclick="window.location.href='register.php'" style="box-sizing: border-box; cursor:pointer; background-color:transparent; color:white;  width: 338px; height: 38px; border: 2px solid #F1956F; border-radius: 10px;">Зарегестрироваться</button></td>
</tr>
</table>

</td>
</div>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
		if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die ("CSRF error");
	}
	else {
        $pdo = new PDO('sqlite:testdb.sqlite');
        $stmt = $pdo->prepare("SELECT * FROM sysuser WHERE login = :uname AND password = :pwd");
        $stmt->execute(array(':uname' => $_POST['uname'], ':pwd' => $_POST['pwd']));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
			$_SESSION["user"]=$user;
echo "<script type='text/javascript'>";
echo "window.location.href='mob/main.php'";
echo "</script>"; 
            exit();
        } else {
            echo "Логин или пароль не верны";
		
        }
    } 
	}catch (PDOException $e) {
        echo $e->getMessage();  // 如果有错误就输出错误信息
    }
}
?>
