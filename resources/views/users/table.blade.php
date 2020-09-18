<div class="table-bordered">
    <table class="table" id="users-table">
        <thead>
            <tr>
        <th>Nomor</th>
        <th>Nama User Pengguna</th>
        <th>Email</th>
        <th>Akses</th>
        {{-- <th>Password</th>
        <th>Remember Token</th> --}}
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $row=>$user)
            <tr>
                <td>{{ $row +1 }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->akses }}</td>
            {{-- <td>{{ $user->password }}</td>
            <td>{{ $user->remember_token }}</td> --}}
                <td>
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('users.show', [$user->id]) }}" class='btn btn-info btn-xs'>Lihat</a>
                        <a href="{{ route('users.edit', [$user->id]) }}" class='btn btn-warning btn-xs'>Edit</a>
                        {!! Form::button('<a class="btn-danger btn-xs">Hapus</a>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Apakah kamu benar akan menghapus data ini ?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>
