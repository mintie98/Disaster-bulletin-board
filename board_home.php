<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>災害用掲示板</title>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <!-- icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <header>
    <?php
    if (true) {
      include 'navbar_user.php';
    } else {
      include 'navbar_admin.php';
    }
    ?>
  </header>
  //TODO ドロップダウン その他
  <main class="container">
    <div class="row justify-content-center">
      <h2 class="text-center mt-3 mb-5">災害情報</h2>
      <!-- 画面遷移 -->
      <div style="width:75%; height:20vh" class="row p-0 m-0">
        <div class="col btn btn-primary text-white d-flex align-items-center justify-content-center" onclick="location.href='./post.html'">
          <div class="h1 m-0">安否確認</div>
        </div>
        <div class="col btn btn-primary text-white ms-3 d-flex align-items-center justify-content-center" onclick="location.href='./post.html'">
          <div class="h1 m-0">業務連絡</div>
        </div>
      </div>
    </div>
  </main>
  <footer style="height: 5vh;" class="fixed-bottom bg-secondary">
    <div class="d-flex justify-content-around align-items-center h-100">
      <a href="" class="text-white"><i class="fas fa-home"></i></a>
      <a href="" class="text-white"><i class="fas fa-comment"></i></a>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>