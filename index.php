<?php require "inc/lock.php"; ?>
<?php require "inc/config.php"; ?>
<?php require "system/function.php"; ?>

<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8>
<meta http-equiv=X-UA-Compatible content="IE=edge">
<title>Dashboard - fast-ex.com</title>

<?php require "inc/boiler-head.php"; ?>
<?php require "inc/sweetalert.php"; ?>
<?php require "inc/google-fonts.php"; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style type="text/css">

/*loader*/
.loader{
	position: fixed;
	z-index: 99;
	top: 0;
	left: 110px;
	width: 100%;
	height: 100%;
    display: flex;
    background: #F1F2F3;
    justify-content: center;
    align-items: center;
}
.loader > img{
	width: 120px;
}

.loader.hidden{
	animation: fadeOut 1s;
	animation-fill-mode: forwards;
}

@keyframes fadeOut{
	100%{
		opacity: 0;
		visibility: hidden;

	}
}
/*loader*/

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

.printbtn {
    color: #fff;
    background-color: #28a745;
    padding: 8px 20px 8px 20px;
    border-radius: 5px;
}
.printbtn:hover {
    color: #fff;
}
.labelbtn {
	  color: #fff;
    background-color: orangered;
    padding: 8px 20px 8px 20px;
    border-radius: 5px;
}
.labelbtn:hover {
	color: #fff;
}
.receiptbtn {
    color: #fff;
    background-color: #28a745;
    padding: 8px 20px 8px 20px;
    border-radius: 5px;
}
.receiptbtn:hover {
    color: #fff;
}
.createanotherbtn {
    color: #fff;
    background-color: #3085d6;
    padding: 8px 20px 8px 20px;
    border-radius: 5px;
}
.createanotherbtn:hover {
    color: #fff;
}
</style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<?php require "public/assets/layouts/wrapper-head.php"; ?>
<?php require "public/assets/layouts/navbar.php"; ?>
<?php require "public/assets/layouts/sidebar.php"; ?>
<?php require "public/assets/layouts/content-wrapper-head.php"; ?>

<!-- loader -->
<div class="loader">
<img src="public/media/img/loader.gif">
</div>
<!-- ./loader -->

<!-- container-fluid -->
<div class="container-fluid pt-3">

<!-- alert -->
<?php
$session = $_SESSION['email']; 
$query = "SELECT * FROM administrators WHERE email_address = '$session'";
$execute = mysqli_query($conn, $query);
foreach ($execute as $row) {
?>
<div class="alert bg-white text-muted border alert-dismissible fade show" role="alert">Hello
<?php echo $row['username']; ?>! Download the documentation for the steps to handle the application in easy steps.
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<?php } ?>
<!-- ./alert -->

<!-- row -->
<div class="row">
	
<!-- col -->
<div class="col">
	
<!-- card -->
<div class="card bg-warning">
	
<!-- card-body -->
<div class="card-body text-center">
	
<h3>Booked</h3>
<h4><?php echo bookedShipments(); ?></h4>

</div>
<!-- ./card-body -->

<!-- card-footer -->
<div class="card-footer">
	<a href="shipments#booked" class="btn btn-default btn-block btn-sm">View</a>
</div>
<!-- ./card-footer -->

</div>
<!-- ./card -->

</div>
<!-- ./col -->

<!-- col -->
<div class="col">
	
<!-- card -->
<div class="card bg-primary">
	
<!-- card-body -->
<div class="card-body text-center">
	
<h3>Pakistan Post</h3>
<h4><?php echo shippingByPakistanPostShipments(); ?></h4>

</div>
<!-- ./card-body -->

<!-- card-footer -->
<div class="card-footer">
	<a href="shipments#booked" class="btn btn-default btn-block btn-sm">View</a>
</div>
<!-- ./card-footer -->

</div>
<!-- ./card -->

</div>
<!-- ./col -->

<!-- col -->
<div class="col">
	
<!-- card -->
<div class="card bg-success">
	
<!-- card-body -->
<div class="card-body text-center">
	
<h3>Delivered</h3>
<h4><?php echo deliveredShipments(); ?></h4>

</div>
<!-- ./card-body -->

<!-- card-footer -->
<div class="card-footer">
	<a href="shipments#booked" class="btn btn-default btn-block btn-sm">View</a>
</div>
<!-- ./card-footer -->

</div>
<!-- ./card -->

</div>
<!-- ./col -->

<!-- col -->
<div class="col">
	
<!-- card -->
<div class="card bg-danger">
	
<!-- card-body -->
<div class="card-body text-center">
	
<h3>Returned</h3>
<h4><?php echo returnedShipments(); ?></h4>

</div>
<!-- ./card-body -->

<!-- card-footer -->
<div class="card-footer">
	<a href="shipments#booked" class="btn btn-default btn-block btn-sm">View</a>
