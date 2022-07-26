<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<style>
  	body{
  		background-color: #f9f9fd;
  		/*font-size: 21px;*/
  	}
  	.card{
  		background-color: #ffffff;
  	}
  	.heading{
  		background-color: #1bb57c;
  		color:white;
  		background-image: linear-gradient(#1cc98a, #2e9271);
  	}
  	.btn{
  		/*color: #1bb57c;*/
  		/*border: solid 1px; */
  		width: 45%;
  	}
  	label{
  		color: #8f9cb9;
  	}
  	.req_msg{
  		color: #8f9cb9;
  		margin-left: -377px;
  	}
  	.message{
  		height: 40px;
  		padding: 8px;
  	}
  	.success{
  		background-color: #d3f5e8;
  		color:#489490;
  	}
  	.failed{
  		color:black;
  		background-color: #ffb3b3;
  	}
  	.required{
  		color: red;
  	}
  	.error{
  		color: red;
  	}
  	th,td{
  		text-align: center;
  	}
  	.btn:hover {
  		box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
	}
	.alert.parsley {
        margin-top: 5px;
        margin-bottom: 0px;
        padding: 10px 15px 10px 15px;
    }
    .check .alert {
        margin-top: 20px;
    }
    .credit-card-box .panel-title {
        display: inline;
        font-weight: bold;
    }
    .credit-card-box .display-td {
        display: table-cell;
        vertical-align: middle;
        width: 100%;
    }
    .credit-card-box .display-tr {
        display: table-row;
    }
  </style>
</head>
<body>
<div id="app">
    <div class="main-wrapper">
    	<div class="main-content">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>