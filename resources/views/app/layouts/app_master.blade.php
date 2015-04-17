<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$tenant->title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="{{ $configTenant['references']['appDescription'] }}">
    <meta name="author" content="Dallas Matthews Ltd">

    <!-- Styles -->
    @include(getViewPath('partials.common.default._styles', $currentTenant->tenant_id))
    <!-- /Styles -->

</head>
<body>

@yield('postcodeAnywhere', '<!-- Postcode anywhere not set up for this user -->')

<!-- Navigation -->
@include(getViewPath('partials.common._nav.default._mainNav', $currentTenant->tenant_id))
<!-- /Navigation -->

<!-- Container -->
<div class="container">

    <!-- Main Row -->
    <div class="row">
        <!-- Top Row -->
        <div class="row">
            @section('topLine')
                @include(getViewPath('partials.common.default._topLine', $currentTenant->tenant_id))
            @show
        </div>
        <!-- /Top Row -->

        <!-- Ajax errors & messages -->
        <div class="row messages">
            <div class="col-lg-12">
                @include(getViewPath('partials.common.default._flashMessages', $currentTenant->tenant_id))
                @include(getViewPath('partials.common.default._errors', $currentTenant->tenant_id))
            </div>
        </div>
        <!-- /Errors & Messages-->
        @if (Session::has('flash_notification.message'))
            <div class="alert alert-{{ Session::get('flash_notification.level') }}">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::pull('flash_notification.message') }}
            </div>
            @endif


                    <!-- Maincontent -->
            @yield('mainContent')
            <!-- /Maincontent -->

    </div>
    <!-- /Main Row -->

</div>
<!-- /Container -->

<!-- Modal -->
@section('modal')
    @include(getViewPath('partials.common.default._modal', $currentTenant->tenant_id))
@show

@include(getViewPath('partials.common.default._formConfirm', $currentTenant->tenant_id), array('formId' => 'createContact'))
<!-- /Modal -->

<!-- Scripts -->
@include(getViewPath('partials.common.default._scripts', $currentTenant->tenant_id))
@include(getViewPath('partials.common.default._autoLogOut', $currentTenant->tenant_id))
@include(getViewPath('partials.common.default._intercomAppUser', $currentTenant->tenant_id))
<!-- /Scripts -->

</body>
</html>