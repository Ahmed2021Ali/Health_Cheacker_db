<div class="col-12">
    @if(session()->has('success'))
    <div class="alert alert-success text-center">{{ session()->get('success') }}</div>
    @elseif(session()->has('erorr'))
    <div class="alert alert-success text-center">{{ session()->get('erorr') }}</div>
    @endif
</div>
