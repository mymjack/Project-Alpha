<?php
	require ("utils.php");
	configSession();
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>隐私权政策 - Otto带物</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- 	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
	<link rel="stylesheet" href="../assets/css/styles.css" />
	<link rel="icon" type="image/x-icon" href="../../images/favicon-32x32.png" />

	<!-- Select2 datalist files -->
	<link href="../assets/select2/css/select2.css" rel="stylesheet" />
</head>
<body>

	<?php $title="隐私权政策"; $active="隐私权政策"; include("nav.php"); ?>

	<section class="wrapper container">
		<div class="privacy_info">
		<br><h2>Privacy Policy</h2>
		<h4>Last updated: May 12, 2017</h4>>
		<p>Otto Logistics ("us", "we", or "our") operates the <a href="http://ot-to.co">http://ot-to.co</a> website (the "Service").<br>
		This page informs you of our policies regarding the collection, use and disclosure of Personal Information when you use our Service.<br>
		We will not use or share your information with anyone except as described in this Privacy Policy. This Privacy Policy is licensed by TermsFeed Generator to Otto Logistics.<br>
		We use your Personal Information for providing and improving the Service. By using the Service, you agree to the collection and use of information in accordance with this policy. Unless otherwise defined in this Privacy Policy, terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, accessible at <a href="http://ot-to.co">http://ot-to.co</a><br>
		<br><h2>Information Collection And Use</h2>
		While using our Service, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you. Personally identifiable information may include, but is not limited to, your name, phone number, postal address ("Personal Information").
		<br><h2>Log Data</h2>
		We collect information that your browser sends whenever you visit our Service ("Log Data"). This Log Data may include information such as your computer's Internet Protocol ("IP") address, browser type, browser version, the pages of our Service that you visit, the time and date of your visit, the time spent on those pages and other statistics.<br>
		<br><h2>Cookies</h2>
		Cookies are files with small amount of data, which may include an anonymous unique identifier. Cookies are sent to your browser from a web site and stored on your computer's hard drive.<br>
		We use "cookies" to collect information. You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our Service.<br>
		<br><h2>Service Providers</h2>
		We may employ third party companies and individuals to facilitate our Service, to provide the Service on our behalf, to perform Service-related services or to assist us in analyzing how our Service is used.<br>
		These third parties have access to your Personal Information only to perform these tasks on our behalf and are obligated not to disclose or use it for any other purpose.<br>
		<br><h2>Security</h2>
		The security of your Personal Information is important to us, but remember that no method of transmission over the Internet, or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Information, we cannot guarantee its absolute security.<br>
		<br><h2>Links To Other Sites</h2>
		Our Service may contain links to other sites that are not operated by us. If you click on a third party link, you will be directed to that third party's site. We strongly advise you to review the Privacy Policy of every site you visit.<br>
		We have no control over, and assume no responsibility for the content, privacy policies or practices of any third party sites or services.<br>
		<br><h2>Children's Privacy</h2>
		Our Service does not address anyone under the age of 13 ("Children").
		We do not knowingly collect personally identifiable information from children under 13. If you are a parent or guardian and you are aware that your Children has provided us with Personal Information, please contact us. If we discover that a Children under 13 has provided us with Personal Information, we will delete such information from our servers immediately.<br>
		By using our website, you automatically claim and warrant that you are an adult who is at least 18 years of age.<br>
		<br><h2>Changes To This Privacy Policy</h2>
		We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.<br>
		You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.</p>
		<br><h2>Contact Us</h2>
		If you have any questions about this Privacy Policy, please contact us <a href="mailto:contact@ot-to.co">contact@ot-to.co</a>.<br>
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