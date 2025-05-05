@extends('dashboard.layout')
@section('konten')

<p class="card-title">EDUCATION</p>
<div class="pb-3"><a href="{{route('education.create')}}" class="btn btn-primary">Tambah Education</a></div>
<div class="table-responsive">
    <table class="table table-striped">
   
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
                    <a href="{{route('experience.edit', $item->id)}}" class="btn btn-sm btn-warning">Edit</a>
                    <form 
                    onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                    action="{{route('experience.destroy', $item->id)}}" 
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
