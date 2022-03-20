<!DOCTYPE html>
<html lang="en">
<?php
$con = mysqli_connect("localhost", "root", "", "friendzone") or die("Error: " . mysqli_error($con));
?>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post Page</title>
    <link rel="stylesheet" href="/CSS/navbar.css">
    <link rel="stylesheet" href="/CSS/post.css">
    <link rel="stylesheet" href="/CSS/createPost.css">
</head>

<body>
    <?php
    $sql_category = "SELECT * FROM category";
    $query = mysqli_query($con, $sql_category);

    $sql_provinces = "SELECT * FROM provinces";
    $query1 = mysqli_query($con, $sql_provinces);
    ?>
    <?php $session = session(); ?>
    <?php require('components/navbaruser.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="form">
                    <form action="/PostController/editPostSave" method="post">
                        <h3>แก้ไขรายละเอียดกิจกรรม</h3>

                        <div class="mb-3">
                        <input type="hidden" class="form-control" name="postId"  value="<?php echo $posts[0]['postId']?>">
                            <label class="form-label">หัวข้อ</label>
                            <input type="text" class="form-control" name="postTitle" placeholder="ใส่หัวข้อกิจกรรมที่คุณต้องการโพสต์" value="<?php echo $posts[0]['postTitle']?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">หมวดหมู่</label>
                            <select class="custom-select" name="categoryId" >
                                <option selected ><?php echo $posts[0]['name_category']?></option>
                                <?php foreach ($query as $value) { ?>
                                    <option value="<?= $value['categoryId'] ?>"><?= $value['name_category'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">รูปกิจกรรม</label>
                            <cancel>
                                <div class="imgact">
                                    <center>
                                        <input class="inputimg form-control" type="file" name="" id="formFile">
                                    </center>
                                </div>
                                <input type="text" class="form-control" id="testimg" name="imagePost" value="<?php echo $posts[0]['imagePost']?>">
                            </cancel>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">รายละเอียด</label>
                            <input type="text" class="form-control" id="detail1" name="detailPost" placeholder="รายละเอียดเบื้องต้นเกี่ยวกับทริปของคุณ" value="<?php echo $posts[0]['detailPost']?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">หมายเหตุ</label>
                            <input type="text" class="form-control" id="detail2" name="note" placeholder="หมายเหตุเพิ่มเติม เช่น เพศชายเท่านั้น" value="<?php echo $posts[0]['note']?>">
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label class="form-label">จำนวนคน</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="num_people" value="<?php echo $posts[0]['num_people']?>">
                                    <span class="input-group-text">คน</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">ค่าใช้จ่าย</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="expenses" value="<?php echo $posts[0]['expenses']?>">
                                    <span class="input-group-text">บาท</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">สถานที่</label>

                            <div class="row">
                                <div class="col">
                                    <select class="form-select" aria-label="Default select example" name="province" id="provinces">
                                        <option selected><?php echo $posts[0]['name_th']?></option>
                                        <?php foreach ($query1 as $value_province) { ?>
                                            <option value="<?= $value_province['id'] ?>"><?= $value_province['name_th'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-select" aria-label="Default select example" name="district" id="amphures">
                                        <option selected><?php echo $posts[0]['name_th_am']?></option>

                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-select" aria-label="Default select example" name="subDistrict" id="districts">
                                        <option selected><?php echo $posts[0]['name_th_dis']?></option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">วันที่ไป</label>
                            <input type="date" class="form-control" id="date_start" name="date_start" value="<?php echo $posts[0]['date_start']?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">วันที่กลับ</label>
                            <input type="date" class="form-control" id="date_end" name="date_end" value="<?php echo $posts[0]['date_end']?>">
                        </div>

                    

                        <center>
                            <button class="btn button" type="submit">แก้ไข</button> &nbsp;
                            <a href="/showdata" type="button" class="btn cancel">
                                <label>ยกเลิก</label>
                            </a>
                        </center>

                    </form>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </div>

</body>

</html>
<?php include('script.php');?>