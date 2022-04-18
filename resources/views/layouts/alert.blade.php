@if($errors->any())
    @foreach($errors->all() as $error)
    <div class="col-12 mb-2">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{$error}}!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="ti ti-close"></i>
            </button>
        </div>
    </div>
    @endforeach
@endif

@if(session()->has('type'))
<div class="col-12 mb-2">
    <div class="alert alert-{{session()->get('type')}} alert-dismissible fade show" role="alert">
        {{session()->get('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="ti ti-close"></i>
        </button>
    </div>
</div>
@endif