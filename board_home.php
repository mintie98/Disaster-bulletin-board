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
  <!-- icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body {
      /* background-color: #E9722E; */
      background-color: #80BB6B;
    }

    /* .absolute {
      color: #E9722E;
    } */

    .bg-btn {
      /* background-color: #80BB6B; */
      background-color: #FFFFFF;
    }
  </style>
</head>

<body>
  <header>
    <?php
    // if ($a) {
    include 'navbar_admin.php';
    // } else {
    //   include 'navbar_user.php';
    // }
    // 
    ?>
  </header>

  <main class="container mx-auto">
    <div class="justify-center items-">
      <!-- user nemu -->
      <?php
      if ($a) {
      ?>
        <div class="relative flex justify-center items-center my-16 mx-auto text-black">
          <i class="absolute -top-10 left-2 text-7xl fa fa-file-pen"></i>
          <button class="bg-btn w-10/12 h-52 rounded-lg flex items-center justify-center" onclick="location.href='./disaster.php'">
            <ruby>
              <span class="m-0 text-9xl font-body font-bold tracking-widest">報告</span>
              <rt class="m-0 text-3xl font-body font-bold">ほうこく</rt>
            </ruby>
          </button>
        </div>
        <div class="relative flex justify-center items-center mb-3 text-black">
          <i class="absolute -top-10 left-2 text-7xl fa-solid fa-list"></i>
          <button class="bg-btn w-10/12 h-52 rounded-lg flex items-center justify-center" onclick="location.href='./all_info.php'">
            <ruby>
              <span class="m-0 text-9xl font-body font-bold tracking-widest">一覧</span>
              <rt class="m-0 text-3xl font-body font-bold">いちらん</rt>
            </ruby>
          </button>
        </div>
      <?php
      }
      ?>
      <!-- admin nemu -->
      <?php
      if (!$a) {
      ?>
        <div class="flex flex-wrap justify-center items-center mb-3 mx-auto text-black">
          <button class="bg-btn w-40 h-40 p-5 rounded-lg flex items-center justify-center" <?= $admin ? '' : 'disabled' ?> onclick="location.href='./disaster.php'">
            <div class="m-0 text-3xl">災害時<br> 安否確認</div>
          </button>
          <button class="bg-btn w-40 h-40 p-5 rounded-lg  ms-3 flex items-center justify-center" <?= $admin ? '' : 'disabled' ?> onclick="location.href='./all_info.php'">
            <div class="m-0 text-3xl">一覧</div>
          </button>
        </div>

      <?php
      }
      ?>
    </div>
  </main>
  <script src="./js/navbar.js"></script>
</body>

</html>