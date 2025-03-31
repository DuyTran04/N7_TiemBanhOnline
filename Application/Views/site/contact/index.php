<?php view('shared.site.header', [
    'title' => 'Contact'
]); ?>
<style>
    .contact-banner {
        background-image: url("./public/uploads/<?= $banners[0]['image'] ?>");
    }
</style>
<section class="banner contact-banner">
    <div class="container-fluid banner-title">
        <div class="row">
            <div class="col-md-12">
                <h2 id="motto">Liên hệ</h2>
                <span>Home</span> &nbsp;<span>\\</span> &nbsp;<span>Liên hệ</span>
            </div>

        </div>
    </div>

    <div class="container-fluid banner-share">
        <div class="row">
            <span>Share this page:</span>
            <div class="banner-social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
        </div>

    </div>

</section>


<section class="contact p-50">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="contact-info">
                    <h2>Thông tin liên hệ</h2>
                    <p class="contact-loc-desc">
                    Tiệm bánh nằm ở vị trí thuận tiện ở trung tâm thành phố, là một con phố ấm cúng với đầy đủ các điểm mua sắm và bãi đậu xe dễ dàng.
                    </p>

                    <div class="contact-detail">
                        <ul>
                            <li>
                                <div class="contact-detail-block">
                                    <div class="contact-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>

                                    <div class="contact-info">
                                        <h4>Địa điểm</h4>
                                        <p>Vincom Mall</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="contact-detail-block">
                                    <div class="contact-icon">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>

                                    <div class="contact-info">
                                        <h4>Điện thoại</h4>
                                        <div class="hotline">
                                            <span style="vertical-align: top;">Hotline: </span>
                                            <p class="phone">012.3456.7897 
                                                <br>012.3456.7897
                                            </p>
                                        </div>
                                        <p>Telephone: <span class="phone">012.3456.7897</span></p>


                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="contact-detail-block">
                                    <div class="contact-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>

                                    <div class="contact-info">
                                        <h4>Email</h4>
                                        <p>tiembanh@support.com</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="contact-form-block">
                    <h2>Nhập thông tin</h2>
                    <form method="POST" name="contactForm" class="contact-form" action="./?controller=contact&action=submitForm" onsubmit="return validateContactForm();">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Họ tên *" id="ct-name" onkeyup="validateName(this, 'Name')" value="<?= !empty($_SESSION['user']) ? $_SESSION['user']['fname'] . ' ' . $_SESSION['user']['lname'] : ''  ?>">
                            <small id="ct-name-err"></small>

                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Địa chỉ Email *" id="ct-email" onkeyup="validateEmail(this)" value="<?= !empty($_SESSION['user']) ? $_SESSION['user']['email'] : ''  ?>">
                            <small id="ct-email-err"></small>

                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" placeholder="Số điện thoại *" id="ct-phone" onkeyup="validatePhone(this)" value="<?= !empty($_SESSION['user']) ? $_SESSION['user']['phone'] : ''  ?>">
                            <small id="ct-phone-err"></small>

                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" placeholder="Lời nhắn *" id="ct-msg" onkeyup="validateLength(this, 'Message', 500)"></textarea>
                            <small id="ct-msg-err"></small>

                        </div>

                        <div class="form-group">
                            <button type="submit" class="send-mess-btn" id="send-msg-btn">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<app-map></app-map>

<section class="bottom-banner">
    <img src="assets/img/about/logo-banner.png" alt="">
</section>
<?php view('shared.site.footer') ?>