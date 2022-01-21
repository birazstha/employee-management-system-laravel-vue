<div class="row mb-3">
    {!! Form::label('country_code','Country Code',['class'=>'col-md-4 col-form-label text-md-end']) !!}
    <div class="col-md-6">
        {!! Form::text('country_code',null,['class'=>"form-control"]) !!}
        @error('country_code')
        <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    {!! Form::label('name','Name',['class'=>'col-md-4 col-form-label text-md-end']) !!}
    <div class="col-md-6">
        {!! Form::text('name',null,['class'=>"form-control"]) !!}
        @error('name')
        <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>