</div>
<!-- ./card-footer -->

</div>
<!-- ./card -->

</div>
<!-- ./col -->

</div>
<!-- ./row -->

<!-- row -->
<div class="row">
	
<!-- col -->
<div class="col">
	
<!-- card -->
<div class="card bg-success">
	
<!-- card-body -->
<div class="card-body text-center">
	
<h3>UMO Paid</h3>
<h4><?php echo paidUMO(); ?></h4>

</div>
<!-- ./card-body -->

</div>
<!-- ./card -->

</div>
<!-- ./col -->

<!-- col -->
<div class="col">
	
<!-- card -->
<div class="card bg-danger">
	
<!-- card-body -->
<div class="card-body text-center">
	
<h3>UMO Not Paid</h3>
<h4><?php echo notPaidUMO(); ?></h4>

</div>
<!-- ./card-body -->

</div>
<!-- ./card -->

</div>
<!-- ./col -->

<!-- col -->
<div class="col"></div>
<!-- ./col -->

<!-- col -->
<div class="col"></div>
<!-- ./col -->

</div>
<!-- ./row -->

</div>
<!-- ./container-fluid -->

<!-- add-shipment-modal -->
<div class="modal fade" id="add-shipment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLongTitle">Create shipment (COD)</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">

<!-- form -->
<form method="POST">

<!-- row -->
<div class="row">
	
<!-- col -->
<div class="col">
	
<!-- shipper -->
<div class="form-group">
<select name="shipper" id="shipper" class="js-example-basic-single" required="required" style="width: 100%;">
<option value="" selected="none" hidden="hidden">Choose shipper</option>

<?php 
$query = "SELECT * FROM shippers WHERE shipper_status = 'active'";
$execute = mysqli_query($conn, $query);
foreach ($execute as $row) {
?>
<option value="<?php echo $row['shipper_company_name']; ?>"><?php echo $row['shipper_company_name']; ?></option>
<?php } ?>
</select>
</div>
<!-- ./shipper -->

<!-- receiver-name -->
<div class="form-group">
	<input type="text" name="receiver-name" id="receiver-name" class="form-control" placeholder="Receiver name" required="required" autocomplete="off">
</div>
<!-- ./receiver-name -->

<!-- receiver-address -->
<div class="form-group">
	<textarea rows="3" name="receiver-address" id="receiver-address" class="form-control" placeholder="Receiver address" required="required"></textarea>
</div>
<!-- ./receiver-address -->

<!-- receiver-city -->
<div class="form-group">
<select name="receiver-city" id="receiver-city" class="js-example-basic-single" style="width: 100%;" required="required" onchange="showUser(this.value)">
	<option value="" selected="none" hidden="hidden">Choose city</option>
<?php 
$query = "SELECT * FROM destinations";
$execute = mysqli_query($conn, $query);
?>
<?php 
if (mysqli_num_rows($execute) > 0) {
while ($row = mysqli_fetch_array($execute)) {
?>
<option value="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
<?php }} ?>
</select>
</div>
<!-- ./receiver-city -->

<!-- receiver-zipcode (ajax file) -->
	<input type="hidden" name="receiver-zipcode" id="receiver-zipcode" >
	<p id="txtHint"></p>
<!-- ./receiver-zipcode -->

<!-- receiver-email -->
<div class="form-group">
	<input type="email" name="receiver-email" id="receiver-email" class="form-control" placeholder="Email address">
</div>
<!-- ./receiver-email -->

<!-- receiver-phone -->
<div class="form-group">
	<input type="text" name="receiver-phone" id="receiver-phone" class="form-control" placeholder="Phone number" required="required" onchange="phoneNumberLength()">
	<p id="phoneNumberLengthMessage"></p>
</div>
<!-- ./receiver-phone -->

<!-- service -->
<div class="form-group">
	<select name="service" id="service" class="js-example-basic-single" style="width: 100%" required="required">
		<option value="" selected="none" hidden="hidden">Choose service</option>
		<option value="cod">Cash on Delivery</option>
		<option value="standard">Standard</option>
		<option value="overnight">Overnight</option>
	</select>
</div>
<!-- ./service -->

<!-- pieces -->
<div class="form-group">
	<select name="pieces" id="pieces" required="required" class="js-example-basic-single" style="width: 100%">
	<option value="" selected="none" hidden="hidden">Choose pieces</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	</select>
</div>
<!-- ./pieces -->

</div>
<!-- ./col -->

<!-- col -->
<div class="col">

<!-- weight -->
<div class="form-group">
	<input type="number" name="weight" id="weight" class="form-control" placeholder="Weight (Grams)" required="required">
</div>
<!-- ./weight -->

