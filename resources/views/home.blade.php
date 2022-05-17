<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List</title>


    <!-- Font Awesome -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
rel="stylesheet"
/>
<!--JAVASCRIPT-->
<!-- MDB -->
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
></script>
</head>
<body class="bg-dark">
    <div>
        <h1>cohort-06</h1>
    </div>
    <div class="container w-50 p-3">
        <div class="card shadow-sm">
            <div class="card-body text-success bg-dark bg-gradient py-5 ">
                <h3>To-do-List</h3>
                <form action=" {{ route('store')}} " method="POST" autocomplete="off">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="content" class="form-control" placeholder="Add your new todo">
                        <button type="submit" class="btn btn-success btn-gradient py-2 btn-sm px-4"><i class="fas fa-plus"></i></button>
                    </div>
                </form>

                {{-- if tasks count --}}

                @if (count($todolists))

                    <ul class="list-group list-group-flush mt-3">
                        @foreach ($todolists as $todo)
                            <li class="list-group-item text-white bg-dark">
                                <form action=" {{ route('destroy', $todo->id)}} " method="POST">
                                    {{ $todo->content }}
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-link btn-sm float-end"><i class="fas fa-trash">
                                        </i></button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-center mt-3"> No Tasks</p>
                @endif
            </div>

            @if (count($todolists))
            <div class="card-footer text-dark bg-danger">
                You have {{ count($todolists)}} pending Tasks
            </div>
            @else
            @endif
        </div>
    </div>
</body>
</html>
