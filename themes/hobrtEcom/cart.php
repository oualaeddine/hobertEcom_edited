<?php include_once 'header.php'; ?>


    <!-- Main -->
    <div class="lx-main">
        <!-- Main Content -->
        <div class="lx-main-content">
            <form action="" method="post" id="sendcart">
                <div class="lx-g2">
                    <div class="lx-cart-products-list">
                        <?php if (count($info) > 0) { ?>
                            <table cellpadding="0" cellspacing="0">
                                <?php $tprice = 0;
                                $ship = 0;
                                foreach ($info as $cart) {
                                    $pr = floor($cart->price - ($cart->price * $cart->discount / 100));
                                    $tpr = isset($arr[$cart->id]['q']) ? $pr * $arr[$cart->id]['q'] : $pr; ?>
                                    <tr class="items">
                                        <td>
                                            <div class="lx-cart-products-list-img" data-id="93">
                                                <a href=""><img
                                                            src="<?php echo base_url("uploads") . "/" . add_thumb($cart->images, "_m"); ?>"/></a>
                                            </div>
                                            <h3>
                                                <a href="<?php echo base_url("home/show/$cart->id"); ?>"><?php echo $cart->title; ?></a>
                                            </h3>

                                            <a href="javascript:" data-id="<?php echo $cart->id; ?>"
                                               class="lx-delete-cookie">إزالة</a>
                                        </td>
                                        <td class="lx-desktop lx-price-total"><strong><?php echo $tpr; ?> دج</strong>
                                        </td>

                                        <?php $tprice = $tprice + $tpr + $ship = $ship + $cart->shipping; ?>

                                    </tr>
                                <?php } ?>
                            </table>
                            <p class="couponUse"></p>
                            <p class="lx-shipping-costs">مصاريف الشحن : <b  class="ship"><?php echo $ship; ?> د.ج </b></p>
                            <p class="lx-total-costs">المبلغ الواجب أداؤه : <b class="totalprice"><?php echo $tprice; ?>
                                    دج</b></p>


                            <input type="hidden" name="totalprice" id="value" value="<?= $tprice ?>"/>
                        <?php } else { ?>

                            <em>لا توجد اي سلعة في السلة الان</em>

                        <?php } ?>
                    </div>
                </div>
                <div class="lx-g2">
                    <div class="lx-cart-total">
                        <div class="lx-cart-info-address">
                            <h3>المرجو ملأ الاستمارة لإتمام الطلب</h3>
                            <label><span>الاسم واللقب :</span><input type="text" name="fullname"
                                                                     placeholder=""/></label>
                            <label><span>الهاتف:</span><input type="tel" name="phone" placeholder=""/></label>
                            <label><span>العنوان:</span><input type="text" name="address" placeholder=""/></label>
                            <label><span>الولاية:</span
                                >
                                
                                <div class="main">
                                    <input type="text" name="city" placeholder=""/>

                                    <div style="margin-top: 15px">
                                        <span>البلدية:</span
                                        >
                                        <input type="text" name="state" placeholder=""/>

                                        </select>
                                    </div>
                                </div>
                            </label>


                            <div class="lx-cart-next-step">
                                <a href="javascript:" style="width:100%;text-align: center;">تأكيد الطلب</a>
                            </div>
                            <div class="lx-clear-fix"></div>
                        </div>
                    </div>
                </div>
                <div class="lx-clear-fix"></div>
            </form>
        </div>
    </div>



<?php include_once 'footer.php'; ?>

