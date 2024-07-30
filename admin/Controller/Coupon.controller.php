<?php
ini_set('display_errors', '1');
include '../../Model/MCoupon.php';

$coupon = new MCoupon();

$allCoupons = $coupon->getAllCoupons();



