Category = {{$category->name}}


<form action="/category/{{$category->slug}}" method="get">
	@if(!empty(Input::get('brands')) ? $qbrands = Input::get('brands') :  $qbrands = [])
	@endif
	@foreach($category->brands()->get() as $brand)
		<input type="checkbox" name="brands[]" value="{{$brand->id}}" {{in_array($brand->id, $qbrands) ? 'checked' : '' }} > {{$brand->name}} <br>
	@endforeach
	<button>ok</button>
</form>

<hr>
@foreach($products as $product)
	{{$product->title}} <br>
@endforeach


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
	/*var qs='';
	$('input').change(function(){
		$.each($('input'),function(i, input){
			qs+= $(input).val() + '|';
		});
		window.location = '/category/{{$category->slug}}/'+ qs;
	});*/

	$('input').change(function(){
		$('form').submit();
	});

</script>