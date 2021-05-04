<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>User Registration</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/font-awesome/4.2.0/css/font-awesome.min.css') }}" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="{{ asset('assets/fonts/fonts.googleapis.com.css') }}" />

		<!-- ace styles -->
		<link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}" class="ace-main-stylesheet" id="main-ace-style" />

		<!-- <link rel="stylesheet" href="{{ asset('assets/css/datepicker.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-timepicker.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
                <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/fullcalendar.min.css') }}" /> -->

		
		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
                
        <script src="{{ asset('assets/js/jquery.2.1.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/moment.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <!-- <script src="{{ asset('assets/js/jquery-ui.custom.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.ui.touch-punch.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.easypiechart.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.sparkline.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.flot.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.flot.pie.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.flot.resize.min.js') }}"></script> -->

		<!-- ace scripts -->
		<script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
		<script src="{{ asset('assets/js/ace.min.js') }}"></script>
        <!-- <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script> 
		<script src="{{ asset('assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/js/dataTables.tableTools.min.js') }}"></script>
		<script src="{{ asset('assets/js/dataTables.colVis.min.js') }}"></script>
                
		<script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
                <script src="{{ asset('assets/js/fuelux.spinner.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap-timepicker.min.js') }}"></script>
		<script src="{{ asset('assets/js/markdown.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap-markdown.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.hotkeys.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap-wysiwyg.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootbox.min.js') }}"></script>
        <script src="{{ asset('assets/js/ace-extra.min.js') }}"></script>
        <script src="{{ asset('assets/js/select2.min.js') }}"></script>
		<script src="{{ asset('assets/js/fullcalendar.min.js') }}"></script>  -->
	</head>