<?php
function generateActivationCode() {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $code = '';
    $codeLength = 16;

    for ($i = 0; $i < $codeLength; $i++) {
        $randomIndex = mt_rand(0, strlen($characters) - 1);
        $code .= $characters[$randomIndex];
    }

    return $code;
}

// Генерируем 10 кодов активации
$activationCodes = [];
for ($i = 0; $i < 10; $i++) {
    $activationCodes[] = generateActivationCode();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Генератор кодов активации</title>
</head>
<body>
    <h1>Сгенерированные коды активации:</h1>
    <ul>
        <?php foreach ($activationCodes as $code): ?>
            <li><?php echo $code; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
