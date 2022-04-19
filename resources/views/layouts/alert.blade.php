@if($errors->any())
    @foreach($errors->all() as $error)
    <div class="col-12">
        <div id="alerttopright" class="alert-timeout alert alert alert-danger alert-dismissible fade show" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
            {{$error}}
        </div>
    </div>
    @endforeach
@endif

@if(session()->has('type'))
    <div class="col-12">
        <div id="alerttopright" class="alert-timeout alert alert alert-{{session()->get('type')}} alert-dismissible fade show" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
            {{session()->get('message')}} 
        </div>
    </div>
@endif