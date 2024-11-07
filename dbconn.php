<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$current_file = basename($_SERVER['PHP_SELF']);

// a페이지나 b페이지가 아닐 경우 로그인 페이지로 다시 이동
// if ($current_file != 'login.php' && $current_file != 'register.php' && $current_file != 'main.php') {
     //echo "<script>alert('로그인이 필요합니다');</script>";

     //echo "<script>location.href='login.php';</script>"; //로그인 후 이동할 페이지
     //exit;
// }
?>

<?php
$serverName = getenv('POSTGRES_HOST');
$database = getenv('POSTGRES_DB');
$uid = getenv('POSTGRES_USER');
$pwd = getenv('POSTGRES_PASSWORD');

try {
    $dsn = "pgsql:host=$serverName;port=5432;dbname=$database";
    $conn = new PDO($dsn, $uid, $pwd);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error connecting to PostgreSQL: ". $e->getMessage());
}
?>
