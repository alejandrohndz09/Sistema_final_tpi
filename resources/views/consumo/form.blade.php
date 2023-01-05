<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('lectura_anterior') }}
            {{ Form::text('lectura_anterior', $consumo->lectura_anterior, ['class' => 'form-control' . ($errors->has('lectura_anterior') ? ' is-invalid' : ''), 'placeholder' => 'Lectura Anterior']) }}
            {!! $errors->first('lectura_anterior', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('lectura_actual') }}
            {{ Form::text('lectura_actual', $consumo->lectura_actual, ['class' => 'form-control' . ($errors->has('lectura_actual') ? ' is-invalid' : ''), 'placeholder' => 'Lectura Actual']) }}
            {!! $errors->first('lectura_actual', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_a_facturar') }}
            {{ Form::text('fecha_a_facturar', $consumo->fecha_a_facturar, ['class' => 'form-control' . ($errors->has('fecha_a_facturar') ? ' is-invalid' : ''), 'placeholder' => 'Fecha A Facturar']) }}
            {!! $errors->first('fecha_a_facturar', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('desde') }}
            {{ Form::text('desde', $consumo->desde, ['class' => 'form-control' . ($errors->has('desde') ? ' is-invalid' : ''), 'placeholder' => 'Desde']) }}
            {!! $errors->first('desde', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hasta') }}
            {{ Form::text('hasta', $consumo->hasta, ['class' => 'form-control' . ($errors->has('hasta') ? ' is-invalid' : ''), 'placeholder' => 'Hasta']) }}
            {!! $errors->first('hasta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('monto') }}
            {{ Form::text('monto', $consumo->monto, ['class' => 'form-control' . ($errors->has('monto') ? ' is-invalid' : ''), 'placeholder' => 'Monto']) }}
            {!! $errors->first('monto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $consumo->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('vence') }}
            {{ Form::text('vence', $consumo->vence, ['class' => 'form-control' . ($errors->has('vence') ? ' is-invalid' : ''), 'placeholder' => 'Vence']) }}
            {!! $errors->first('vence', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idMedidores') }}
            {{ Form::text('idMedidores', $consumo->idMedidores, ['class' => 'form-control' . ($errors->has('idMedidores') ? ' is-invalid' : ''), 'placeholder' => 'Idmedidores']) }}
            {!! $errors->first('idMedidores', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('mora') }}
            {{ Form::text('mora', $consumo->mora, ['class' => 'form-control' . ($errors->has('mora') ? ' is-invalid' : ''), 'placeholder' => 'Mora']) }}
            {!! $errors->first('mora', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>