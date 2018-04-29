@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Seller Deal Transaction') }}
                        @if(isset($message))<a class="btn  btn-info valid-feedback">success</a>@endif</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/sellerdeal') }}">
                            @csrf
                            <input type="hidden" name="definition_id" value="11"/>

                            <input type="hidden" name="api_password" value="d3b049426bfa6b3891d3c2b7c78d3d68f5f0137d"/>

                            <input type="hidden" name="transaction_type" value="Seller_Deal"/>


                            <div class="form-group row">
                                <label for="notification_tel" class="col-md-4 col-form-label text-md-right">{{ __('notification_tel') }}</label>

                                <div class="col-md-6">
                                    <input id="notification_tel" type="text" class="form-control{{ $errors->has('notification_tel') ? ' is-invalid' : '' }}" name="notification_tel" value="{{ old('notification_tel') }}" required autofocus>

                                    @if ($errors->has('notification_tel'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('notification_tel') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="product_title" class="col-md-4 col-form-label text-md-right">{{ __('product_title') }}</label>

                                <div class="col-md-6">
                                    <input id="product_title" type="text" class="form-control{{ $errors->has('product_title') ? ' is-invalid' : '' }}" name="product_title" value="{{ old('product_title') }}" required autofocus>

                                    @if ($errors->has('product_title'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('product_title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('category') }}</label>

                                <div class="col-md-6">
                                    <input id="category" type="text" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" name="category" value="{{ old('category') }}" required>

                                    @if ($errors->has('category'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('quantity') }}</label>

                                <div class="col-md-6">
                                    <input id="quantity" type="text" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" required>

                                    @if ($errors->has('quantity'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="product_url" class="col-md-4 col-form-label text-md-right">{{ __('product_url') }}</label>

                                <div class="col-md-6">
                                    <input id="product_url" type="text" class="form-control" name="product_url" required>
                                </div>

                                @if ($errors->has('product_url'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('product_url') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group row">
                                <label for="product_id" class="col-md-4 col-form-label text-md-right">{{ __('product_id') }}</label>

                                <div class="col-md-6">
                                    <input id="product_id" type="text" class="form-control" name="product_id" required>
                                </div>

                                @if ($errors->has('product_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('product_id') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group row">
                                <label for="variant" class="col-md-4 col-form-label text-md-right">{{ __('variant') }}</label>

                                <div class="col-md-6">
                                    <input id="variant" type="text" class="form-control" name="variant" required>
                                </div>

                                @if ($errors->has('variant'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('variant') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group row">
                                <label for="deal_price" class="col-md-4 col-form-label text-md-right">{{ __('deal_price') }}</label>

                                <div class="col-md-6">
                                    <input id="deal_price" type="text" class="form-control" name="deal_price" required>
                                </div>

                                @if ($errors->has('deal_price'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('deal_price') }}</strong>
                                    </span>
                                @endif
                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create Transaction') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
