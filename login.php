<?php
// require_once dirname(__FILE__) . '/function/db_connection.php';
session_start();

function login($user_name, $user_id, $password)
{
  header('Location: board_home.php');
}

if (isset($_COOKIE['login_check'])) {
  // 前回のログイン時ログインチェックONの場合
  header('Location: board_home.php');
  exit();
} else {
  // 前回のログイン時ログインチェックOFFの場合
  if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $user_id = $_POST['password'];
    $password = $_POST['password_conf'];

    login($user_name, $user_id, $password);
    // 現在のログイン時ログインチェックONの場合 function loginへ
    if (isset($_POST['login_check'])) {
      setcookie('login_check', $_POST['login_check']);
    }
  }
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
</head>

<body>

  <main class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h1 class="text-center my-3">ログイン</h1>
        <form action="" method="post">
          <div>
            <input style="background-color: #f7ffc6;" type="text" name="name" class="form-control form-control-lg my-4" placeholder="ユーザー名" required />
          </div>
          <div>
            <input style="background-color: #f7ffc6" type="password" name="password" class="form-control form-control-lg my-4" placeholder="パスワード" required />
          </div>
          <div>
            <input style="background-color: #f7ffc6;" type="password" name="password_conf" class="form-control form-control-lg my-4" placeholder="パスワード確認" required />
          </div>
          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" name="login_check" value="1" checked />
            <label class="form-check-label mb-3" for="login_check"> ログイン状態を維持する </label>
          </div>
          <button class="btn btn-primary btn-lg w-100" type="submit" name="login">ログイン</button>
          <!-- <button class="btn-info rounded-pill">themecolor</button> -->
        </form>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>