<!-- amount -->
<div class="form-group">
	<input type="number" name="amount" id="amount" class="form-control" placeholder="COD amount (Rs)" required="required">
	<p class="text-sm text-muted">Please enter the amount</p>
</div>
<!-- ./amount -->

<!-- order-number -->
<div class="form-group">
	<input type="number" name="order-number" id="order-number" class="form-control" placeholder="Order number" required="required">
	<p class="text-sm text-muted">Please enter the order number</p>
</div>
<!-- ./order-number -->

<!-- remarks -->
<input type="hidden" name="remarks" value="Please deliver this as soon as possible, Thank you!">
<!-- ./remarks -->

<!-- box-contents -->
<div class="form-group">
	<textarea rows="6" name="box-contents" id="box-contents" class="form-control" required="required" placeholder="Box contents"></textarea>
</div>
<!-- ./box-contents -->

<!-- delivery-day -->
<div class="form-group">
	<input type="date" name="delivery-day" id="delivery-day" class="form-control" required="required" value="<?php echo date("Y-m-d", strtotime("+4 days")); ?>">
	<p class="text-sm text-muted">Please choose delivery day</p>
</div>
<!-- ./delivery-day -->

</div>
<!-- ./col -->

</div>
<!-- ./row -->

</div>
<!-- ./modal-body -->

<div class="modal-footer">
<!-- button -->
<div class="form-group">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<input type="submit" name="insert-shipment" id="insert-shipment" class="btn btn-warning" value="Create shipment">
</div>
<!-- ./button -->

