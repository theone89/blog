@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear nuevo post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off', 'files' => true]) !!}

            {!! Form::hidden('user_id', auth()->user()->id) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre:') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del post']) !!}
            </div>

            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror

            <div class="form-group">
                {!! Form::label('slug', 'Slug:') !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug del post', 'readonly']) !!}
            </div>


            @error('slug')
                <small class="text-danger">{{ $message }}</small>
            @enderror

            <div class="form-group">
                {!! Form::label('category_id', 'Categoria:') !!}
                {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
            </div>

            @error('category_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror

            <div class="form-group">
                <p class="font-weight-bold">Etiquetas</p>

                @foreach ($tags as $tag)

                    <label for="" class="mr-2">
                        {!! Form::checkbox('tags[]', $tag->identify, null) !!}
                        {{ $tag->name }}
                    </label>

                @endforeach



                @error('tags')
                    <br>
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <div class="from-gruop">
                <p class="font-weight-bold">Estado</p>

                <label>
                    {!! Form::radio('status', 1, true) !!}
                    Borrador
                </label>
                <label>
                    {!! Form::radio('status', 2) !!}
                    Publicado
                </label>


                @error('status')

                    <br>
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                <div class="row mb-3">
                    <div class="col">
                        <div class="image-wrapper">
                            <img id="picture" src="{{ asset('img/cat-6568422_1280.jpg') }}" alt="">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            {!! Form::label('file', 'Imagen que se mostrara en el post') !!}
                            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}

                        </div>
                        @error('file')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus sit recusandae iure eius at
                        officiis aperiam, distinctio ipsa voluptates ullam aliquam ut quo repudiandae velit ab. Hic
                        perferendis voluptatibus ullam!</p>
                    </div>

                </div>
            </div>

        <div class="form-group">
            {!! Form::label('extract', 'Extracto:') !!}
            {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}
        </div>

        @error('extract')
            <small class="text-danger">{{ $message }}</small>
        @enderror

        <div class="form-group">
            {!! Form::label('body', 'Body:') !!}
            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
        </div>


        @error('body')

            <small class="text-danger">{{ $message }}</small>
        @enderror
        <br>
        {!! Form::submit('Crear Post', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

    </style>
@stop

@section('js')

    <script src="{{ asset('vendor/ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>


    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>


    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        ClassicEditor
            .create(document.querySelector('#extract'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error => {
                console.error(error);
            });
        //cambiar imagen
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
    </script>
@endsection
