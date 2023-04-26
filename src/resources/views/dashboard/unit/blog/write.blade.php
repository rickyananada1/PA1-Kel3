<link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet" />
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

@extends('dashboard.component.dashboard')
@section('dashboard.content')
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-lg-7 col-md-10 col-sm-12">
            <h1>
                Tambah Data Sampah
            </h1>
            <div class="d-flex justify-content-center">
                <form class="form-group py-5 col-11" method="post" action="{{ route('sampah.action.push') }}">
                    @csrf
                    <div class="mb-5">
                        <label for="jumlah">Judul blog</label>
                        <div class="input-group mt-2">
                            <input type="text" min="0" name="jumlah" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="jumlah">Foto header blog</label>
                        <div class="input-group mt-2">
                            <input type="file" min="0" name="jumlah" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="jumlah" class="mb-2">Konten blog</label>
                        <!-- Create the editor container -->
                        <div placeholder="Textarea" class="col-12" id="editor"></div>

                        <!--- hidden input to post --->
                        <input type="hidden" name="content">
                    </div>

                    <div class="mb-5">
                        <input type="submit" value="catat" class="btn btn-success">
                        <a href="/dashboard" class="btn btn-secondary">kembali ke dashboard</a>
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
            document.querySelector("input[name='content']").value = editor.root.innerHTML;
        })
    </script>
@endsection
