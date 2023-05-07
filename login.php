<?php
session_start();
// require_once dirname(__FILE__) . '/function/db_connection.php';
// セッション開始
//ログイン認証
if (isset($_SESSION['pass_save'])) {

  //ログイン維持状態の時ログインページへ飛ぼうとしている
  if (basename($_SERVER['PHP_SELF']) === 'login.php') {
    header("Location:/bord/board_home.php");
  }
} else {
  //ログインページ以外へ飛ぼうとしているときにログインページへ遷移させる
  if (basename($_SERVER['PHP_SELF']) !== 'login.php') {
    header("Location:login.php");
  }
}
if (isset($_POST['login_btn'])) {
  $user_id = $_POST['user_id'];
  $password = $_POST['password'];
  $pass_save = (($_POST['pass_save'] == "true") ? true : false);

  login($user_id, $password, $pass_save);
}

/*
db処理の仮置きあり
*/
function login($user_id, $password, $pass_save)
{
  //   // db情報取得
  //   $conn = connection();
  //   // // ユーザーIDからユーザー情報を取得
  //   $sql = "SELECT * FROM accounts WHERE user_id = '$user_id'";

  //   if ($result = $conn->query($sql)) {
  //     //check username
  //     if ($result->num_rows >= 1) {
  //       $user = $result->fetch_assoc();
  //       //check password
  //       if (password_verify($password, $user['password'])) {
  //         // user_idをセッションに保存
  //         // $_SESSION['user_id'] = $user_id;

  //         //ログイン保持の有無の確認
  if ($pass_save) {
    //ログイン保持する
    $_SESSION['pass_save'] = true;
  }
  header("location: board_home.php");
  //       } else {
  //         echo "<div class="bg-yellow-300 border border-yellow-500 text-yellow-900 p-4 mt-4" role="alert">パスワードが一致しません</div>";
  //       }
  //     }
  //   } else {
  //     echo "<div class='alert alert-warning'>ユーザーIDが一致しません</div>";
  //   }
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>login</title>
  <!-- tailwind css -->
  <link href="./css/output.css" rel="stylesheet">
  <!-- icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-back-color h-screen flex items-center">
  <main class="container mx-auto flex justify-center">
    <div class="w-11/12 md:w-7/12 bg-white flex-row justify-center border border-gray-200 rounded-2xl p-5 mt-10 m-5 shadow-lg">
      <h1 class="font-body text-center justify-center my-4 text-4xl">掲示板</h1>
      <div class="mt-6">
        <!-- ログインフォーム -->
        <div><!--TODO 要素の横幅-->
          <form action="" method="post">
            <!-- ID -->
            <div class="relative mb-5 mx-auto md:w-3/4">
              <input type="number" name="user_id" id="user_id" class="block p-4 w-full h-16 text-lg text-black rounded-lg border-2 bg-white focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="user_id" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-2 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-2 left-1">ID</label>
            </div>
            <!-- パスワード -->
            <div class="relative mb-5 mx-auto md:w-3/4">
              <input type="password" id="password" name="password" class="block p-4 w-full h-16 text-lg text-black rounded-lg border-2 bg-white focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="password" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-2 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-2 left-1">パスワード</label>
              <div class="absolute inset-y-0 right-1 flex my-2 items-center">
                <i class="text-right fa fa-eye pr-3" id="password_eye"></i>
              </div>
            </div>

            <div class="relative mb-5 mx-auto md:w-3/4">
              <input type="checkbox" name="pass_save" id="pass_save" value="true">
              <label for="pass_save">ログイン状態を維持</label>
            </div>
            <div class="relative mb-5 mx-auto flex justify-center">
              <button type="submit" class="w-2/3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" type="submit" name="login_btn" onclick="location.href='./login.php'">ログイン</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>

  <script>
    const password_eye = document.querySelector('#password_eye')
    password_eye.addEventListener('click', () => {
      const password = document.querySelector('#password')
      if (password.type === 'password') {
        password.type = 'text'
        password_eye.classList.remove('fa-eye')
        password_eye.classList.add('fa-eye-slash')
      } else {
        password.type = 'password'
        password_eye.classList.remove('fa-eye-slash')
        password_eye.classList.add('fa-eye')
      }
    })
  </script>

</body>

</html>