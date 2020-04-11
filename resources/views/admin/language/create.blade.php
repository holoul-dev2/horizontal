<div class="col-md-4">
    <div class="card">
        <div class="card-body">



            <form class="custom-validation" action="{{route('language.store')}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-sm-6">
                        <input
                                value="{{old('name')}}"
                                type="text" class="form-control" name="name" required
                                placeholder="{{__('front.Name')}}"/>
                    </div>
                    <div class="form-group col-sm-6">
                        <input
                                value="{{old('code')}}"
                                type="text" class="form-control" name="code" required
                                placeholder="{{__('front.Code')}}"/>
                    </div>
                </div>

                <div class="form-group mb-0">
                    <div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                             {{__('front.Submit')}}
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div> <!-- end col -->


