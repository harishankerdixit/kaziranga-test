<div class="row">
    <div class="col-sm-12">
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> {{ $message }}</h4>
            </div>
        @endif
        @if ($message = Session::get('info'))
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> {{ $message }}</h4>
            </div>
        @endif
        @if ($message = Session::get('warning'))
            <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> {{ $message }}</h4>
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4> <i class="icon fa fa-check"></i> {{ $message }}</h4>
            </div>
        @endif
        @if ($message = Session::get('status'))
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4> <i class="icon fa fa-check"></i> {{ $message }}</h4>
            </div>
        @endif
    </div>
</div>
