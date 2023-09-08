@extends('index')
@section('content')

            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ route('laporan.create') }}" class="btn btn-md btn-success mb-3">TAMBAH laporan</a>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">TANGGAL</th>
                            <th scope="col">USER</th>
                            <th scope="col">KEGIATAN</th>
                            <th scope="col">SOLUSI</th>
                            <th scope="col">KEGIATAN ESOK</th>
                            <th scope="col">MASUKAN</th>
                            <th scope="col">AKSI</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($laporan as $laporan)
                            <tr>
                                <td>{{ $laporan->tanggal }}</td>
                                <td>{{ $laporan->user }}</td>
                                <td>{{ $laporan->kegiatan }}</td>
                                <td>{{ $laporan->solusi }}</td>
                                <td>{{ $laporan->kegiatan_esok }}</td>
                                <td>{{ $laporan->masukan }}</td>
                                <td class="text-center">
                                    <a href="{{ route('laporan.show', $laporan->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                    <a href="{{ route('laporan.edit', $laporan->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('laporan.destroy', $laporan->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    <div class="alert alert-danger">
                                        Data belum Tersedia.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $laporan->links() }}
                </div>
            </div>
       
<script>
    //message with toastr
    @if(session()->has('success'))
        toastr.success('{{ session('success') }}', 'BERHASIL!');
    @elseif(session()->has('error'))
        toastr.error('{{ session('error') }}', 'GAGAL!');
    @endif
</script>
@endsection