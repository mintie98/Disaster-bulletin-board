<?php
require_once dirname(__FILE__) . '/function/function.php';
$title = new Title;
$a = true;
$i = 0;
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>安否情報</title>
  <!-- tailwind css -->
  <link href="./css/output.css" rel="stylesheet">
  <!-- icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <header>
    <?php
    $title->setTitle("情報");
    if ($a) {
      include 'navbar_admin.php';
    } else {
      include 'navbar_user.php';
    }
    ?>
  </header>

  <main class="container">
    <div class="row justify-content-center">
      <h2 class="text-center mt-3 mb-5">情報</h2>
      <!-- 画面遷移 -->

      <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-white uppercase">
            <tr>
              <th scope="col" class="px-6 py-3 bg-gray-800">
                名前
              </th>
              <th scope="col" class="px-6 py-3 bg-gray-800">
                安否情報
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($i < 10) {
            ?>
            <tr class="border-b border-gray-200 dark:border-gray-700">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                田中太郎
              </th>
              <td class="px-6 py-4">
                無傷
              </td>
            </tr>
            <?php
            $i++;
            }
            ?>
          </tbody>
        </table>
      </div>

    </div>
  </main>
  <?php
  include 'footer.php';
  ?>
  <script src="./js/navbar.js"></script>
</body>

</html>