@extends('admin.layouts.app')
@section('title')
    @lang($title)
@endsection
@section('content')
    <div class="row mb-3">
        <div class="col-12 text-end">
            <a href="{{ route('hotels.create') }}" class="btn btn-sm btn-primary">
                Add New Hotel</a>
        </div>
    </div>



    <div class="row justify-content-center">
        <div class="col-12">


            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col d-flex justify-content-between">
                            <h4 class="card-title">{{ $title }}</h4>

                        </div><!--end col-->
                    </div> <!--end row-->
                </div><!--end card-header-->
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table  mb-0 table-centered datatable" id="hotelTable">
                            <thead class="table-light">
                                <tr>
                                    <th>Sr no</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table><!--end /table-->
                    </div>
                </div>


            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!--end col-->
    </div>


    <script>
        $(document).ready(function() {

            $('body').on('click', '.deleteHotelbtn', function() {
                var id = $(this).data('id');
                var url = '{{ route('hotels.destroy', ':id') }}'.replace(':id', id);
                //notiflix confirm
                Notiflix.Confirm.Show('Delete Location', 'Are you sure you want to delete this hotel?',
                    'Yes', 'No',
                    function() {
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(data) {
                                Notiflix.Notify.Success(data.message);
                                $('.datatable').DataTable().ajax.reload();
                            }
                        });
                    },
                    function() {
                        // No button callback
                    });
            });

            $('#hotelTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.hotels.ajax') }}",


                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'images',
                        name: 'image',
                        render: function(data) {

                            data = data[0].image_path
                            return '<img src="' + data +
                                '" class="img-fluid" style="max-width: 50px" />';
                        },
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'description',
                        name: 'description',
                        render: function(data) {
                            return data.length > 50 ? data.substr(0, 50) + '...' : data;
                        }
                    },
                    {
                        data: 'location.name',
                        name: 'location.name'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function(data) {
                            return data == 1 ? '<span class="badge bg-success">Active</span>' :
                                '<span class="badge bg-danger">Inactive</span>';
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                'language': {
                    'loadingRecords': '&nbsp;',
                    'processing': '<div class="spinner-border text-primary text-center" role="status"></div>'
                },
                'fnDrawCallback': function() {
                    $('.editlocationbtn').tooltip();

                },


            });

        });
    </script>
@endsection
