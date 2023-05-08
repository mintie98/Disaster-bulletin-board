
<?php
// データを保存
require_once "define.php";
session_start();
$_SESSION["error"] = "";

// フォームの送信を待機する
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // 入力されたデータを処理する
  $userid = $_POST["user_id"];
  $username = $_POST["name"];
  $gender = $_POST["gender"];
  $telephone = $_POST["tel"];
  $address = $_POST["address"];
  $mail = $_POST["mail"];
  $mgr = $_POST["mgr"];
  $password = $_POST["password"];
  $password_conf = $_POST["password_conf"];

 // データベースに接続
  $options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
    ];
  $db = new PDO("mysql:host=localhost;dbname=day_service;charset=utf8mb4", "usertest", "test",$options);

  // Password Check
  if ($password != $password_conf) {
    $message = "パスワードが一致しません。もう一度入力してください。";
    exit;
  } else {
    // データベースに同じID or emailが存在しないことを確認する
    $stmt = $db->prepare("SELECT COUNT(*) FROM user WHERE user_id = ? OR user_mail = ?");
    $stmt->execute([$userid, $mail]);
    $count = $stmt->fetchColumn();

    if ($count > 0) {
      $message = "ユーザーIDまたはメールアドレスが既に使用されています。別のユーザーIDまたはメールアドレスを使用してください。";
    } else {
      // Hash password
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      // $db->beginTransaction();
      // データベースにユーザー情報を登録する
      $stmt = $db->prepare("INSERT INTO user (USER_ID, USER_NAME,USER_GENDER, USER_PASS, USER_TEL, USER_ADDRESS, USER_MAIL,USER_MGR) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->execute([ $userid,$username,$gender,$hashed_password,$telephone,$address,$mail,$mgr ]);
    $db->commit();
      // 登録が完了したら、ログインページにリダイレクトする
      header("Location: login.php");
      exit;
    }
  }
}
?>

<?php
if (isset($_POST['send'])) {
  $user_id = $_POST['user_id'];
  $name = $_POST['name'];
  $password = $_POST['password'];
  $password_conf = $_POST['password_conf'];

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
  <!-- tailwind css -->
  <link href="./css/output.css" rel="stylesheet">
  <!-- icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-back-color">
  <main>
    <div class="container mx-auto">
      <div class="flex-row justify-center">
        <h1 class="text-center my-4 mx-auto">アカウント作成</h1>
        <form action="" method="post">
          <!-- id -->
          <div class="relative mb-5 m-5 md:w-3/4">
            <input type="number" name="user_id" id="user_id" class="block p-4 w-full h-16 text-lg text-black rounded-lg border-2 bg-white focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="user_id" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-2 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-2 left-1">ID</label>
          </div>
          <!-- name -->
          <div class="relative mb-5 m-5 md:w-3/4">
            <input type="text" name="name" id="name" class="block p-4 w-full h-16 text-lg text-black rounded-lg border-2 bg-white focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="name" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-2 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-2 left-1">名前</label>
          </div>
          <!-- 性別 -->
          <div class="flex flex-wrap justify-center border bg-white m-5 rounded-lg p-5">
            <div class="flex items-center mr-auto ml-0">性別</div>
            <div class="flex flex-row justify-center">
              <div class="inline-block mx-2">
                <input type="radio" id="female" name="gender" value="女性" class="hidden peer" required>
                <label for="female" class="inline-flex items-center justify-between w-full px-5 py-3 text-black bg-white border border-gray-900 rounded-lg cursor-pointer peer-checked:border-black peer-checked:bg-black peer-checked:text-white">女性</label>
              </div>
              <div class="inline-block mx-2">
                <input type="radio" id="male" name="gender" value="男性" class="hidden peer">
                <label for="male" class="inline-flex items-center justify-between w-full px-5 py-3 text-black bg-white border border-gray-900 rounded-lg cursor-pointer peer-checked:border-black peer-checked:bg-black peer-checked:text-white">男性</label>
              </div>
            </div>
          </div>
          <!-- tel -->
          <div class="relative mb-5 m-5 md:w-3/4">
            <input type="tel" name="tel" id="tel" class="block p-4 w-full h-16 text-lg text-black rounded-lg border-2 bg-white focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="tel" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-2 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-2 left-1">電話番号</label>
          </div>
          <!-- address -->
          <div class="relative mb-5 m-5 md:w-3/4">
            <input type="text" name="address" id="address" class="block p-4 w-full h-16 text-lg text-black rounded-lg border-2 bg-white focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="address" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-2 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-2 left-1">住所</label>
          </div>
          <!-- mail -->
          <div class="relative mb-5 m-5 md:w-3/4">
            <input type="email" name="mail" id="mail" class="block p-4 w-full h-16 text-lg text-black rounded-lg border-2 bg-white focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="mail" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-2 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-2 left-1">メール</label>
          </div>
          <!-- mgr -->
          <div class="relative mb-5 m-5 md:w-3/4">
            <input type="text" name="mgr" id="mgr" class="block p-4 w-full h-16 text-lg text-black rounded-lg border-2 bg-white focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="mgr" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-2 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-2 left-1">職員</label>
          </div>
          <!-- password -->
          <div class="relative mb-5 m-5 md:w-3/4">
            <input type="password" name="password" id="password" class="block p-4 w-full h-16 text-lg text-black rounded-lg border-2 bg-white focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="password" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-2 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-2 left-1">パスワード</label>
          </div>
          <!-- password_conf -->
          <div class="relative mb-5 m-5 md:w-3/4">
            <input type="password" name="password_conf" id="password_conf" class="block p-4 w-full h-16 text-lg text-black rounded-lg border-2 bg-white focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="password_conf" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-2 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-2 left-1">パスワード確認</label>
          </div>
          <!-- 送信ボタン -->
          <div class="flex justify-center">
            <button type="submit" name="submit" class="w-40 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">登録</button>
          </div>
        </form>
      </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
