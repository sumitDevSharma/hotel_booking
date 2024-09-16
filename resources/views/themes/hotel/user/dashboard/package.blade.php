<div class="package-table more-space">
    <div class="package-detail deposit-history dash-card">
        <div class="d-flex align-items-center justify-space-between mb-3 px-2">
            <h4>Top UP</h4>
            @if($availableSlot > 0)
            <a href="javascript:void(0)" class="btn btn-primary buyPackageBtn">Buy
            Top Up</a>
            
            @endif
           

        </div>
        <div class="row">
            @if(!empty($packages))
            @foreach($packages as $package)
            <div class="col-md-2 col-sm-4 col-6 more-space"  data-bs-toggle="popover" title="{{$package->name}} Conditions" data-bs-content="{{$package->note}}">
                    <div class="balance-outer slot-outer dash-card d-flex flex-wrap align-items-center justify-content-center p-4 {{$package->bought == 1 ?'active' :'inactive' }}">
                        <div class="content-outer w-100 text-center">
                            <h5><span class="d-block" >{{$package->name}}</span></h5>
                            
                        </div>
                    </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>

@push('loadModal')

<div class="modal fade" id="packageModal" tabindex="-1" aria-labelledby="packageModalLable" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-center" id="packageModalLable">Buy Top UP </h1>
                <button type="button" class="btn-close withClose" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body form-content">

            </div>
        </div>
    </div>
</div>

@endpush

@push('script')
<script>
    $('body').on('click', '.buyPackageBtn', function () {
        $.ajax({
            url: "{{route('user.buy-package-modal')}}",
            type: "GET",
            success: function (response) {
                if (response.status == 200) {
                    $('#packageModalLable').html(response.title);
                    $('.form-content').html(response.html);
                    $('#packageModal').modal('show');
                }
                else {
                    Notiflix.Notify.Failure(response.error)
                }
            }
        });
    });
</script>
@endpush