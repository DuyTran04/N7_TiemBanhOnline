<?php
if (!empty($_SESSION['user'])) {
    $user_session = $_SESSION['user']; ?>

    <span class='welcome'>Chào mừng! <?= $user_session['fname'] ?? '' ?> <?= $user_session['lname'] ?? '' ?></span>
    <?php if ($user_session['role'] == 'admin') : ?>
        <a href='?module=admin&controller=customer&controller=dashboard'>
            <button class='login-modal' style='width:auto'><i class="fas fa-user-cog" style='font-size: 14px'></i>Trang quản trị</button>
        </a>
    <?php endif; ?>
    <a href='?controller=customer&action=viewProfile'>
        <button class='login-modal' style='width:auto'><i class='fas fa-user-edit' style='font-size: 14px'></i>Cá nhân</button>
    </a>
    <a href='?controller=customer&action=listOrders'>
        <button class='login-modal' style='width:auto'><i class='fas fa-receipt' style='font-size: 14px'></i>Lịch sử đặt hàng</button>
    </a>
    <a href='?controller=verify&action=logout'>
        <button class='login-modal' style='width:auto'><i class='fas fa-sign-out-alt' style='font-size: 14px'></i>Đăng xuất</button>
    </a>
<?php } else { ?>
    <button class='login-modal' onclick="document.getElementById('id01').style.display='block'" style='width:auto'><i class='fas fa-sign-in-alt' style='font-size: 14px'></i>Đăng nhập</button>
<?php } ?>

<div id="id01" class="modal">

    <form action="?controller=verify&action=login" class="modal-content animate" method="post" name="loginForm" onsubmit="return validateLoginForm();">

        <div class="row">

            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                <div class="img-container">
                    <img src="./public/site/img/login-signup/login-pic.png" alt="Avatar" class="avatar">
                </div>
            </div>


            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                <div class="main-form-content">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

                    <h5 class="text-center">Chào mừng bạn đến với trang đăng nhập !</h5>
                    <p class="text-center" style="margin-bottom: 3rem;">Hãy đăng nhập tại đây</p>

                    <label for="email"></label>
                    <input type="text" placeholder="Email *" name="email" id="li-email" onkeyup="validateEmail(this)">
                    <small id="li-email-err"></small>


                    <label for="psw"></label>
                    <input type="password" placeholder="Mật khẩu *" name="password" id="li-psw" onkeyup="validateNotEmpty(this, 'Password')">
                    <small id="li-psw-err"></small>


                    <div class="round">
                        <input type="checkbox" id="checkbox" name="remember" />
                        <label for="checkbox"></label>
                        <span style="margin-left: 15px;">Nhớ mật khẩu</span>
                    </div>




                    <button type="submit" class="login-btn">Đăng nhập</button>

                    <div class="signup-suggest">
                        <span>Nếu bạn không có tài khoản đăng nhập. </span>
                        <span onclick="document.getElementById('id01').style.display='none'; document.getElementById('id02').style.display='block'">
                            Hãy đăng ký tại đây</span>
                    </div>
                </div>
            </div>

        </div>





    </form>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>