<?php 
if(isset($_POST['insert-shipment'])){
$fastEXTracking = fastEXTrackingNumber();
$pakistanPostTracking = "";
$shipperCompany = trim($_POST['shipper']);
$shipperAddress = getShipperAddress($shipperCompany);
$shipperCity = getShipperCity($shipperCompany);
$shipperZipcode = getShipperZipcode($shipperCompany);
$shipperWebsite = getShipperWebsite($shipperCompany);
$shipperPhoneNumber = getShipperPhoneNumber($shipperCompany);
$shipperEmail = getShipperEmail($shipperCompany);
// customer
$receiverName = trim($_POST['receiver-name']);
$receiverAddress = trim($_POST['receiver-address']);
$receiverCity = trim($_POST['receiver-city']);
$receiverZipcode = trim($_POST['receiver-zipcode']);
$receiverEmail = trim($_POST['receiver-email']);
$receiverPhone = trim($_POST['receiver-phone']);
// parcel
$service = trim($_POST['service']);
$pieces = trim($_POST['pieces']);
$weight = trim($_POST['weight']);
$amount = trim($_POST['amount']);
$orderNumber = trim($_POST['order-number']);
$remarks = trim($_POST['remarks']);
$boxContents = trim($_POST['box-contents']);
$valueOfGoods = trim($_POST['amount']);

// 
$status = "booked";
$umoStatus = "";
$deliveryDay = trim($_POST['delivery-day']);
// format for sms
$formatDeliveryDay = dateFormat($_POST['delivery-day']);

// dates
$CreatedCDate = CreatedCDate();
$CreatedDate = CreatedDate();
$CreatedTime = CreatedTime();
$CreatedDay = CreatedDay();
$CreatedBy = CreatedBy();

$franchise = "";
$shipperCompany = trim($_POST['shipper']);

$query = "INSERT INTO shipments (fast_ex_tracking_number, pp_tracking_number, sender_name, sender_address, sender_zipcode, sender_city, sender_website, sender_email_address, sender_phone_number, receiver_name, receiver_address, receiver_city, receiver_zipcode, receiver_email_address, receiver_phone_number, service, pieces, weight, amount, order_number, remarks, box_contents, value_of_goods, status, umo_status, delivery_day, created_c_date, created_date, created_time, created_day, created_by, franchise, shipper_company_name) VALUES ('$fastEXTracking', '$pakistanPostTracking', '$shipperCompany', '$shipperAddress', '$shipperZipcode', '$shipperCity', '$shipperWebsite', '$shipperEmail', '$shipperPhoneNumber', '$receiverName', '$receiverAddress', '$receiverCity', '$receiverZipcode', '$receiverEmail', '$receiverPhone', '$service', '$pieces', '$weight', '$amount', '$orderNumber', '$remarks', '$boxContents', '$valueOfGoods', '$status', '$umoStatus', '$deliveryDay', '$CreatedCDate', '$CreatedDate', '$CreatedTime', '$CreatedDay', '$CreatedBy', '$franchise', '$shipperCompany')";
$execute = mysqli_query($conn, $query);
if($execute){

// sender
$fetchSender = "SELECT * FROM customers WHERE phone_number = '$shipperPhoneNumber'";
$execute = mysqli_query($conn, $fetchSender);
foreach ($execute as $value) {
$senderPhoneNumber = $value['phone_number'];
}
if($senderPhoneNumber == $shipperPhoneNumber){
// nothing
} else {
$query2 = "INSERT INTO customers (full_name, address, city, zipcode, phone_number, email_address, created_c_date, created_date, created_time, created_day, created_by) VALUES ('$shipperCompany', '$shipperAddress', '$shipperCity', '$shipperZipcode', '$shipperPhoneNumber', '$shipperEmail', '$CreatedCDate', '$CreatedDate', '$CreatedTime', '$CreatedDay', '$CreatedBy')";
$execute = mysqli_query($conn, $query2);
}
// sender

// receiver
$fetchReceiver = "SELECT * FROM customers WHERE phone_number = '$receiverPhone'";
$execute = mysqli_query($conn, $fetchReceiver);
foreach ($execute as $value) {
$receiverPhoneNumber = $value['phone_number'];
}
if($receiverPhoneNumber == $receiverPhone){
// nothing
} else {
$query3 = "INSERT INTO customers (full_name, address, city, zipcode, phone_number, email_address, created_c_date, created_date, created_time, created_day, created_by) VALUES ('$receiverName', '$receiverAddress', '$receiverCity', '$receiverZipcode', '$receiverPhone', '$receiverEmail', '$CreatedCDate', '$CreatedDate', '$CreatedTime', '$CreatedDay', '$CreatedBy')";
$execute = mysqli_query($conn, $query3);
}
// receiver

require "system/emails/create-shipment-email-to-customer.php";

$smsNotifications = smsNotifications();
if ($smsNotifications == "enable") {
	sendSMS("Dear $receiverName, Your Order: $orderNumber of amount Rs. $amount has been booked via Pakistan Post. You will get tracking details shortly.
What in a box?
$boxContents
Expected delivery date: $formatDeliveryDay", $receiverPhone);
} else if ($smsNotifications == "disable"){
	// nothing 
} else {
	// nothing
}

// shipment_status_histories
$query = "INSERT INTO shipment_status_histories (fast_ex_tracking_number, history_message, created_c_date, created_date, created_time, created_day, created_by) VALUES ('$fastEXTracking', 'Booked at <b>".$shipperCity."</b>.', '$CreatedCDate', '$CreatedDate', '$CreatedTime', '$CreatedDay', '$CreatedBy')";
	$execute = mysqli_query($conn, $query);
// shipment_status_histories

echo "<script>
Swal.fire({
icon: 'success',
title: 'Shipment #$fastEXTracking has been booked successfully!',
showConfirmButton: false,
allowOutsideClick: false,
showLoaderOnConfirm: true,
footer: '<a class=labelbtn href=public/views/label?tracking-number=$fastEXTracking target=_blank> Shipping label</a>&nbsp;&nbsp; <a class=receiptbtn href=public/views/receipt?tracking-number=$fastEXTracking target=_blank> Receipt</a>&nbsp;&nbsp;  <a class=createanotherbtn href=index> Create new </a>'
})
</script>";

} else {
echo mysqli_error($conn);

}
}
?>

</form>
<!-- ./form -->

</div>
</div>
</div>
</div>
<!-- ./add-shipper-modal -->

<?php require "public/assets/layouts/content-wrapper-foot.php"; ?>
<?php require "public/assets/layouts/footer.php"; ?>
<?php require "public/assets/layouts/control-sidebar.php"; ?>
<?php require "public/assets/layouts/wrapper-foot.php"; ?>
<?php require "inc/boiler-foot.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('.js-example-basic-single').select2({
  theme: "classic"
});
});
</script>

<script type="text/javascript">
	function phoneNumberLength(){
		var phone = document.getElementById('receiver-phone').value;
        if (phone.length < 11) {
        	document.getElementById('phoneNumberLengthMessage').innerHTML = "<span class='text-danger'>Invalid phone number ("+phone.length+") digits</span>";
        } else if (phone.length > 11) {
        	document.getElementById('phoneNumberLengthMessage').innerHTML = "<span class='text-danger'>Invalid phone number ("+phone.length+") digits</span>";
        } else if (phone.length == 11) {
        	document.getElementById('phoneNumberLengthMessage').innerHTML = "<span class='text-success'>This is valid phone number</span>";
        }
	}
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('.js-example-basic-single').select2({
  theme: "classic"
});
});
</script>

<script>
function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","system/ajax/destinations-zipcode.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>

<!-- loader -->
<script type="text/javascript">
	window.addEventListener("load", function () {
    const loader = document.querySelector(".loader");
    loader.className += " hidden"; // class "loader hidden"
});
</script>
<!-- ./loader -->

<script>
if ( window.history.replaceState ) {
window.history.replaceState( null, null, window.location.href );
}
</script>

</body>
</html>