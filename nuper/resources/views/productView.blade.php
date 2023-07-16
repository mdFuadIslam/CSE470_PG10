
<div id="project" class="project">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>View Item</h2>
            </div>
         </div>
      </div>
      <div class="row">
      <div class="product_main">
      @foreach ($product as $data)
            <div class="project_box ">
               <div class="dark_white_bg" ><ul><img  src="{{$data->imgUrl}}" alt="#" width='300' height='300'/></ul></div>
               <h3><ul>Name: {{$data->name}}</ul>
                <ul>Price: {{$data->price}}</ul>
                <ul>Description: {{$data->description}}</ul>
                <ul>Owner: {{$data->username}}</ul>
                <div class="dark_white_bg" ><ul><img  src="{{$data->imgUrl2}}" alt="#"/></ul></div>
                <div class="dark_white_bg" ><ul><img  src="{{$data->imgUrl3}}" alt="#"/></ul></div>
                <div class="dark_white_bg" ><ul><img  src="{{$data->imgUrl4}}" alt="#"/></ul></div>
                <div class="dark_white_bg" ><ul><img  src="{{$data->imgUrl5}}" alt="#"/></ul></div></h3>
                <form method="post" action="{{ url('/addToCart') }}">
                  @csrf
                  <input type="hidden" name="pId" id="pId" value="{{$data->saleId}}">
                  <input type="hidden" name="username" id="username" value="{{$data->username}}">
                  <input type="hidden" name="name" id="name" value="{{$data->name}}">
                  <input type="hidden" name="price" id="price" value="{{$data->price}}">
                  <input type="hidden" name="type" id="type" value="0">
                  <input type="hidden" name="duration" id="duration" value="00:00:00">
                  <input type="submit" name="add to cart" value="add to cart">
                </form>
            </div>
      @endforeach
      </div>
      </div>
   </div>
</div>

