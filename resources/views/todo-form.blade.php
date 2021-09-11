@extends('base')

@section('content')

    <div class="container !direction !spacing">
        <div class="row justify-content-center">
            <form style="width: 50%" action="/" method="post">
                <fieldset>
                    <legend class="fw-bold">Добавление новой задачи</legend>
                    <div class="mb-3">
                        <input type="text" id="title" name="title" class="form-control" placeholder="Название задачи" value="{{ old('title') }}">
                        @error('title')
                        <div class="alert alert-danger">{{ str_replace('title', 'Название задачи', $message) }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="text" id="author" name="author" class="form-control" placeholder="Имя автора" value="{{ old('author') }}">
                        @error('author')
                        <div class="alert alert-danger">{{ str_replace('author', 'Имя автора', $message) }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <select id="status" name="status" class="form-select" required>
                            <option value="-" selected>Выбрать статус</option>
                            <option value="Не срочная">Не срочная</option>
                            <option value="Обычная">Обычная</option>
                            <option value="Срочная">Срочная</option>
                            <option value="Очень срочная">Очень срочная</option>
                        </select>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-primary">Добавить задачу</button>
                </fieldset>
            </form>
        </div>
    </div>

@stop
