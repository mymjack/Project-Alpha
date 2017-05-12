<?php
	require ("utils.php");
	configSession();
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>服务条款 - Otto带物</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- 	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
	<link rel="stylesheet" href="../assets/css/styles.css" />

	<!-- Select2 datalist files -->
	<link href="../assets/select2/css/select2.css" rel="stylesheet" />
</head>
<body>

	<?php $title="服务条款"; $active="服务条款"; include("nav.php"); ?>

	<section class="wrapper container">
		<div class="terms_info">
		<br><h2>Terms and Conditions ("Terms")</h2>
		<h4>Last updated: May 12, 2017</h4>>

		<p>Please read these Terms and Conditions ("Terms", "Terms and Conditions") carefully before using the <a href="ot-to.co">http://ot-to.co</a> website (the "Service") operated by Otto Logistics ("us", "we", or "our").<br>
		Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.<br>
		By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service. This Terms & Conditions agreement is licensed by TermsFeed to Otto Logistics.<br>
		<br><h2>Accounts</h2>
		When you create an account with us, you must provide us information that is accurate, complete, and current at all times. Failure to do so constitutes a breach of the Terms, which may result in immediate termination of your account on our Service.<br>
		You are responsible for safeguarding the password that you use to access the Service and for any activities or actions under your password, whether your password is with our Service or a third-party service.<br>
		You agree not to disclose your password to any third party. You must notify us immediately upon becoming aware of any breach of security or unauthorized use of your account.<br>
		<br><h2>Fees</h2>
		Otto charges a fixed <b>$7.5/lb</b> international shipping fee. No other fees will be charged throughout the shipping process.<br>
		<br><h2>Links To Other Web Sites</h2>
		Our Service may contain links to third-party web sites or services that are not owned or controlled by Otto Logistics.<br>
		Otto Logistics has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that Otto Logistics shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.<br>
		We strongly advise you to read the terms and conditions and privacy policies of any third-party web sites or services that you visit.<br>
		<br><h2>Termination</h2>
		We may terminate or suspend access to our Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.<br>
		All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.<br>
		We may terminate or suspend your account immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.<br>
		Upon termination, your right to use the Service will immediately cease. If you wish to terminate your account, you may simply discontinue using the Service.<br>
		All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.<br>
		<br><h2>Governing Law</h2>
		These Terms shall be governed and construed in accordance with the laws of Ontario, Canada, without regard to its conflict of law provisions.<br>
		Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have between us regarding the Service.<br>
		<br><h2>Changes</h2>
		We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 30 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.<br>
		By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.<br>
		<br><h2>Contact Us</h2>
		If you have any questions about these Terms, please contact us <a href="mailto:contact@ot-to.co">contact@ot-to.co</a>.<br>
	</p>
	</div>
	</section>

	<?php include("footer.php"); ?>

	<!-- Scripts -->
	<!-- <script src="../assets/js/jquery.min.js"></script> -->
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="../assets/js/skel.min.js"></script>
	<script src="../assets/js/util.js"></script>
	<!-- 	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
	<script src="../assets/select2/js/select2.js"></script>
	<script src="../assets/js/scripts.js"></script>
	<!-- 	<script>
	    var j = jQuery.noConflict();
	    j( function() {
	        j( "#datepicker" ).datepicker({dateFormat: "yy-m-d"});
	    } );
	</script> -->

	<!-- jQuery File Upload Dependencies -->
	<script src="../assets/fileUploader/js/jquery.ui.widget.js"></script>
	<script src="../assets/fileUploader/js/jquery.iframe-transport.js"></script>
	<script src="../assets/fileUploader/js/jquery.fileupload.js"></script>
	<script src="../assets/fileUploader/js/script.js"></script>

	<script type="text/javascript">
		$("#add-item").click(function(){addItem()})
		$('#submit').click(function(){submitOrder()});
		$('#edit').click(function(){toggleOrder()});
		$('form, #items').each(function(){formDisplayAdjust($(this))});
	</script>


</body>
</html>