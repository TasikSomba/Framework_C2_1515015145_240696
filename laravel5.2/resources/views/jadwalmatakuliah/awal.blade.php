@extends('master')
@section('container')
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>Seluruh Data Jadwal Matakuliah</strong>
		<a href="{{url('jadwalmatakuliah/tambah')}}" class="btn btn-xs btn-primary pull-right"><i class="fa fa-plus"></i>Jadwal Matakuliah</a>
		<div class="clearfix"></div>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>No.</th>
				<th>Id Mahasiswa</th>
				<th>Ruangan</th>
				<th>Dosen Pengampu</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $x=1; ?>
			@foreach ($data as $jadwalmatakuliah)
			<tr>
				<td>{{ $x++}}</td>
				<td>{{ $jadwalmatakuliah->mahasiswa_id or 'mahasiswa_id Kosong' }}</td>
				<td>{{ $jadwalmatakuliah->ruangan_id or 'ruangan_id Kosong' }}</td>
				<td>{{ $jadwalmatakuliah->dosenmatakuliah_id or 'dosenmatakuliah_id Kosong' }}</td>
				<td>
					<div class="btn-group" role="group">
						<a href="{{url('jadwalmatakuliah/edit/'.$jadwalmatakuliah->id)}}" class="btn btn-warning btn-xs" data-toogle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-pencil"></i></a>
						<a href="{{url('jadwalmatakuliah/lihat/'.$jadwalmatakuliah->id)}}" class="btn btn-info btn-xs" data-toogle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-eye"></i></a>
						<a href="{{url('jadwalmatakuliah/hapus/'.$jadwalmatakuliah->id)}}" class="btn btn-danger btn-xs" data-toogle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-remove"></i></a>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop