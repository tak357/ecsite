@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-bottom:10px;">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">お届け先入力</div>
                    <div class="card-body">
                        <form action="/buy" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">氏名</label>
                                    @if(Request::has('confirm'))
                                        <p class="form-control-static">{{ old('name') }}</p>
                                        <input type="hidden" name="name" id="name" value="{{ old('name') }}">
                                    @else
                                        <input type="text" name="name" id="name" class="form-control"
                                               value="{{ old('name') }}">
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="postalcode">郵便番号</label>
                                    @if(Request::has('confirm'))
                                        <p class="form-control-static">{{ old('postalcode') }}</p>
                                        <input type="hidden" name="postalcode" id="postalcode"
                                               value="{{ old('postalcode') }}">
                                    @else
                                        <input type="text" name="postalcode" id="postalcode" class="form-control"
                                               value="{{ old('postalcode') }}">
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="region">都道府県</label>
                                    @if(Request::has('confirm'))
                                        <p class="form-control-static">{{ old('region') }}</p>
                                        <input type="hidden" name="region" id="region" value="{{ old('region') }}">
                                    @else
                                        <select name="region" id="region" class="form-control">
                                            @foreach(Config::get('region') as $value)
                                                <option
                                                    @if(old('region') == $value)selected @endif>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row mb-1">
                                <div class="form-group col-md-6">
                                    <label for="addressline1">住所1</label>
                                    @if(Request::has('confirm'))
                                        <p class="form-control-static">{{ old('addressline1') }}</p>
                                        <input type="hidden" name="addressline1" id="addressline1" class="form-control"
                                               value="{{ old('addressline1') }}">
                                    @else
                                        <input type="text" name="addressline1" id="addressline1" class="form-control"
                                               value="{{ old('addressline1') }}">
                                    @endif
                                </div>
                            </div>

                            <div class="form-row mb-1">
                                <div class="form-group col-md-6">
                                    <label for="addressline2">住所2</label>
                                    @if(Request::has('confirm'))
                                        <p class="form-control-static">{{ old('addressline2') }}</p>
                                        <input type="hidden" name="addressline2" class="form-control" id="addressline2"
                                               value="{{ old('addressline2') }}">
                                    @else
                                        <input type="text" name="addressline2" class="form-control" id="addressline2"
                                               value="{{ old('addressline2') }}">
                                    @endif
                                </div>
                            </div>

                            <div class="form-row mb-1">
                                <div class="form-group col-md-6">
                                    <label for="phonenumber">電話番号</label>
                                    @if(Request::has('confirm'))
                                        <p class="form-control-static">{{ old('phonenumber') }}</p>
                                        <input type="hidden" name="phonenumber" id="phonenumber"
                                               value="{{ old('phonenumber') }}">
                                    @else
                                        <input type="text" id="phonenumber" name="phonenumber"
                                               value="{{ old('phonenumber') }}">
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    @if(Request::has('confirm'))
                                        <button type="submit" class="btn btn-primary" name="post">注文を確定する</button>
                                        <button type="submit" class="btn btn-info" name="back">修正する</button>
                                    @else
                                        <button type="submit" class="btn btn-primary" name="confirm">入力内容を確認する</button>
                                    @endif
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @foreach($cartitems as $cartitem)
                        <div class="card-header">
                            {{ $cartitem->name }}
                        </div>
                        <div class="card-body">
                            <div>
                                {{ $cartitem->amount }}円
                            </div>
                            <div>
                                {{ $cartitem->quantity }}個
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
