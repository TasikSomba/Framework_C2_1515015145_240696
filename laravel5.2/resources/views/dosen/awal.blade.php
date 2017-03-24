@extends('master')
@section('container')
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>Seluruh Data Dosen Matakuliah</strong>
		<a href="{{url('dosen/tambah')}}" class="btn btn-xs btn-primary pull-right"><i class="fa fa-plus"></i>Dosen Matakuliah</a>
		<div class="clearfix"></div>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama</th>
				<th>Nip</th>
				<th>alamat</th>
				<th>pengguna_id</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $x=1; ?>
			@foreach ($data as $dosen)
			<tr>
				<td>{{ $x++}}</td>

				<td>{{ $dosen->nama or 'Nama Kosong' }}</td>
				<td>{{ $dosen->nip or 'Nim Kosong' }}</td>
				<td>{{ $dosen->alamat or 'Alamat Kosong' }}</td>
				<td>{{ $dosen->pengguna_id or 'pengguna Kosong' }}</td>
				<td>
					<div class="btn-group" role="group">
						<a href="{{url('dosen/edit/'.$dosen->id)}}" class="btn btn-warning btn-xs" data-toogle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-pencil"></i></a>
						<a href="{{url('dosen/lihat/'.$dosen->id)}}" class="btn btn-info btn-xs" data-toogle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-eye"></i></a>
						<a href="{{url('dosen/hapus/'.$dosen->id)}}" class="btn btn-danger btn-xs" data-toogle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-remove"></i></a>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop