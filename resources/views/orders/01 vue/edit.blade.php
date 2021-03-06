@extends('layouts.app')

@section('content')

<div class="container" id='root'>

  {{-- Content --}}



  <div class="jumbotron">
    @if($order->exists)
    <h1 class="display-5">Update an Order</h1>
    @else
    <h1 class="display-5">Create an Order</h1>
    @endif

  </div>

  @if ($errors->any())
  <div class="notification is-danger">
    <button class="delete"></button>
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  <br />
  @endif




  @if($order->exists)
  <form method="POST" action="{{ route('orders.update',$order) }}" enctype="multipart/form-data">
    @method('put')
    @else
    <form method="POST" action="{{ route('orders.store') }}" enctype="multipart/form-data">
      @endif
      @csrf

      <div class="row">

        <div class="col-md-6 mb-3">
          <h4 class="mb-3">Customer Information</h4>

          <x-inputs.combine for="customer_name" value="{{$order->customer_name }}"/>
          <x-inputs.combine for="phone" value="{{$order->phone }}"/>
          <x-inputs.combine for="email" value="{{$order->email }}" type="email"a/>
          <x-inputs.combine for="department" value="{{$order->department }}"/>
          <x-inputs.combine for="number_of_copies" value="{{$order->number_of_copies }}"/>
          <x-inputs.combine for="number_of_originals" value="{{$order->number_of_originals }}"/>
        </div>


        <div class="col-md-6">
          <hr class="mb-4">
          <h4 class="mb-3">Payment</h4>
          <div class="d-block my-3">

            <div class="form-check">
              <input class="form-check-input" type="radio" name="payment_type" id="Cash" value="Cash"
              {{ ($order->payment_type ?? 'Cash') ? 'checked' : '' }} v-model="payment_type">
              <label class="form-check-label" for="Cash">
                Cash
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="payment_type" id="Check" value="Check"
              {{ ($order->payment_type ?? 'Check') ? 'checked' : '' }} v-model="payment_type">
              <label class="form-check-label" for="Check">
                Check
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="payment_type" id="KFS" value="KFS"
              {{ ($order->payment_type ?? 'KFS') ? 'checked' : '' }} v-model="payment_type">
              <label class="form-check-label" for="KFS">
                KFS
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="payment_type" id="Credit" value="Credit"
              {{ ($order->payment_type ?? 'Credit') ? 'checked' : '' }} v-model="payment_type">
              <label class="form-check-label" for="Credit">
                Credit
              </label>
            </div>

            <div v-if="payment_type === 'KFS'">
              <x-inputs.combine for="kfs_chart" value="{{$order->kfs_chart }}"/>
              <x-inputs.combine for="kfs_account" value="{{$order->kfs_account }}"/>
            </div>

            <div v-if="payment_type === 'Credit'">
              <div class="col-xs-12 col-md-12" style="background: lightgreen; border-radius: 5px; padding: 10px;">
                <div class="panel panel-primary">
                  <div class="creditCardForm">
                    <div class="payment">
                      {{-- <form id="payment-card-info" method="post" action="#"> --}}
                        {{-- @csrf --}}
                        <div class="row">
                          <div class="form-group owner col-md-8">
                            <label for="owner">Owner</label>
                            <input type="text" class="form-control" id="owner" name="owner" value="" required>
                            <span id="owner-error" class="error text-red">Please enter owner name</span>
                          </div>
                          <div class="form-group CVV col-md-4">
                            <label for="cvv">CVV</label>
                            <input type="number" class="form-control" id="cvv" name="cvv" value="" required>
                            <span id="cvv-error" class="error text-red">Please enter cvv</span>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-8" id="card-number-field">
                            <label for="cardNumber">Card Number</label>
                            <input type="text" class="form-control" id="cardNumber" name="cardNumber" value="" required>
                            <span id="card-error" class="error text-red">Please enter valid card number</span>
                          </div>
                          <div class="form-group col-md-4" >
                            <label for="amount">Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" min="1" value="" required>
                            <span id="amount-error" class="error text-red">Please enter amount</span>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6" id="expiration-date">
                            <label>Expiration Date</label><br/>
                            <select class="form-control" id="expiration-month" name="expiration-month" style="float: left; width: 100px; margin-right: 10px;">
                              {{-- @foreach($months as $k=>$v) --}}
                              {{-- <option value="{{ $k }}" {{ old('expiration-month') == $k ? 'selected' : '' }}>{{ $v }}</option> --}}
                              {{-- @endforeach --}}
                              <option value="jan">jan</option>
                              <option value="feb">feb</option>
                              <option value="march">march</option>
                              <option value="april">april</option>
                              <option value="may">may</option>
                            </select>
                            <select class="form-control" id="expiration-year" name="expiration-year"  style="float: left; width: 100px;">

                              {{-- @for($i = date('Y'); $i <= (date('Y') + 15); $i++) --}}
                              {{-- <option value="{{ $i }}">{{ $i }}</option> --}}
                              {{-- @endfor --}}
                              <option value="2020">2020</option>
                              <option value="2021">2021</option>
                              <option value="2020">2020</option>
                              <option value="2023">2023</option>
                              <option value="2024">2024</option>
                            </select>
                          </div>
                          <div class="form-group col-md-6" id="credit_cards" style="margin-top: 22px;">
                            <img src="{{ asset('images/visa.jpg') }}" id="visa">
                            <img src="{{ asset('images/mastercard.jpg') }}" id="mastercard">
                            <img src="{{ asset('images/amex.jpg') }}" id="amex">
                          </div>
                        </div>

                        <br/>
                        <div class="form-group" id="pay-now">
                          {{-- <button type="submit" class="btn btn-success themeButton" id="confirm-purchase">Confirm Payment</button> --}}
                        </div>
                      {{-- </form> --}}
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </div>


        </div>



      </div>

