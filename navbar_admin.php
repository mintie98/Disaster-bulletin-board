<nav class="navbar navbar-expand-md bg-dark">
    <div class="navbar-brand ms-3 text-white">災害時連絡掲示板</div>
    <div class="me-3">
        <div class="d-flex justify-content-around align-items-center text-white ms-md-5 ms-3 h3 m-auto">
            <?php
            echo Title::$title;
            ?>
        </div>
    </div>
    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse ms-5" id="navbar-content">
        <ul class="navbar-nav">
            <li class="nav-item"><a href="post.html">post</a></li>
        </ul>
    </div>
</nav>