@extends('master')
@section('container')
<div class="panel panel-primary">
	<div class="panel-heading">
		<strong><a href="{{ url('jadwalmatakuliah') }}"><i style="color:white;" class="fa text-default fa-chevron-left"></i></a> Tambah Jadwal Matakuliah</strong>
	</div>
	{!! Form::open(['url'=>'jadwalmatakuliah/simpan','class'=>'form-horizontal']) !!}
	@include('jadwalmatakuliah.form')
	<div  style="width:100%; text-align: right">
		<button class="btn btn-primary"><i class="fa fa-save"></i>Simpan</button>
		<button type="reset" class="btn btn-danger"><i class="fa fa-undo"></i>Ulangi</button>
	</div>
	{!! Form::close() !!}
</div>
@stop