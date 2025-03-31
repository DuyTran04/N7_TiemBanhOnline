<?php view('shared.site.header', [
    'title' => 'About'
]); ?>
<style>
    .banner {
        background-image: url("./public/uploads/<?= $banners[0]['image'] ?>");
    }
</style>
<!-- Start of banner -->
<section class="banner">
    <div class="container-fluid banner-title">
        <div class="row">
            <div class="col-md-12">
                <h2 id="motto">About us</h2>
                <span>Home</span> &nbsp;<span>\\</span> &nbsp;<span>Thông tin</span>
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
<!-- End of banner -->


<!-- Start of history -->
<section class="history">
    <div class="container-fluid content-block">

        <ul>
            <li>
                <div class="cupcake-img">
                    <img src="./public/site/img/about/cupcake.png" alt="">
                </div>
            </li>
            <li>
                <div class="intro">
                    <div class="content-title-block">
                        <h2 class="block-title">Tiệm bánh là một trong những tiệm lâu đời nhất</h2>
                        <p class="block-motto"><span>LỊCH SỬ CỦA CỬA HÀNG</span></p>
                    </div>

                    <div class="content">
                        <p>Với 25 năm hoạt động, chúng tôi đã không ngừng nỗ lực để mang đến những sản phẩm chất lượng. Chúng tôi luôn tận tâm phục vụ khách hàng, không ngại thử nghiệm và sáng tạo để mang lại trải nghiệm tốt nhất. Đối với chúng tôi, mỗi chiếc bánh không chỉ là một món ăn mà còn là một phần của sự đam mê và cống hiến. </p>
                        <p>Chúng tôi luôn đề cao chất lượng và sự hài lòng của khách hàng. Mọi sản phẩm đều được làm từ nguyên liệu tốt nhất, đảm bảo an toàn và hương vị tuyệt hảo. Sự tin tưởng và yêu mến của khách hàng là động lực lớn nhất giúp chúng tôi phát triển suốt những năm qua.</p>
                        <p>Tận tâm, sáng tạo và chất lượng là những giá trị cốt lõi mà chúng tôi luôn theo đuổi. Mỗi ngày, chúng tôi không ngừng học hỏi và cải tiến để mang đến những sản phẩm tốt hơn, phục vụ khách hàng một cách tốt nhất.</p>

                    </div>

                    <div class="signature">
                        <img src="./public/site/img/about/sign.png" alt="">
                        <div>
                            <h6>Golden Ramsay</h6> <span> - Store owner</span>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>
<!-- End of history -->


<!-- Start of why choose us -->
<section class="why-choose-us p-50">
    <div class="container-fluid section-main">
        <div class="title-block">
            <p class="block-title">Why choose us</p>
            <p class="block-motto"><span>BEST PRODUCTS</span></p>
        </div>

        <div class="container content-block">
            <ul id="why-list">
                <li class="list-item">
                    <ul>
                        <li>
                            <div class="why-block left">
                                <div class="circle">
                                    <img src="./public/site/img/about/healthy.png" alt="">
                                </div>
                                <div class="why-reason">
                                    <h5>Tốt cho sức khỏe</h5>
                                    <p>Được làm với sự quan tâm đến sức khỏe của bạn</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="why-block left">
                                <div class="circle">
                                    <img src="./public/site/img/home/whychooseus/organic.png" alt="">
                                </div>
                                <div class="why-reason">
                                    <h5>100% thực phẩm</h5>
                                    <p>Thực phẩm chất lượng</p>
                                </div>
                            </div>
                        </li>
                    </ul>

                </li>


                <li class="list-item">
                    <img src="./public/site/img/home/images/basket5.png" alt="">
                </li>
                <li class="list-item">
                    <ul>
                        <li>
                            <div class="why-block right">
                                <div class="circle">
                                    <img src="./public/site/img/home/whychooseus/free-delivery.png" alt="">
                                </div>
                                <div class="why-reason">
                                    <h5>Miễn phí vận chuyển</h5>
                                    <p>Áp dụng đơn hàng 500k</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="why-block right">
                                <div class="circle">
                                    <img src="./public/site/img/about/quality.png" alt="">
                                </div>
                                <div class="why-reason">
                                    <h5>Sản phẩm chất lượng cao</h5>
                                    <p>Đáp ứng tiêu chuẩn vượt trội</p>
                                </div>
                            </div>
                        </li>
                    </ul>



                </li>
            </ul>
        </div>
    </div>
</section>

<!-- End of why choose us -->

<!-- Start of Meet our chef -->
<section class="meet p-50">
    <div class="container-fluid section-main">
        <div class="title-block">
            <p class="block-title">Thành viên</p>
            <p class="block-motto"><span>Nhóm 07</span></p>
        </div>

        <div class="container-fluid" style="margin-top: 40px;">
            <div class="content-block">
                <ul id="chef-list">


                    <li>
                        <div class="chef-block">
                            <div class="chef-img">
                                <img src="./public/site/img/about/green-android-icon-31.png" alt="" style=" border-radius: 100%">
                            </div>
                            <div class="chef-info">
                                <h5>Trần Đình Anh Duy</h5>
                            </div>
                            <div class="chef-social">
                                <a href="https://www.facebook.com/duy.tran.869109"><i class="fab fa-facebook-f"></i></a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="chef-block">
                            <div class="chef-img">
                                <img src="./public/site/img/about/locnguyen.png" alt="" style=" border-radius: 100%">
                            </div>
                            <div class="chef-info">
                                <h5>Nguyễn Trường Vĩnh Lộc</h5>
                            </div>
                            <div class="chef-social">
                                <a href="https://www.facebook.com/loc.nguyen.238339"><i class="fab fa-facebook-f"></i></a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="chef-block">
                            <div class="chef-img">
                                <img src="./public/site/img/about/nguyenle.png" alt="" style=" border-radius: 100%">
                            </div>
                            <div class="chef-info">
                                <h5>Lê Huỳnh Hồng Nguyên</h5>
                            </div>
                            <div class="chef-social">
                                <a href="https://www.facebook.com/JakeJK123"><i class="fab fa-facebook-f"></i></a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="chef-block">
                            <div class="chef-img">
                                <img src="./public/site/img/about/quanvan.png" alt="" style="background: lightblue; border-radius: 100%">
                            </div>
                            <div class="chef-info">
                                <h5>Văn Hồng Quân</h5>
                            </div>
                            <div class="chef-social">
                                <a href="https://www.facebook.com/hong.quan.652441"><i class="fab fa-facebook-f"></i></a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="chef-block">
                            <div class="chef-img">
                                <img src="./public/site/img/about/toaido.png" alt="" style="background: lightblue; border-radius: 100%">
                            </div>
                            <div class="chef-info">
                                <h5>Đỗ Danh Toại</h5>
                            </div>
                            <div class="chef-social">
                                <a href="https://www.facebook.com/otoai.172808"><i class="fab fa-facebook-f"></i></a>
                            </div>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</section>
<!-- End of Meet our chef -->


<section class="bottom-banner"> 
    <img src="./public/site/img/about/logo-banner.png" alt="">
</section>

<?php view('shared.site.footer'); ?>