<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = uniqid(); 
    $name = $_POST['ім\'я'];
    $surname = $_POST['прізвище'];
    $email = $_POST['email'];
    $password = password_hash($_POST['пароль'], PASSWORD_DEFAULT); // Хешуємо пароль
    $користувач = [
        'id' => $id,
        'ім\'я' => $name,
        'прізвище' => $surname,
        'email' => $email,
        'пароль' => $password,
    ];
    // Зчитуємо існуючі дані з файлу JSON
    $існуючі_користувачі = [];
    if (file_exists('користувачі.json')) {
        $json_data = file_get_contents('користувачі.json');
        $існуючі_користувачі = json_decode($json_data, true);
    }
    $існуючі_користувачі[] = $користувач;
    $json_data = json_encode($існуючі_користувачі, JSON_PRETTY_PRINT);
    file_put_contents('користувачі.json', $json_data);
    echo 'Реєстрація успішна!';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Форма реєстрації</title>
</head>
<body>

<h2>Реєстрація користувача</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Ім'я: <input type="text" name="ім'я" required><br>
    Прізвище: <input type="text" name="прізвище" required><br>
    Email: <input type="email" name="email" required><br>
    Пароль: <input type="password" name="пароль" required><br>
    <input type="submit" value="Зареєструватися">
</form>

</body>
</html>