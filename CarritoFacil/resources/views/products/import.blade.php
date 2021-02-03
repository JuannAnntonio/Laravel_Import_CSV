@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card padding">
        <header>
            <h4>Cargar productos</h4>
        </header>

        <div class="card-body">
            {!! Form::open(['url' => '/parse-csv', 'class' => 'app-form', 'files'=>'true'])  !!}




            <div class="file has-name" id="file-js-example" >
                <label class="file-label">
                    <input class="file-input" type="file" name="csv_file" onclick="upload()">
                    <span class="file-cta">
                      <span class="file-icon">
                        <i class="fas fa-upload"></i>
                      </span>
                      <span class="file-label">
                        Examinar
                      </span>
                    </span>
                    <span class="file-name">Selecciona un archivo ... </span>
                  </label>
            </div>
            <div class="field">
                <p class="control">
                    <button class="button is-success">Cargar Datos</button>
                </p>
            </div>



            {!! Form::close()  !!}
        </div>

    </div>
</div>

@endsection
<script>
    function upload(){
        const fileInput = document.querySelector('#file-js-example input[type=file]');
        fileInput.onchange = () => {
            if (fileInput.files.length > 0) {
                const fileName = document.querySelector('#file-js-example .file-name');
                fileName.textContent = fileInput.files[0].name;
            }
        }
    }

  </script>
