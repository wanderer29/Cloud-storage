@extends('layouts.app')

@section('title', 'Облачное хранилище')

@section('header_title', 'Облачное хранилище')

@section('content')
<div class="container mt-4">
    <form style="text-align: right" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Выход</button>
    </form>

    <div class="card mt-2">
        <div class="card-header">
            <h3>Загрузить файлы</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="bucket" class="form-label">Выберите бакет:</label>
                    <select class="form-control" id="bucket" name="bucket" required>
                        <option value="my-bucket">Main bucket</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="folder" class="form-label">Укажите папку (необязательно):</label>
                    <input type="text" class="form-control" id="folder" name="folder" placeholder="Например: images/2024">
                </div>

                <div class="mb-3">
                    <label for="files" class="form-label">Выберите файлы:</label>
                    <input type="file" class="form-control" id="files" name="files[]" multiple required>
                </div>

                <button type="submit" class="btn btn-primary">Загрузить</button>
            </form>
        </div>
    </div>
</div>
@endsection
