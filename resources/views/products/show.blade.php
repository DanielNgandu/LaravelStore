@extends('products.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('View  Product') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('store.product')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label ">{{ __('Name') }}</label>

                                <div class="col-12">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$products->product_name}}" required autocomplete="name" autofocus readonly="readonly">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text" class="col-4 col-form-label">{{ __('Code') }}</label>

                                <div class="col-12">
                                    <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{$products->product_code }}" required autocomplete="code" readonly="readonly">

                                    @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text" class="col-4 col-form-label">{{ __('Description') }}</label>

                                <div class="col-12">
                                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Product details" value="" readonly="readonly">{{$products->details }}</textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row pl-3">
                                    <img src="{{url($products->logo)}}" class="img-thumbnail" style="width: 5em;height: 5em;">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-lg btn-primary" disabled="disabled">
                                        {{ __('Save') }}
                                    </button> |
                                    <button type="reset" class="btn btn-lg btn-danger">
                                        {{ __('Clear') }}
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
