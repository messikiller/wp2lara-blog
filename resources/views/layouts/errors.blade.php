@if(! empty($errors))
<div class="container-fluid">
    @foreach($errors as $error)
        @if($error['code'] == 0)
        <div class="alert alert-success with-icon alert-dismissable">
            <i class="icon-ok-sign"></i>
            <div class="content">{{ $error['desc'] }}</div>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
        @elseif($error['code'] == 1)
        <div class="alert alert-info with-icon alert-dismissable">
            <i class="icon-info-sign"></i>
            <div class="content">{{ $error['desc'] }}</div>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
        @elseif($error['code'] == 2)
        <div class="alert alert-danger with-icon alert-dismissable">
            <i class="icon-remove-sign"></i>
            <div class="content">{{ $error['desc'] }}</div>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
        @elseif($error['code'] == 3)
        <div class="alert alert-warning with-icon alert-dismissable">
            <i class="icon-frawn"></i>
            <div class="content">{{ $error['desc'] }}</div>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
        @endif
    @endforeach
</div>
@endif
