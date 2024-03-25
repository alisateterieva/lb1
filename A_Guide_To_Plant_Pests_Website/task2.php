<?php
session_start();
function isUserLoggedIn() {
    return isset($_SESSION['user']);
}
function validateUser($email, $password) {
    $існуючі_користувачі = [];
    if (file_exists('користувачі.json')) {
        $json_data = file_get_contents('користувачі.json');
        $існуючі_користувачі = json_decode($json_data, true);
    }
    foreach ($існуючі_користувачі as $користувач) {
        if ($користувач['email'] === $email && password_verify($password, $користувач['пароль'])) {
            $_SESSION['user'] = $користувач;
            return true;
        }
    }
    return false; // Невдалий вхід
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $пароль = $_POST['пароль'];
    if (validateUser($email, $пароль)) {
        header("Location: gribkypage.html");
        exit();
    } else {
        $error_message = "Невірний email або пароль";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Форма входу</title>
</head>
<body>
<h2>Вхід в систему</h2>
<?php
if (isset($error_message)) {
    echo '<p style="color: red;">' . $error_message . '</p>';
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Email: <input type="email" name="email" required><br>
    Пароль: <input type="password" name="пароль" required><br>
    <input type="submit" value="Увійти">
</form>
</body>
</html>