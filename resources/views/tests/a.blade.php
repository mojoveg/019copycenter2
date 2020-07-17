@extends('layouts.app')

@section('content')

    <div class="container">
        {{-- @include ('projects.list') --}}

        {{-- <form method="POST" action="/orders" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)"> --}}
hello
<test2></test2>

<input type="text" id="name" name="name" class="input" v-model="form.name">

{{--             <div class="control">
                <label for="customer_name" class="label">Project customer_name:</label>

                <input type="text" id="customer_name" name="customer_name" class="input" v-model="form.customer_name">

                <span class="help is-danger" v-if="form.errors.has('customer_name')" v-text="form.errors.get('customer_name')"></span>
            </div>

            <div class="control">
                <label for="number_of_copies" class="label">Project number_of_copies:</label>

                <input type="text" id="number_of_copies" name="number_of_copies" class="input" v-model="form.number_of_copies">

                <span class="help is-danger" v-if="form.errors.has('number_of_copies')" v-text="form.errors.get('number_of_copies')"></span>
            </div>

            <div class="control">
                <label for="payment_type" class="label">Project payment_type:</label>

                <input type="text" id="payment_type" name="payment_type" class="input" v-model="form.payment_type">

                <span class="help is-danger" v-if="form.errors.has('payment_type')" v-text="form.errors.get('payment_type')"></span>
            </div> --}}


{{--             <div class="control">
                <button class="button is-primary" :disabled="form.errors.any()">Create</button>
            </div>
        </form> --}}
    </div>

@endsection
