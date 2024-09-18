@extends('admin.layouts.app')
@section('title')
@lang($title)
@endsection
@section('content')


<div class="row mb-3">
    <div class="col-12 text-end">
        <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            Add New Location</a>
    </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admin.locations.store')}}" method="POST" id="form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add New Location</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>

            </form>
        </div>
    </div>
</div>


<div class="row justify-content-center">
    <div class="col-12">


        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col d-flex justify-content-between">
                        <h4 class="card-title">{{$title}}</h4>

                    </div><!--end col-->
                </div> <!--end row-->
            </div><!--end card-header-->
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table  mb-0 table-centered datatable" id="locationTable">
                        <thead class="table-light">
                            <tr>
                                <th>Sr no</th>
                                <th>Name</th>
                                <th>Description</th>
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
    $(document).ready(function () {
        $('#addModal').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
            $(this).find('form').attr('action', '{{route("admin.locations.store")}}');
            $(this).find('form').find('input[name="_method"]').remove();
        });

        $('body').on('click', '.deletelocationbtn', function () {
            var id = $(this).data('id');
            var url = '{{route("admin.locations.destroy",":id")}}'.replace(':id', id);
            //notiflix confirm
            Notiflix.Confirm.Show('Delete Location', 'Are you sure you want to delete this location?', 'Yes', 'No', function () {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (data) {
                        Notiflix.Notify.Success(data.message);
                        $('#locationTable').DataTable().ajax.reload();
                    }
                });
            }, function () {
                // No button callback
            });
        });


        $('body').on('click', '.editlocationbtn', function () {
            var data = $(this).data('data');
            $('#addModal').find('form').attr('action', '{{route("admin.locations.update",":id")}}'.replace(':id', data.id));
            // add put method in form
            $('#addModal').find('form').append('<input type="hidden" name="_method" value="PUT">');
            $('#addModal').find('#description').val(data.description);
            $('#addModal').find('#name').val(data.name);
            $('#addModal').find('#status').val(data.status);
            $('#addModal').modal('show');
        });




        $('#locationTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.locations.ajax') }}",


            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false, searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function (data) {
                        return data == 1 ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
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
            'fnDrawCallback': function () {
                $('.editlocationbtn').tooltip();

            },


        });

    });
</script>

@endsection