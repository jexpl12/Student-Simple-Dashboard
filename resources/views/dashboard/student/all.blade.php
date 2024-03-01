@extends("layout\partial\dashboard")

<style>
    table {
        border-collapse: separate;
        border-spacing: 0 2px;
    }

    th,
    td {
        padding: 5px 10px;
    }
</style>

@section("container")
<h1>Tabel Data Siswa</h1>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <a class="btn btn-primary" href="dashboard/student/create">Add Data</a>

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">NIS</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Alamat</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$student["nis"]}}</td>
                    <td>{{$student["nama"]}}</td>
                    <td>{{$student->kelas->kelas}}</td>
                    <td>{{$student["alamat"]}}</td>
                    <td>
                    <a type="button" class="btn btn-primary" href="dashboard/student/detail/{{ $student->id }}">Detail</a>
                        <a href="dashboard/student/edit/{{$student->id}}" class="btn btn-warning">Edit</a>

                        <form action="dashboard/student/delete/{{$student->id}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('Are you sure want to delete this?')" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
@endsection