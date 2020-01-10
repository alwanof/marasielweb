@extends('layouts.master')
@section('title','Dashboard')

@section('nav')
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('noticenter.title')}}</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
@endsection
@section('content')
  <!-- Default box -->
  <div class="container">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          <div class="col-lg-4">
              <!-- small box -->
              <div class="small-box bg-info">
                  <div class="inner">
                      <h3>{{$data['allNoti']->count()}}</h3>

                      <p>{{__('noticenter.noti')}}</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-checkmark"></i>
                  </div>

              </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4">
              <!-- small box -->
              <div class="small-box bg-success">
                  <div class="inner">
                      <h3>{{$data['newNoti']->count()}}</h3>

                      <p>{{__('noticenter.new-noti')}}</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                  </div>
              </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4">
              <!-- small box -->
              <div class="small-box bg-warning">
                  <div class="inner">
                      <h3>{{$data['oldNoti']->count()}}</h3>

                      <p>{{__('noticenter.read-noti')}}</p>
                  </div>
                  <div class="icon">

                      <i class="ion ion-eye"></i>
                  </div>
              </div>
          </div>
          <!-- ./col -->


      </div>
      <!-- /.row -->
      <div class="row">
          <div class="col-lg-6">
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title text-danger">{{__('noticenter.new')}}</h3>

                      <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                              <i class="fas fa-minus"></i></button>
                          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                              <i class="fas fa-times"></i></button>
                      </div>
                  </div>
                  <div class="card-body p-0">
                      @foreach($data['newNoti'] as $item)
                          <div class="p-2 mb-1 bg-light">
                             <img src="{{$item->data['user']['avatar']}}" width="48px" class="img-thumbnail img-circle" /> {{$item->data['data']}}
                          </div>
                      @endforeach
                  </div>
                  <!-- /.card-body -->

              </div>
          </div>
          <div class="col-lg-6">
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">{{__('noticenter.streams')}}</h3>

                      <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                              <i class="fas fa-minus"></i></button>
                          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                              <i class="fas fa-times"></i></button>
                      </div>
                  </div>
                  <div class="card-body p-0">
                      @foreach($data['oldNoti'] as $item)
                          <div class="p-2 mb-1 bg-light">
                              <img src="{{$item->data['user']['avatar']}}" width="48px" class="img-thumbnail img-circle" /> {{$item->data['data']}}
                          </div>
                      @endforeach
                  </div>
                  <!-- /.card-body -->
          </div>
      </div>
  </div>

      <!-- /.card -->
@endsection

@section('css')
          <style>
              .dropdown-item{
                  white-space: normal !important;
              }
          </style>
    @endsection
