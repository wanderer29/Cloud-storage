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
                    <label for="bucket" class="form-label">Выберите хранилище:</label>
                    <select class="form-control" id="bucket" name="bucket" required>
                        <option value="my-bucket">Основное хранилище</option>
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

<div class="card mt-4">
    <div class="card-header">
        <h3>Файлы в хранилище</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('home') }}" method="GET">
            <div class="mb-3">
                <label for="folder" class="form-label">Укажите папку:</label>
                <input type="text" class="form-control" id="folder" name="folder" value="{{ $folder ?? '' }}" placeholder="Например: images/2024">
            </div>
            <button type="submit" class="btn btn-secondary">Показать</button>
        </form>
        @if(!empty($files))
            <table class="table mt-3">
                <thead>
                <tr>
                    <th>Имя файла</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($files as $file)
                    <tr>
                        <td>{{ $file['basename'] }}</td>
                        <td>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>Нет файлов в выбранной папке.</p>
        @endif
    </div>
</div>
@endsection