{{--       <div>
        <x-inputs.combine for="color_copies" value="{{$order->color_copies }}"/>
        <x-inputs.combine for="paper_size" value="{{$order->paper_size }}"/>
        <x-inputs.combine for="paper_sides" value="{{$order->paper_sides }}"/>
        <x-inputs.combine for="customer_supplied_paper" value="{{$order->customer_supplied_paper }}"/>
        <x-inputs.combine for="white_paper_options" value="{{$order->white_paper_options }}"/>
        <x-inputs.combine for="color_paper" value="{{$order->color_paper }}"/>
        <x-inputs.combine for="cover_stock" value="{{$order->cover_stock }}"/>
        <x-inputs.combine for="ncr_carbonless_forms" value="{{$order->ncr_carbonless_forms }}"/>
        <x-inputs.combine for="post_copy_options" value="{{$order->post_copy_options }}"/>
        <x-inputs.combine for="binding" value="{{$order->binding }}"/>

        <hr class="mb-12">


      </div> --}}
      <dir class='row'>

{{--         <div class="col-md-3">
          <h4 class="mb-3">Payment</h4>
          <div class="d-block my-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="payment_type" id="Cash" value="Cash"
              {{ ($order->payment_type ?? 'Cash') ? 'checked' : '' }} v-model="payment_type">
              <label class="form-check-label" for="Cash">
                Cash
              </label>
            </div>
          </div>
        </div> --}}

        @foreach($types as $type)
        {{-- @if($type->name <> 'payment_type') --}}
        @if(!(in_array($type->name, array("payment_type", "color_copies"))))

        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h4 class="mb-3">{{ $type->name }}</h4>
              <div class="d-block my-3">

                @foreach($type->options as $option)

                <div class="form-check">
                  <input
                  class="form-check-input"
                  type="radio"
                  name="{{ $type->name }}"
                  id="{{ $option->name }}"
                  value="{{ $option->name }}"
                  {{-- {{ ($order->payment_type ?? $option->name ) ? 'checked' : '' }} --}}
                  {{-- v-model="payment_type" --}}
                  >
                  <label class="form-check-label" for="{{ $option->name }}">
                    {{ $option->name }}
                  </label>
                </div>

                @endforeach
              </div>
            </div>
          </div>
        </div>

        @endif
        @endforeach

      </dir>


    Logo:
    <br />
    <input type="file" name="logo" />

      <br>
      <br>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  {{-- @endsection --}}

  {{-- @section('script') --}}
  <script src="https://unpkg.com/vue@2.1.6/dist/vue.js"></script>

  <script>

    new Vue({
      el:'#root',
      data: {
        message: 'Hello world',
        m2: 'hw',
        payment_type: {!! json_encode($order->payment_type) !!},
        selected: '',
        color: '',
      }
    })

  </script>
  @endsection
