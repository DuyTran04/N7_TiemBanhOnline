<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-7">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a><img src="./public/site/img/home/logo/logo-white.png" alt="" style="width: 111px; height: 56px;"></a>
                    </div>
                    <p>Tiệm bánh mang đến những lựa chọn bánh đa dạng, giúp bạn dễ dàng thưởng thức những hương vị tuyệt vời một cách nhanh chóng và tiện lợi</p>
                    <div class="footer__social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-5">
                <div class="footer__widget">
                    <h5>Liên hệ</h5>
                    <ul id="contact-list">
                        <li><span><i class="fas fa-map-marker-alt"></i>Address:</span><span>Vicom Mall</span></li>
                        <li><span><i class="fas fa-phone-alt"></i>Phone:</span><span>012.3456.7897</span></li>
                        <li><span><i class="far fa-envelope"></i>Email:</span><span>tiembanh@support.com</span></li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4">
                <div class="footer__widget">
                    <h5>Gần đây</h5>
                    <ul id="recent-post-list">
                        <li>
                            <div><img src="./public/site/img/home/footer/recent-post-1.png" alt=""></div>
                            <div>
                                <p>Khách hàng rất vui khi được theo dõi</p>
                                <br>
                                <span>2025</span>
                            </div>
                        </li>
                        <li>
                            <div><img src="./public/site/img/home/footer/recent-post-2.png" alt=""></div>
                            <div>
                                <p>Khách hàng rất vui khi được theo dõi</p>
                                <br>
                                <span>2025</span>
                            </div>
                        </li>


                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-4">
                <div class="footer__widget">
                    <h5>Hình ảnh bánh đẹp</h5>
                    <ul id="insta-list">
                        <li>
                            <div><img src="./public/site/img/home/footer/insta-1.png" alt=""></div>

                        </li>
                        <li>
                            <div><img src="./public/site/img/home/footer/insta-2.png" alt=""></div>

                        </li>
                        <li>
                            <div><img src="./public/site/img/home/footer/insta-3.png" alt=""></div>

                        </li>
                        <li>
                            <div><img src="./public/site/img/home/footer/insta-4.png" alt=""></div>

                        </li>
                        <li>
                            <div><img src="./public/site/img/home/footer/insta-5.png" alt=""></div>

                        </li>
                        <li>
                            <div><img src="./public/site/img/home/footer/insta-6.png" alt=""></div>

                        </li>


                        <!-- <li><a href="#">Orders Tracking</a></li> -->
                    </ul>
                </div>
            </div>  

        </div>

        <hr>

        <div class="footer__newsletter">
            <ul>
                <li>
                    <div class="footer__newsletter__text">
                        <span>Nhập email của bạn bên dưới để nhận</span><br>
                        <h5>Email</h5>
                    </div>
                </li>

                <li>
                    <form action="#">
                        <input type="text" placeholder="Nhập Email">

                        <button type="submit" class="site-btn">Gửi</button>

                    </form>
                </li>
            </ul>

        </div>



    </div>


    <div class="container-fluid">
        <div class="row copyright">
            <div class="col-md-12 p-0">
                <div class=" footer__copyright__text">
                    <p>Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This
                        template is made by The One
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Chatbot Widget -->
    <?php require('./Application/Views/shared/site/chatbot.php'); ?>

</footer>
<!-- Footer Section End -->

</body>

<script src="./public/site/js/searchAjax.js" type="text/javascript"></script>
<script src="./public/site/js/cartAjax.js" type="text/javascript"></script>
<script src="./public/site/js/validate.js" type="text/javascript"></script>
<script src="./public/site/js/countdown.js" type="text/javascript"></script>
<script src="./public/site/js/chatbot.js" type="text/javascript"></script>
<script src="./public/site/js/animations.js" type="text/javascript"></script>

<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active-slide", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active-slide";
        setTimeout(showSlides, 5000); // Change image every 5 seconds
    }
</script>


</html>