
	<!-- Favicon -->
	<link rel="shortcut icon" href="/images/icon/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/images/icon/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/images/icon/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/images/icon/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/images/icon/apple-touch-icon-57-precomposed.png">
    
    <!-- CSS -->
    <link href="/includes/css/bootstrap.min.css" rel="stylesheet">
    <link href="/includes/css/datepicker3.css" rel="stylesheet">
    <link href="/includes/css/styles-login.css" rel="stylesheet">
    
    <!-- Javascript -->
    <script src="/includes/js/jquery-1.11.1.min.js"></script>
	<script src="/includes/js/bootstrap.min.js"></script>
	<script src="/includes/js/chart.min.js"></script>
	<script src="/includes/js/chart-data.js"></script>
	<script src="/includes/js/easypiechart.js"></script>
	<script src="/includes/js/easypiechart-data.js"></script>
	<script src="/includes/js/bootstrap-datepicker.js"></script>
    <script src="/includes/js/validacoes.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	