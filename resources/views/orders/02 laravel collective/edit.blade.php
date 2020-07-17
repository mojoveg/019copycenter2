@extends('orders.layout')

@section('content')
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#">Active</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="#">Link</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="#">Link</a>
</li>
<li class="nav-item">
    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
</li>
</ul>

{{-- <div class="container"> --}}
<h1>Edit Order</h1>

<div class="row">

    {{-- Section 1 --}}
    <div class="col-md-6 mb-3">
        {!! Form::open(['action' => ['OrderController@update', $order->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('customer_name', Str::title(str_replace('_', ' ', 'customer_name')) )}}
            {{Form::text('customer_name', $order->customer_name, ['class' => 'form-control form-control-sm'])}}
        </div>
        <div class="form-group">
            {{Form::label('phone', Str::title(str_replace('_', ' ', 'phone')) )}}
            {{Form::text('phone', $order->phone, ['class' => 'form-control form-control-sm'])}}
        </div>
        <div class="form-group">
            {{Form::label('email', Str::title(str_replace('_', ' ', 'email')) )}}
            {{Form::text('email', $order->email, ['class' => 'form-control form-control-sm'])}}
        </div>
        <div class="form-group">
            {{Form::label('department', Str::title(str_replace('_', ' ', 'department')) )}}
            {{Form::text('department', $order->department, ['class' => 'form-control form-control-sm'])}}
        </div>
        <div class="form-group">
            {{Form::label('number_of_copies', Str::title(str_replace('_', ' ', 'number_of_copies')) )}}
            {{Form::text('number_of_copies', $order->number_of_copies, ['class' => 'form-control form-control-sm'])}}
        </div>
        <div class="form-group">
            {{Form::label('number_of_originals', Str::title(str_replace('_', ' ', 'number_of_originals')) )}}
            {{Form::text('number_of_originals', $order->number_of_originals, ['class' => 'form-control form-control-sm'])}}
        </div>
    </div>
    {{-- Section 1 end --}}

    {{-- Payment section --}}
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
    {{-- Payment section end--}}



</div>

{{-- {{Form::hidden('_method','PUT')}} --}}
{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
{{-- </div> --}}


  <script src="https://unpkg.com/vue@2.1.6/dist/vue.js"></script>


<script>

    new Vue({
      el:'#app',
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
