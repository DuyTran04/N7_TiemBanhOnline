<?php require('./Config/province.php'); ?>
<?php if (empty($_SESSION['user'])) : ?>
    <button class="signup-modal" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">
        <i class="fas fa-user" style="font-size: 12px;"></i>Đăng ký
    </button>
<?php endif; ?>

<div id="id02" class="modal">
    <form action="?controller=verify&action=signup" method="post" class="modal-content modal-dialog animate modal-dialog-centered" name="signupForm" onsubmit="return validateSignupForm();">

        <div class="main-form-content">
            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
            <h5 class="text-center">Đăng ký tài khoản</h5>
            <hr>
            <div class="row mb-3">

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label for="fname">Tên</label>
                    <input type="text" placeholder="Nhập tên của bạn *" name="fname" id="su-fname" onkeyup="validateName(this, 'First name')">
                    <small id="su-fname-err"></small>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label for="lname">Họ</label>
                    <input type="text" placeholder="Nhập họ của bạn *" name="lname" id="su-lname" onkeyup="validateName(this, 'Last name')">
                    <small id="su-lname-err"></small>
                </div>




            </div>


            <div class="row mb-3">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label for="email">Email</label>
                    <input type="text" placeholder="Nhập địa chỉ Email của bạn *" name="email" id="su-email" onkeyup="validateEmail(this)">
                    <small id="su-email-err"></small>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" placeholder="Nhập số điện thoại *" name="phone" id="su-phone" onkeyup="validatePhone(this)">
                    <small id="su-phone-err"></small>
                </div>

            </div>

            <label for="province">Tỉnh/Thành phố</label>
            <select id="province-sign" name="province" class="mb-3">
                <?php foreach ($provinces as $province) : ?>
                    <option value="<?= $province['value'] ?>" <?php //$user->province == $province['value'] ? 'selected' : '' 
                                                                ?>><?= $province['province'] ?></option>
                <?php endforeach; ?>
            </select>

            <label for="address">Địa chỉ</label>
            <input type="text" class="mb-3" placeholder="Nhập địa chỉ của bạn *" name="address" id="su-address" onkeyup="validateNotEmpty(this, 'Address')">
            <small id="su-address-err"></small>



            <div class="row mb-3">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                    <label for="psw">Mật khấu</label>
                    <input type="password" placeholder="Tạo mật khẩu *" name="password" id="su-psw" onkeyup="validatePassword(this)">
                    <small id="su-psw-err"></small>

                </div>

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label for="psw-repeat">Nhập lại mật khẩu</label>
                    <input type="password" placeholder="Nhập lại mật khẩu*" name="password_confirmation" id="su-psw-rep" onkeyup="validateConfirmPassword(this, 'su-psw')">
                    <small id="su-psw-rep-err"></small>
                </div>

            </div>

            <p class="text-center" style="margin-bottom: 0; margin-top: 16px">
            Bằng cách tạo một tài khoản, bạn đồng ý với chúng tôi
                <a href="#" style="color:var(--primary-color)">
                Điều khoản & Quyền riêng tư</a>.
            </p>

            <div class="clearfix">

                <button type="submit" class="signup-btn login-btn">Đăng ký</button>
            </div>
        </div>

    </form>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('id02');


    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>