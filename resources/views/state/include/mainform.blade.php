<div class="row mb-3">
    {!! Form::label('country_id','Country',['class'=>'col-md-4 col-form-label text-md-end']) !!}
    <div class="col-md-6">
        {!! Form::select('country_id',$data['country'],null,['class'=>"form-control",'placeholder'=>'Select a country']) !!}
        @error('country_id')
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
