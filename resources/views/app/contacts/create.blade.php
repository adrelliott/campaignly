<h3 class="text-primary"><i class="fa fa-pencil"></i> Basic Details</h3>
<div class="row">
    {!! Former::open()
        ->id('createContact')
        ->method('POST')
        ->role('form')
        ->route('app.contacts.store')
    !!}

        @include(getViewPath('app.contacts.partials.default._createContactForm', $tenant_id))

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="submit" class="btn btn-lg btn-success pull-right">
                <i class="fa fa-check"></i> Create  {{ $profile['references']['contact'] }}
            </button>
        </div>

    {!! Former::close() !!}
</div>