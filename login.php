<?php
// require_once dirname(__FILE__) . '/function/db_connection.php';
session_start();

function login($user_name, $user_id, $password, $password_conf)
{
  if (isset($_POST['send'])) {
    if ($password != $password_conf) {
      echo "<div class='alert alert-warning'>パスワードが一致しません</div>";
    }
  }
  header('Location: board_home.php');
}

if (isset($_COOKIE['login_check'])) {
  // 前回のログイン時ログインチェックONの場合
  header('Location: board_home.php');
  exit();
} else {
  // 前回のログイン時ログインチェックOFFの場合
  if (isset($_POST['login'])) {
    $name = $_POST['user_id'];
    $password = $_POST['password'];
    $password_conf = $_POST['password_conf'];

    login($user_name, $user_id, $password, $password_conf);
  }
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>login</title>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <!-- icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="--bs-bg-opacity: .25;" class="bg-warning">
  <main class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h1 class="text-center my-3">ログイン</h1>
        <form action="" method="post">
          <div class="form-floating">
            <input type="number" name="id" id="user_id" class="border-0 form-control form-control-lg my-4" placeholder="ID" required />
            <label class="text-muted" for="user_name">ID</label>
          </div>
          <div class="form-floating position-relative">
            <input type="password" name="password" id="password" class="form-control form-control-lg my-4" placeholder="パスワード" required />
            <i class="position-absolute top-50 end-0 translate-middle-y fa fa-eye pe-3" id="password_eye"></i>
            <label class="text-muted" for="password">パスワード</label>
          </div>
          <!-- <div class="form-floating">
            <input type="password" name="password_conf" id="password_conf" class="form-control form-control-lg my-4" placeholder="パスワード確認" required />
            <i class="position-absolute top-50 end-0 translate-middle-y fa fa-eye pe-3" id="password_conf_eye"></i>
            <label for="password_conf">パスワード確認</label>
          </div> -->
          <div class="col form-check mb-2">
            <input class="form-check-input" type="checkbox" name="login_check" value="1" checked />
            <label class="form-check-label mb-3" for="login_check">ログイン状態を維持</label>
          </div>
          <button class="btn btn-primary btn-lg w-100" type="submit" name="login">ログイン</button>
          <div class="mt-2 d-flex justify-content-end"><a href="login_famiry.php">家族用アカウント</a></div>
          <!-- <button class="btn-info rounded-pill">themecolor</button> -->
        </form>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <script>
    const password_eye = document.querySelector('#password_eye');
    password_eye.addEventListener('click', () => {
      const password = document.querySelector('#password');
      if (password.type === 'password') {
        password.type = 'text';
        password_eye.classList.remove('fa-eye');
        password_eye.classList.add('fa-eye-slash');
      } else {
        password.type = 'password';
        password_eye.classList.remove('fa-eye-slash');
        password_eye.classList.add('fa-eye');
      }
    });

    // const password_conf_eye = document.querySelector('#password_conf_eye');
    // password_conf_eye.addEventListener('click', () => {
    //   const password_conf = document.querySelector('#password_conf');
    //   if (password_conf.type === 'password') {
    //     password_conf.type = 'text';
    //     password_conf_eye.classList.remove('fa-eye');
    //     password_conf_eye.classList.add('fa-eye-slash');
    //   } else {
    //     password_conf.type = 'password';
    //     password_conf_eye.classList.remove('fa-eye-slash');
    //     password_conf_eye.classList.add('fa-eye');
    //   }
    // });
  </script>
</body>

</html>