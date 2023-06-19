<link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet" />
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

@extends('dashboard.component.dashboard')
@section('dashboard.content')
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h1>
                Tulis cerita
            </h1>
            <div class="d-flex justify-content-center">
                <form class="form-group py-5 col-11" method="post" action="{{ route('cerita.action.push') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-5">
                        <label for="jumlah">Judul cerita</label>
                        <div class="input-group mt-2">
                            <input type="text" min="0" name="judul_cerita" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="kategori">Kategori cerita</label>
                        <select required name="kategori" class="form-select">
                            <option value="">pilih salah satu kategori</option>
                            @foreach($daftarKategori as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="jumlah">Foto utama cerita</label>
                        <div class="input-group mt-2">
                            <input type="file" min="0" name="cerita_thumbnail" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="jumlah" class="mb-2">Konten cerita</label>
                        <!-- Create the editor container -->
                        <div style="height: 500px">
                            <div class="col-12" id="editor"></div>
                        </div>

                        <!--- hidden input to post --->
                        <input type="hidden" name="konten">
                    </div>

                    <div class="mb-5">
                        <input type="submit" value="catat" class="btn btn-success">
                        <a href="{{ route('cerita.list') }}" class="btn btn-secondary">kembali ke dashboard</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        var Font = Quill.import('formats/font');
        Font.whiteList = ['serif', 'sans-serif', 'monospace']

        var editor = new Quill('#editor', {
            modules: {
                toolbar: [
                    [{header : [1,2,3,4,5,6,false]}],
                    ['bold', 'italic'],
                    ['link', 'blockquote', 'code-block', 'image'],
                    [{ list: 'ordered' }, { list: 'bullet' }],
                    [{font: ['serif', 'sans-serif', 'monospace']}]
                ]
            },
            placeholder: 'Tulis apa yang anda ingin tulis',
            theme: 'snow'
        });

        editor.on('text-change', function (delta, oldData, source){
            document.querySelector("input[name='konten']").value = editor.root.innerHTML;
        })
    </script>
@endsection
