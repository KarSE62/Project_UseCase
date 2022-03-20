<script>
    function slidedown() {
        var x = document.getElementById("slidedown");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>

<?php foreach ($posts as $post) { ?>
    <div class="card-post">
        <?php if (session()->getFlashdata('msg')) : ?>
            <div>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'ลบโพสต์ประกาศกิจกรรมสำเร็จ',        
                    })
                </script>
            </div>
        <?php endif ?>
        <div class="card-post-title1">
            <img src="<?php echo $post["userImage"] ?>" class="img-post-profileUser">

            <h6 class="text-post-user"><?php echo $post["FName"] . " " . $post["LName"] ?> </h6>
            <?php if ($post["userId"] == $session->get('userId')) { ?>
                <div class="card-post-dropdown">
                    <a class="dropdown" href="#" id="dropdownMenuLink" data-bs-toggle="dropdown">
                        <i class="fas fa-ellipsis-h"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="/editPost/<?php echo $post["postId"] ?>">แก้ไขกิจกรรม</a></li>
                        <li><a class="dropdown-item" href="/deletePost/<?php echo $post["postId"] ?>">ลบโพสต์</a></li>
                    </ul>
                </div>
            <?php } ?>
            <p class="text-post-title-time">เมื่อสักครู่</p>
        </div>
        <div class="card-post-title2">
            <div class="div-post-title">
                <h5 class="text-post-title"><?php echo $post["postTitle"] ?></h5>
            </div>
        </div>

        <img src="<?php echo $post["imagePost"] ?>" class="card-img-top">

        <div class="card-post-body">
            <div class="row row-post-body">
                <div class="col-8">
                    <i class="far fa-calendar-alt fa-post-calendar"></i>
                    <label class="text-post-date">วันที่ :</label>
                    <span class="span span-post-date">&nbsp;<?php echo $post["date_start"] ?>&nbsp;</span>
                    <label class="text-post-date">ถึง</label>
                    <span class="span span-post-date">&nbsp;<?php echo $post["date_end"] ?></span>

                    <br />

                    <i class="fas fa-map-marker-alt fa-post-location"></i>
                    <label class="text-post-province">จังหวัด :</label>
                    <span class="span span-post-province">&nbsp;<?php echo $post["name_th"] ?></span>

                    <br />

                    <i class="fas fa-users fa-post-numPeople"></i>
                    <label class="text-post-numPeople">ต้องการผู้เข้าร่วม :</label>
                    <span class="span span-post-numPeople">&nbsp;<?php echo $post["num_people"] ?> &nbsp; คน</span>
                </div>

                <div class="col-4">
                    <a href="#" class="text-post-viewDetail">รายละเอียดเพิ่มเติม</a>
                </div>

            </div>

            <div class="post-people-join">
                <i class="fad fa-pennant fa-post-flag"></i>
                <label class="text-post-people-join">ผู้เข้าร่วม :</label>
                <img src="https://shorturl.asia/v8SwY" class="img-post-people-join">
                <img src="https://shorturl.asia/BdVyr" class="img-post-people-join">
                <img src="https://shorturl.asia/3vEMA" class="img-post-people-join">
                <img src="https://shorturl.asia/WMkCY" class="img-post-people-join">
            </div>

            <div class="post-line"></div>

            <div class="post-comment-title btn-show-comment" id="<?php echo $post["postId"] ?>">
                <a class="text-post-comment" id="down">ดูความคิดเห็นทั้งหมด</a>
            </div>

        </div>

        <div class="slidedown">
            <div class="post-comment-body">
                <img src="https://shorturl.asia/BdVyr" class="img-post-user-comment">
                <div class="text-post-user-comment">
                    <span class="span-post-user-comment">
                        <a href="#" class="post-user-comment-username">Yannasit : </a>
                        เดินทางยังไงครับ ??
                    </span>
                </div>
            </div>
            <div class="post-comment-body">
                <img src="<?php echo $post["userImage"] ?>" class="img-post-user-commentOwner">
                <div class="text-post-user-comment">
                    <span class="span-post-user-commentOwner">
                        <a href="#" class="post-user-comment-username"><?php echo $post["FName"] ?> : </a>
                        รถยนต์ส่วนตัวครับ บบบบบบบ บบบบบบ บบบบบบบบ บบบบบบบบบบบบบ บบบบบบบบบบบบบบบบบบ
                    </span>
                </div>
            </div>

            <div class="card-post-footer">
                <img src="<?php echo $session->get('userImage'); ?>" class="img-post-footer-comment">
                <input type="text" class="form-control input-post-footer" placeholder="แสดงความคิดเห็น . . .">
                <a class="fa-post-inbox"><i class="fad fa-inbox-out"></i></a>
            </div>
        </div>

    </div>

    <br>
<?php } ?>