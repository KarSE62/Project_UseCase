<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="/CSS/navbar.css">
    <link rel="stylesheet" href="/CSS/registerPage.css">

    <title>Login FriendZone</title>

</head>

<body>
    <?php require('components/navbar.php'); ?>
    <div class="container">

        <div class="row">
        <?php if(session()->getFlashdata('msg1')): ?>
                    <div class="alert alert-success text-center"><?= session()->getFlashdata('msg1') ?></div>
                    <?php endif ?>
            <div class="col-sm-6" id="cover">
                <img src="https://shorturl.asia/q1fW8" class="cover">
            </div>

            <div class="col-sm-6">
                <!-- <center>
                    <img src="https://shorturl.asia/Yc7Sf" class="logo">
                </center> -->

                <div class="form">
                    <center>
                        <img src="https://shorturl.asia/Yc7Sf" class="logo-form">
                    </center>
                    <form action="/LoginController/auth" method="post">
                    <?php if(session()->getFlashdata('msg')): ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                    <?php endif ?>
                        <input type="text" class="form-control bar" id="userName" placeholder="ชื่อบัญชีผู้ใช้" name="userName" value="<?= set_value('userName'); ?>" require>
                        <input type="password" class="form-control bar" id="password" placeholder="รหัสผ่าน" name="password" value="<?= set_value('password'); ?>" require>
                        <button type="submit" id="btn">เข้าสู่ระบบ</button>

                        <span>
                            ยังไม่มีบัญชีผู้ใช้ใช่หรือไม่?
                            <a href="/register" class="regis" style="text-decoration: none;">สมัครสมาชิก</a>
                        </span>
                    </form>
                    
                </div>
            </div>

        </div>
    </div>
</body>

</html>