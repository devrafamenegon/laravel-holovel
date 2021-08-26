@extends('/layouts/main')

@section('content')
@include('/partials/navbar')

<div class="container">
  <!-- Coluna Btn voltar -->
  <div class="row">
    <div class="col-12 my-4">
      <a href="/"><i class="fas fa-arrow-left me-2"></i>Voltar</a>
    </div>

    <!-- Coluna Card form -->
    <div class="col-12">
      <div class="card shadow bg-white rounded">
        <div class="card-header gradient text-white">
          <h2 class="card-title p-2">
            <i class="fas fa-image"></i>
            {{ isset($photo) ? 'Alterar Imagem' : 'Nova Imagem' }}
          </h2>
        </div>
        <div class="card-body p-4">

          @if (isset($photo))
            <form action="/photos/{{$photo->id}}" method="POST">
            @method('PUT')
          @else
            <form action="/photos/" method="POST" enctype="multipart/form-data">
          @endif

          @csrf

            <div class="row">

              <!-- Coluna da foto -->
              <div class="col-lg-6">
                <div class="d-flex flex-column h-100">
                  <div class="miniatura img-thumbnail d-flex flex-column justify-content-center align-items-center h-100 mt-4">
                    {{-- <i class="far fa-image"></i> --}}
                    <img id="preview-img" height="340" class="w-100" style="object-fit: cover;" src="{{asset('/img/preview.png')}}" alt="">
                  </div>
                  <div class="form-group mt-2">
                    <div class="custom-file">
                      <input id="photo" name="photo" type="file" class="custom-file-input" id="customFile" onchange="loadFile(event)">
                    </div>
                  </div>
                </div>
              </div><!-- Fim da coluna da foto -->

              <!-- Coluna das inputs -->
              <div class="col-lg-6">

                <!-- Título -->
                <div class="form-group">
                  <label for="title">Título</label>
                  <div class="input-group">
                    <div class="input-group-text">
                      <i class="fas fa-image"></i>
                    </div>
                    <input id="title" name="title" type="text" class="form-control" placeholder="Digite o título da sua imagem" value="{{$photo->title ?? null }}" required>
                  </div>
                </div>

                <!-- Data -->
                <div class="form-group">
                  <label for="date">Data</label>
                  <div class="input-group">
                    <div class="input-group-text">
                      <i class="far fa-calendar-alt"></i>
                    </div>
                    <input id="date" name="date" type="date" class="form-control" value="{{$photo->date ?? null}}" required>
                  </div>
                </div>

                <!-- Descrição -->
                <div class="form-group">
                  <label for="description">Descrição</label>
                  <textarea id="description" name="description" cols="40" rows="5" class="form-control" placeholder="Digite uma pequena descrição da imagem" required>{{$photo->description ?? null}}</textarea>
                </div>

                <!-- Botões -->
                <div class="form-group d-flex mt-3">
                  <button name="submit" type="reset" class="btn btn-laranja flex-grow-1 me-2">Limpar</button>
                  <button name="submit" type="submit" class="btn btn-primary flex-grow-1 ms-2">Salvar</button>
                </div>

              </div><!-- Fim da coluna das inputs -->
            </div><!-- Fim da linha -->
          </form><!-- Fim do form -->
        </div><!-- Fim do card-body -->
      </div><!-- Fim da card -->

    </div><!-- Fim da coluna card-form -->
  </div><!-- Fim da row -->

</div><!-- Fim do container -->

<script src="{{asset('/js/script.js')}}"></script>

@endsection
