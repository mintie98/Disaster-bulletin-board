<?php
if (isset($_POST['send'])) {
  $user_id = $_POST['user_id'];
  $name = $_POST['name'];
  $user_id = $_POST['password'];
  $password = $_POST['password_conf'];

  if ($company_id != 123) {
    echo "<div class='alert alert-warning'>社員IDが違います</div>";
  }
  if ($password != $password_conf) {
    echo "<div class='alert alert-warning'>パスワードが一致しません</div>";
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
        <h1 class="text-center my-4 mt-5">アカウント作成</h1>
        <form action="" method="post">
          <div>
            <!-- <select style="background-color: #f7ffc6" class="form-select mb-3" name="department" required>
              <option hidden>部署を選択してください</option>
              <option value="部署１">部署１</option>
              <option value="部署２">部署２</option>
            </select> -->
          </div>
          <div>
            <!-- <input style="background-color: #f7ffc6;" type="text" name="company_id" class="form-control mb-3" placeholder="社員ID" required /> -->
          </div>
          <div>
            <input style="background-color: #f7ffc6;" type="text" name="user_id" class="form-control form-control-lg my-4" placeholder="id" required />
          </div>
          <div>
            <input style="background-color: #f7ffc6;" type="text" name="name" class="form-control form-control-lg my-4" placeholder="ユーザー名" required />
          </div>
          <div>
            <input style="background-color: #f7ffc6" type="password" name="password" class="form-control form-control-lg my-4" placeholder="パスワード" required />
          </div>
          <div>
            <input style="background-color: #f7ffc6;" type="password" name="password_conf" class="form-control form-control-lg my-4" placeholder="パスワード確認" required />
          </div>
          <button class="btn btn-primary btn-lg w-100 my-4" type="submit" name="send">アカウント作成</button>
        </form>
        <div class="mt-3 text-center"><a href="login.php">ログイン</a></div>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>