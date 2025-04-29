@extends('dashboard.layout')
@section('konten')

<p class="card-title">EXPERIENCE</p>
<div class="pb-3"><a href="{{route('experience.create')}}" class="btn btn-primary">Tambah Experience</a></div>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-1">No.</th>
                <th>Posisi</th>
                <th>Nama Perusahaan</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Akhir</th>
                <th class="col-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            @foreach ($data as $item)
            <tr>
                <td>{{$no}}</td>
                <td>{{$item->judul}}</td>
                <td>{{$item->info1}}</td>
                <td>{{$item->tgl_mulai_indo}}</td>
                <td>{{$item->tgl_akhir_indo}}</td>
                <td>
                    <a href="{{route('halaman.edit', $item->id)}}" class="btn btn-sm btn-warning">Edit</a>
                    <form 
                    onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                    action="{{route('halaman.destroy', $item->id)}}" 
                    class="d-inline" 
                    method="POST"
                        >
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit" name="submit">Delete</button>
                    </form>
                </td>
            </tr>
            
            <?php $no++; ?>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
