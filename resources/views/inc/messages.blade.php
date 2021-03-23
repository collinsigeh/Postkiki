@if (null !== session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (null !== session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif