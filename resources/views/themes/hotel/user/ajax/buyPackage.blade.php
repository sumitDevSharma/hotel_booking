<form action="{{route('user.buy-package-submit')}}" method="POST" id="userBuySolt">
@csrf
<div class="form-group mb-3">
    <p class="buy-note text-center">Are u Sure to Pay for this Top Up?</p>
    <input type="hidden" name="package_id" value="{{$package->id}}">
    <input type="hidden" name="package_amount" value="{{$package->amount}}">
</div>
<div class="form-group d-flex justify-content-center gap-3 buy-slot-price">
    <p>Price : </p>
    <p class="text-success">{{$package->name}}</p>
</div>
<div class="form-group justify-content-center d-flex gap-2 ">
    <button type="submit" class="btn btn-primary buyBtn text-center mr-2">Purchase Top Up ({{$package->name}})</button>
    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
</div>
</form>
<script>
    var userBuySolt = document.getElementById('userBuySolt');
    if(userBuySolt){
        userBuySolt.addEventListener('submit', function(e){
            e.preventDefault();
            
            var formData = new FormData(this);
            packAmount = formData.get('package_amount');
            packId = formData.get('package_id');
            arroveToken(packId, packAmount);
        });
    }
</script>