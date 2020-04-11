<div class="col-sm-6 col-md-3 mt-4">


    <!-- sample modal content -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">{{__('front.Update Lang')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form id="update_form" class="custom-validation" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>{{__('front.Name')}}</label>
                                <input type="text" id="name" class="form-control" name="name" required value=""
                                       placeholder="{{__('front.Name')}}"/>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>{{__('front.Code')}}</label>
                                <input type="text" id="code" class="form-control" name="code" required value=""
                                       placeholder="{{__('front.Code')}}"/>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close
                            </button>
                            <button type="submit" id="submit" class="btn btn-primary waves-effect waves-light">Save
                                changes
                            </button>
                        </div>

                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>

@section('script')

    <script src="{{ URL::asset('assets/js/pages/sweet-alerts.init.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{ URL::asset('assets/libs/datatables/datatables.min.js')}}"></script>

    <script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>

    <script src="{{ URL::asset('assets/js/pages/form-validation.init.js')}}"></script>

    {{--    ajax to git category by id--}}
    <script>

        $('.update').click(function () {

            var id = $(this).data('slug');//this is data slug for update
            console.log(id);

            //for loop all categories
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "languages/show" + '/' + id,
                type: "GET",
                dataType: 'json',
                success: function (data) {
                    console.log(data)
                    //put the values in the inputs that i git from the request show category
                    $('.modal-body input[name="name"]').val(data.name);

                    $('.modal-body input[name="code"]').val(data.code);


                }
            });
            //put the form acction
            $("#update_form").attr("action", "/languages/update/" + id);
        });


    </script>


    {{--ajax update request--}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#submit").click(function () {
            var name = $('#name').vale();
            var code = $('#code').vale();
            var token = $('meta[name="csrf-token"]').attr('content')

            $.ajax(
                {
                    url: "/languages/update" + id,
                    type: 'post',
                    data: {
                        'id': id,
                        "name": f_name,
                        'code': l_name,
                        'phone': phone,
                        "_token": token,
                    },
                    success: function () {
                    }
                });
            Swal.fire({
                title: '{{__('language')}}!',
                text: '{{__('language')}}.',
                type: 'success'
            });

        });
    </script>
    {{--    end ajax update request--}}


    {{--delete function--}}
    <script>
        //delete function
        $('.delete').click(function () {
            var id = $(this).data('slug');
            var btn = this;
            var token = $("meta[name='csrf-token']").attr('content');
            Swal.fire({
                title: '{{__('front.Are you sure')}}?',
                text: "{{__('front.You will not be able to revert this')}}!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{{__('front.Yes, delete it!')}}',
                cancelButtonText: '{{__('front.No, cancel')}}!',
                confirmButtonClass: 'btn btn-success mt-2',
                cancelButtonClass: 'btn btn-danger ml-2 mt-2',
                buttonsStyling: false
            }).then(function (result) {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax(
                        {
                            url: "/languages/delete/" + id,
                            type: 'post',
                            data: {
                                "id": id,
                                "_token": token,
                            },
                            success: function () {
                                $(btn).closest('tr').fadeOut("fast");
                            }
                        });
                    Swal.fire({
                        title: '{{__('front.Deleted')}}!',
                        text: '{{__('front.Your file has been deleted')}}.',
                        type: 'success'
                    });
                } else if ( // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: '{{__('front.Cancelled')}}',
                        text: '{{__('front.Your imaginary file is safe')}} ',
                        type: 'error'
                    });
                }
            });
        });
    </script>

    {{--end delete function--}}



@endsection

