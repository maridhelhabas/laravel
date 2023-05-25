<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        *{
            font-family: arial;
        }
    </style>
	
</head>
<body>
	<div class="container mt-4">
		<div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="text-center">
					<h2><b>Add Debtor Page</b></h2>
				</div>
				<div class="text-right">
					<a class="btn btn-info" href="{{route('debtors.index') }}"> <i class="fa-solid fa-arrow-left fa-beat" style="color: #ffffff;"></i></a>
				</div>
			</div>
		</div>
		@if(session('status'))
		<div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
		@endif

		<form action="{{route('debtors.store')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="col-xs-12 col-sm-12 col-md-4 mx-auto">
			<div class="row mt-2">
				<div class="col-xs-12 col-sm-12 col-md-12 mx-auto">
                	<div class="form-group">
                    	<strong>Borrower's Name</strong>
                    	<input type="text" name="name" class="form-control" >
                    	@error('name')
                    	<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    	@enderror
                	</div>
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-15">
            		<div class="form-group">
                    	<strong>Borrower's Date of Transaction</strong>
                    	<input type="date" name="date" class="form-control" >
                    	@error('date')
                    	<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    	@enderror
                	</div>
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-15">
            		<div class="form-group">
                    	<strong>Borrower's Amount of Money Borrowed</strong>
                    	<input type="int" name="amount" class="form-control" >
                    	@error('amount')
                    	<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    	@enderror
                	</div>
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-12">
            		<div class="form-group">
                    	<strong>Remarks</strong>
                    	<input type="text" name="remarks" class="form-control" >
                    	@error('remarks')
                    	<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    	@enderror
                	</div>
            	</div>
				<button type="submit" class="btn mx-auto btn-primary">Submit</button>
			</div>
		</form>
	</div>
</body>
</html>