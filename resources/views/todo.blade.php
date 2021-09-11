@extends('base')

@section('content')

    <div  class="container !direction !spacing">
        @if (!empty($message))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
{{--        <div class="row">--}}
{{--            <div class="col-1"></div>--}}
{{--            <div class="col-10">--}}
{{--                <div class="row align-items-center">--}}
{{--                    <div class="col-10 fs-2 fw-bold">Задачник</div>--}}
{{--                    <div class="col-2 ">--}}
{{--                        <button  onclick="window.location.href='/create'" type="button" class="btn btn-primary">Новая задача</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row align-items-center mt-2">--}}
{{--                    <div class="col-md-2">--}}
{{--                        <select class="form-select" aria-label="Default select example">--}}
{{--                            <option selected>Все авторы ({{$authors_select->count()}})</option>--}}
{{--                            @foreach ($authors_select as $value)--}}
{{--                                <option value="{{$value->author}}">{{$value->author}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-2">--}}
{{--                        <select class="form-select" aria-label="Default select example">--}}
{{--                            <option selected>Все статусы ({{$status_select->count()}})</option>--}}
{{--                            @foreach ($status_select as $value)--}}
{{--                                <option value="{{$value->status}}">{{$value->status}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="table-responsive mt-3">--}}
{{--                    @if($todoList->isEmpty())--}}
{{--                        <div class="alert alert-danger" role="alert">--}}
{{--                            Ничего не найдено.--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    <table class="table table-striped table-bordered">--}}
{{--                        <thead class="table-dark">--}}
{{--                        <tr>--}}
{{--                            <th scope="col"></th>--}}
{{--                            <th scope="col">Название задачи</th>--}}
{{--                            <th scope="col">Автор</th>--}}
{{--                            <th scope="col">Статус</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @foreach ($todoList as $todo)--}}
{{--                            <tr>--}}
{{--                                <th scope="row" id="delete_{{$todo->todo_id}}" onclick="deleteTodo({{$todo->todo_id}})">X</th>--}}
{{--                                <td>{{ $todo->title }}</td>--}}
{{--                                <td>{{ $todo->author }}</td>--}}
{{--                                <td>{{ $todo->status }}</td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--                <div class="d-flex justify-content-center">--}}
{{--                    {!! $todoList->links() !!}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-1"></div>--}}
{{--        </div>--}}

    </div>
    <div class="container mt-5">
        <div class="row align-items-center">
            <div class="col-10 fs-2 fw-bold">Задачник</div>
            <div class="col-2 ">
                <button  onclick="window.location.href='/create'" type="button" class="btn btn-primary">Новая задача</button>
            </div>
        </div>
        <table class="table table-bordered table table-striped yajra-datatable">
            <thead class="table-dark">
            <tr>
                <th></th>
                <th>Название задачи</th>
                <th>Автор</th>
                <th>Статус</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <!-- Modal HTML embedded directly into document -->
    <div id="ex1" class="modal">
        <p>Вы уверены, что хотите удалить запись?</p>
        <a href="#" id="modal-delete" rel="modal:close"><button type="button" id="modal-delete" class="btn btn-primary" >Ok</button></a>
    </div>

    <!-- Link to open the modal -->
    <a href="#ex1" id='test' rel="modal:open" hidden></a>

    <script type="application/javascript">
        //функция для удаления заявки
        function deleteTodo(id) {
            $('#test').click();
            $('#modal-delete').on('click', function(e){
                console.log("удаляем");
                $.ajax({
                    url: '/'+id,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response){
                        $('#delete_'+id).parent().parent().remove();
                    }
                });
            });
        }
    </script>
    <script type="text/javascript">
        //функция для инициализации данных в таблице DataTable
        //и удаления выбранных строк
        $(function () {
            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                "language": {
                    url : "https://cdn.datatables.net/plug-ins/1.11.1/i18n/ru.json"
                },
                ajax: "{{ route('todo.list') }}",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                columns: [
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                    {data: 'title', name: 'title'},
                    {data: 'author', name: 'author'},
                    {data: 'status', name: 'status'},
                ]
            }
            ).on('click', 'tbody tr', function () {
                table.row(this).remove();
            });
        });
    </script>
@stop
