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
            {!! Form::checkbox('tags[]', $tag->id, null) !!}
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
                @isset ($post->image)
                    <img id="picture" src="{{ Storage::url($post->image->url) }}" alt="">
                @else
                    <img id="picture" src="{{ asset('img/cat-6568422_1280.jpg') }}" alt="">
                @endif
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

