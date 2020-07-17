@extends('layouts.app')

@section('content')

<div class="container">

<div class="columns">
  <div class="column is-9">

{{--     <section class="hero is-info welcome is-small">
      <div class="hero-body">
        <div class="container">
          <h1 class="title">
            Orders
          </h1>
        </div>
      </div>
    </section> --}}

    <div class="row">
      <div class="col-sm-12">
        @if(session()->get('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}
        </div>
        @endif
      </div>
      <div class="col-sm-12">
        {{-- <h1 class="display-3">orders</h1> --}}
        <div>
          <a style="margin: 19px;" href="{{ route('orders.create')}}" class="btn btn-primary">New order</a>
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <td>ID</td>
              <td>customer_name</td>
              <td>number_of_copies</td>
              <td>payemnt</td>
              <td colspan = 2>Actions</td>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
            <tr>
              <td>{{$order->id}}</td>
              <td>{{$order->customer_name}}</td>
              <td>{{$order->number_of_copies}}</td>
              <td>{{$order->payment}}</td>
              <td>
                <a href="{{ route('orders.edit',$order->id)}}" class="btn btn-primary">Edit</a>
              </td>
              <td>
                <form action="{{ route('orders.destroy', $order->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div>
        </div>

      </div>
    </div>



</div>

    @endsection
