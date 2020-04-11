<div class="col-md-4">
    <div class="card">
        <div class="card-body">



            <form class="custom-validation" action="{{route('contacts.store')}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-sm-6">
                        <input
                                value="{{old('f_name')}}"
                                type="text" class="form-control" name="f_name" required
                                placeholder="{{__('front.First Name')}}"/>
                    </div>
                    <div class="form-group col-sm-6">
                        <input
                                value="{{old('l_name')}}"
                                type="text" class="form-control" name="l_name" required
                                placeholder="{{__('front.Last Name')}}"/>
                    </div>
                </div>

                    <div class="form-group ">
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone"
                                   required
                                   placeholder="{{__('front.phone')}}"
                                  value="{{old('phone')}}"
                            />
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


