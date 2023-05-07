<?php
// 情報をデータベースに入れる
// setcookie('login_conf', date('Y-m-d H:i:s'));

require_once dirname(__FILE__) . '/function/function.php';
$a = true;
$admin = true;
?>

<!DOCTYPE html>
<html lang="ja">
<!-- 会員の方はこちら -->

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>掲示板</title>
  <!-- tailwind css -->
  <link href="./css/output.css" rel="stylesheet">
  <!-- css -->
  <link href="./css/my_style.css" rel="stylesheet">
  <!-- icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-back-color">
  <?php
  // if ($a) {
  // include 'navbar_admin.php';
  // } else {
  //   include 'navbar_user.php';
  // }
  // 
  ?>

  <main class="container mx-auto">
    <!-- user nemu -->
    <?php
    if ($a) {
    ?>
      <div class="flex flex-wrap justify-center">
        <!-- 1つ目 -->
        <div class="max-w-sm w-full m-5 mt-10" onclick="location.href='./disaster.php'">
          <div class="border border-gray-800 bg-white rounded-2xl  flex flex-col justify-between leading-normal">
            <div class="flex justify-end pt-2 pr-2">
              <div class="w-12 h-12 bg-gray-700 rounded-full flex items-center justify-center"><span class="flex items-center"><i class="fa-solid fa-pen text-2xl" style="color: #fafafa;"></i></span></div>
            </div>
            <div class="text-gray-900 font-bold flex justify-center text-2xl">あんぴほうこく</div>
            <div class="text-gray-900 font-bold text-6xl flex justify-center pb-12">安否報告</div>
          </div>
        </div>
        <!-- 2つ目 -->
        <div class="max-w-sm w-full m-5 mt-10" onclick="location.href='./disaster.php'">
          <div class="border border-gray-800 bg-white rounded-2xl flex flex-col justify-between leading-normal">
            <div class="flex justify-end pt-2 pr-2">
              <div class="w-12 h-12 bg-gray-700 rounded-full flex items-center justify-center"><span class="flex items-center"><i class="fa-solid fa-list text-2xl" style="color: #fafafa;"></i></span></div>
            </div>
            <div class="text-gray-900 font-bold flex justify-center text-2xl">あんぴかくにん</div>
            <div class="text-gray-900 font-bold text-6xl flex justify-center pb-12">安否確認</div>
          </div>
        </div>
        <!-- 3つ目 (奇数調整)-->
        <div class="max-w-sm w-full m-5 flex-auto"></div>
      </div>
    <?php
    }
    ?>
    <!-- admin nemu -->
    <?php
    if (!$a) {
    ?>
      <div class="relative flex justify-center items-center my-16 mx-auto text-gray-800">
        <button class="bg-btn w-10/12 h-52 rounded-lg flex items-center justify-center" onclick="location.href='./disaster.php'">
          <div class="m-0 text-9xl font-body font-bold tracking-widest">報告</div>
        </button>
      </div>
      <div class="relative flex justify-center items-center mb-3 text-gray-800">
        <button class="bg-btn w-10/12 h-52 rounded-lg flex items-center justify-center" onclick="location.href='./all_info.php'">
          <div class="m-0 text-9xl font-body font-bold tracking-widest">一覧</div>
        </button>
      </div>
    <?php
    }
    ?>
  </main>
  <?php
  // include 'footer.php';
  ?>
  <script src="./js/navbar.js"></script>
</body>

</html>