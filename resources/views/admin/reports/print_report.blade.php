<html>
	<head>
		<title>Treatment Abroad || Report information</title>
		<style>
			.container {
				width:100%;
				margin:auto;
			}		 
			.table {
				width: 100%;
				margin-bottom: 20px;
			}	
			.table-striped tbody > tr:nth-child(odd) > td,
			.table-striped tbody > tr:nth-child(odd) > th {
				background-color: #f9f9f9;
			}		
			@media print{
			#print {
			display:none;
			}
			}
			#print {
				width: 90px;
				height: 30px;
				font-size: 18px;
				background: white;
				border-radius: 4px;
				margin-left:28px;
				cursor:hand;
			}
		</style>		
		<script>
			function printPage() {
				window.print();
			}
		</script>
	</head>
	<body>
		<div class = "container">
			<div id = "header"><br>
				<center><p style = "margin-left:30px; margin-top:5px; margin-bottom: 0px;font-size:14pt; font-style: italic; "><img src="{{ asset('frontend/images/logo2.png') }}" style="width :150px;" alt="" class="img-responsive"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></center>
				<center><p style = "margin-left:30px; margin-top:5px; margin-bottom: 0px;font-size:14pt; font-style: italic; ">Treatment Abroad &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></center>
                <center><p style = "margin-left:30px; margin-top:5px; margin-bottom: 0px;font-size:14pt; font-style: italic; ">Mangement System &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></center>
				<br><br>
			</div>
			<hr style="border: solid blue 1px">
			<hr style="border: solid blue 1px"><br/>
			<table border="1" class="table table-bordered">
				<tr align="center"><h3 colspan="12" style="font-size:20px;color:blue;text-align: center;" >Report Information</h3></tr>
				<tr>
					<th scope>Patient Name</th>
					<td>{{ $reports->users->name}}</td>
					<th scope>F Doctor</th>
					<td>{{ $reports->fdoctors->name }}</td><br>
				</tr>
				<tr>
					<th scope>N Doctor</th>
					<td>{{ $reports->ndoctors->name }}</td>
					<th>Details</th>
					<td>{{ $reports->details }}</td>
				</tr>
				<tr>
					<th>Strat Date</th>
					<td>{{ $reports->start_date }}</td>
					<th>End Date</th>
					<td>{{ $reports->end_date}}</td>
				</tr>
				<tr>
					<th>Added Date</th>
					<td>{{ $reports->created_at }}</td>
					
				</tr>
			</table><br/><br /><br />
			<hr style="border: solid blue 1px">
			<hr style="border: solid blue 1px"><br/>
			<!--<button type="submit" id="print" onclick="printPage()">Print</button>-->
	        <div align="right">
				<b style="color:blue;">Date Prepared:</b>
				<?php //include('currentdate.php');
				echo date("l,d-m-Y"); ?>
	        </div>
			<h2><span style="font-size: 15px" class="glyphicon glyphicon-user"></span></h2>
		</div>
	</body>
    <script> window.print(); </script>
</html>