@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Sell To Any Transaction') }}
                        @if(isset($message))<a class="btn  btn-info valid-feedback">success</a>@endif</div>

                    <div class="card-body">

                        <form method="POST" action="{{ url('/selltoany') }}">
                            @csrf
                            <input type="hidden" name="definition_id" value="6"/>

                            <input type="hidden" name="api_password" value="b6a9bd1071d37d92d43c22131e0b16c8781d8b82"/>

                            <input type="hidden" name="transaction_type" value="sell_to_any"/>


                            <div class="form-group row">
                                <label for="notification_email_id" class="col-md-4 col-form-label text-md-right">{{ __('notification_email_id') }}</label>

                                <div class="col-md-6">
                                    <input id="notification_email_id" type="text" class="form-control{{ $errors->has('notification_email_id') ? ' is-invalid' : '' }}" name="notification_email_id" value="{{ old('notification_email_id') }}" required autofocus>

                                    @if ($errors->has('notification_email_id'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('notification_email_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="product_or_service" class="col-md-4 col-form-label text-md-right">{{ __('product_or_service') }}</label>

                                <div class="col-md-6">
                                    <input id="product_or_service" type="text" class="form-control{{ $errors->has('product_or_service') ? ' is-invalid' : '' }}" name="product_or_service" value="{{ old('product_or_service') }}" required autofocus>

                                    @if ($errors->has('product_or_service'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('product_or_service') }}</strong>
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
                                <label for="parameter1" class="col-md-4 col-form-label text-md-right">{{ __('parameter1') }}</label>

                                <div class="col-md-6">
                                    <input id="parameter1" type="text" class="form-control" name="parameter1" required>
                                </div>

                                @if ($errors->has('parameter1'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('parameter1') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group row">
                                <label for="parameter2" class="col-md-4 col-form-label text-md-right">{{ __('parameter2') }}</label>

                                <div class="col-md-6">
                                    <input id="parameter2" type="text" class="form-control" name="parameter2" required>
                                </div>

                                @if ($errors->has('parameter2'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('parameter2') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="parameter3" class="col-md-4 col-form-label text-md-right">{{ __('parameter3') }}</label>

                                <div class="col-md-6">
                                    <input id="parameter3" type="text" class="form-control" name="parameter3" required>
                                </div>

                                @if ($errors->has('parameter3'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('parameter3') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="parameter4" class="col-md-4 col-form-label text-md-right">{{ __('parameter4') }}</label>

                                <div class="col-md-6">
                                    <input id="parameter4" type="text" class="form-control" name="parameter4" required>
                                </div>

                                @if ($errors->has('parameter4'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('parameter4') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group row">
                                <label for="parameter5" class="col-md-4 col-form-label text-md-right">{{ __('parameter5') }}</label>

                                <div class="col-md-6">
                                    <input id="parameter5" type="text" class="form-control" name="parameter5" required>
                                </div>

                                @if ($errors->has('parameter5'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('parameter5') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group row">
                                <label for="parameter6" class="col-md-4 col-form-label text-md-right">{{ __('parameter6') }}</label>

                                <div class="col-md-6">
                                    <input id="parameter6" type="text" class="form-control" name="parameter6" required>
                                </div>

                                @if ($errors->has('parameter6'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('parameter6') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="parameter7" class="col-md-4 col-form-label text-md-right">{{ __('parameter7') }}</label>

                                <div class="col-md-6">
                                    <input id="parameter7" type="text" class="form-control" name="parameter7" required>
                                </div>

                                @if ($errors->has('parameter7'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('parameter7') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label for="seller_price" class="col-md-4 col-form-label text-md-right">{{ __('seller_price') }}</label>

                                <div class="col-md-6">
                                    <input id="seller_price" type="text" class="form-control" name="seller_price" required>
                                </div>

                                @if ($errors->has('seller_price'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('seller_price') }}</strong>
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
