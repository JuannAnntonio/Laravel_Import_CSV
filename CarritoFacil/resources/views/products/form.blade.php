{!! Form::open(['url' => '/productos', 'class' => 'app-form'])  !!}

    <div>
        {!! Form::label('title', 'Titulo del Producto')  !!}
        {!! Form::text('title','',['class'=> 'form-control'])  !!}
    </div>
    <div>
        {!! Form::label('descripcion', 'Descripcion del Producto')  !!}
        {!! Form::textarea('descripcion','',['class'=> 'form-control'])  !!}
    </div>
    <div>
        {!! Form::label('precio', 'Precio del Producto')  !!}
        {!! Form::text('precio',0,['class'=> 'form-control'])  !!}
    </div>

    <div>
        <input type="submit" value="Guardar" class="btn btn-primary">
    </div>

{!! Form::close()  !!}
