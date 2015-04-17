<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    {!! Former::text('first_name')->label('First Name')->id('copy-source') !!}
</div>
<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    {!! Former::text('last_name')->label('Last Name') !!}
</div>
<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    {!! Former::text('nickname')->label('Known As')->class('form-control copy-destination') !!}
</div>
<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
    {!! Former::email('email')->label('Email') !!}
</div>

<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
    {!! Former::select('organisation_id')->label('Organisation')->options([1 => 'getfromdb']) !!}
</div>