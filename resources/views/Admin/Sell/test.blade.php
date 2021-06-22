<div class="container">
<div class="content-wrapper">
    <form action="" method="post">
    	{{ csrf_field()}}
    	<div class="form-control">
    		<label for="name">Name:</label>
    		<input type="text" class="form-control" name="">
    	</div>
    	<div class="form-control">
    		<label for="name">Name:</label>
    		<input type="text" class="form-control" name="">
    	</div>


    	<button type="submit" class="btn btn-success" value="submit">Submit</button>
    </form>
  </div>
  </div>

  @if($sell->mohajon_id > 1){{$sell->mohajon->mohajon_name}} @else {{"no mohajon"}} @endif