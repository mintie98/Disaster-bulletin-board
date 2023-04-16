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
    $user_name = $_POST['user_name'];
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
    $login_check = $_POST['login_check'];
    // 現在のログイン時ログインチェックONの場合
    if (isset($_POST['login_check'])) {
      setcookie('login_check', $_POST['login_check']);
    }
    login($user_name, $user_id, $password);
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
            <input style="background-color: #f7ffc6" type="text" name="user_name" class="form-control mb-3" placeholder="ユーザー名" required />
          </div>
          <div>
            <input style="background-color: #f7ffc6" type="text" name="user_id" class="form-control mb-3" placeholder="社員ID" required />
          </div>
          <div>
            <input style="background-color: #f7ffc6" type="password" name="password" class="form-control mb-3" placeholder="パスワード" required />
          </div>
          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" name="login_check" value="1" checked />
            <label class="form-check-label" for="login_check"> ログイン状態を維持する </label>
          </div>
          <button class="btn btn-primary w-100" type="submit" name="login">ログイン</button>
          <!-- <button class="btn-info rounded-pill">themecolor</button> -->
        </form>
        <div class="row">
          <div class="mt-3 text-center"><a href="create.html">アカウントをお持ちではない場合</a></div>
          <div class="mt-3 text-center"><a href="post.html">post仮置き</a></div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>