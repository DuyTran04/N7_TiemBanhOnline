<?php view('shared.admin.header', [
    'title' => 'Order Details'
]); ?>
<section class="checkout p-50">
    <div class="container">
        <div class="row">

            <div class="col-md-7">

                <div class="bill-form-block">
                    <h2>
                        Order details
                    </h2>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="fname">Tên</label>
                            <input value="<?= $order['fname'] ?>" type="text" name="fname" id="fname" class="form-control" aria-describedby="helpId" disabled>

                        </div>

                        <div class="col-md-6">
                            <label for="lname">Họ</label>
                            <input value="<?= $order['lname'] ?>" type="text" name="lname" id="lname" class="form-control" aria-describedby="helpId" disabled>



                        </div>


                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="email">Địa chỉ Email</label>
                            <input value="<?= $order['email'] ?>" type="text" name="email" id="email" class="form-control" aria-describedby="helpId" disabled>

                        </div>

                        <div class="col-md-6">
                            <label for="phone">Số điện thoại</label>
                            <input value="<?= $order['phone'] ?>" type="text" name="phone" id="phone" class="form-control" aria-describedby="helpId" disabled>
                        </div>

                    </div>




                    <div class="form-group">
                        <label for="province">Tỉnh/Thành phố</label>
                        <select class="form-control" id="province" name="province" disabled>

                            <option value="<?= $order['province'] ?>"><?= $order['province'] ?></option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="address">Địa chỉ</label>

                        <input value="<?= $order['address'] ?>" type="text" name="address" id="address" class="form-control" aria-describedby="helpId" disabled>

                    </div>

                    <div class="form-group">
                        <label for="note">Lưu ý</label>

                        <textarea class="form-control" name="note" rows="5" placeholder="Notes on your order" disabled><?= $order['note'] ?></textarea>

                    </div>



                    <h2 style="margin-top: 2.5rem;">Phương thức vận chuyển</h2>
                    <div class="form-group">


                        <select class="form-control" id="delivery" name="delivery" disabled>
                            <option value="<?= $order['delivery'] ?>"><?= $order['delivery'] ?></option>
                        </select>
                    </div>

                    <h2 style="margin-top: 2.5rem;">Phương thức thanh toán</h2>
                    <div class="form-group" style="margin-bottom: 1.5rem;">


                        <select class="form-control" id="payment" name="payment" disabled>
                            <option value="<?= $order['payment'] ?>"><?= $order['payment'] ?> </option>
                        </select>
                    </div>



                </div>

            </div>


            <div class="col-md-5">
                <h2>Đơn hàng</h2>
                <table class="table checkout-table">

                    <tbody>
                        <?php foreach ($products_in_order as $item) : ?>
                            <tr class="checkout-pro">
                                <td class="checkout-pro-title">
                                    <img src="./public/uploads/<?= $item['image'] ?>" width="100">
                                    <div class="checkout-pro-info">

                                        <h6><?= $item['name'] ?></h6>

                                        <p>$<?= number_format($item['price_sum'], 2, '.', '') ?></p>
                                    </div>

                                </td>

                                <td class="checkout-pro-quantity text-right">
                                    X<?= $item['quantity'] ?>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                        <tr class="order-subtotal">

                            <td>
                                <div class="checkout-pro-info p-0">
                                    <p>Số lượng (<?= $order['quantity'] ?> items):</p>
                                    <?php if ($order['coupon'] != 0) : ?>
                                        <p>Giảm giá: </p>
                                    <?php endif; ?>
                                    <p>Phí giao hàng:</p>
                                </div>

                            </td>
                            <td>
                                <div class="checkout-fee text-right">
                                    <p>
                                        $<?= number_format($order['total'], 2, '.', '') ?>
                                    </p>
                                    <?php if ($order['coupon'] != 0) : ?>
                                        <p>
                                            - $<?= number_format($order['total'] * ($order['coupon']), 2, '.', '') ?>
                                        </p>
                                    <?php endif; ?>
                                    <p>
                                        $2.00
                                    </p>
                                </div>
                            </td>

                        </tr>
                    </tbody>

                    <tr class="order-total">
                        <td>
                            <h2>Thành tiền</h2>
                        </td>

                        <td>
                            <h2 class="price" style="text-align: right">$<?= number_format($order['total'] * (1 - $order['coupon']) + 2, 2, '.', '') ?></h2>
                        </td>
                    </tr>
                    <form action="./?module=admin&controller=order&action=update&id=<?= $_GET['id'] ?>" method="POST" role="form">

                        <tfoot>

                            <tr>
                                <td colspan="2" style="padding-top: 7px">

                                    <div class="form-group">
                                        <label for="status">Trạng thái</label>

                                        <select name="status" id="" class="form-control">

                                            <?php for ($i = 0; $i < 4; $i++) : ?>
                                                <!-- 1 pending, 0 Delivered, 2 Cancelled -->
                                                <option value="<?= $i ?>" <?= ($order['status'] == $i) ? "selected" : ""  ?>>
                                                    <?php if ($i == 1) {
                                                        echo 'Đang chờ';
                                                    } else if ($i == 0) {
                                                        echo 'Đã vận chuyển';
                                                    } else if ($i == 2) {
                                                        echo 'Đang vận chuyển';
                                                    } else {
                                                        echo 'Đã hủy';
                                                    }
                                                    ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>

                                </td>
                            </tr>

                            <tr>

                                <td colspan="2" style="border: none; padding-top: 20px">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary form-control" value="Lưu">
                                    </div>
                                </td>
                            </tr>

                        </tfoot>
                    </form>

                </table>

            </div>


        </div>
    </div>
</section>

<?php view('shared.admin.footer'); ?>