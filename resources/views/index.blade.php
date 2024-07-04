@extends('layouts.app')
@section('content')
    <div class="bg-gray-200 p-4">
        <div class="lg:w-2/4 mx-auto py-8 px-6 bg-white rounded-xl">
            <h2 class="font-bold text-3xl text-center mb-8">
                <i class="fab fa-gg"></i>
                Currency Convert
            </h2>
            <hr>
            <div class="mb-6">
            <form method="post" action=" {{ url('currency') }}" class="flex flex-col space-y-4">
                @csrf
                <div class="flex flex-col font-bold w-4/4 px-2">
                    <label class="mb-3 text-black">Amount</label>
                <input type="text" name="amount" placeholder="Enter Amount" class="py-3 px-4 bg-gray-100 rounded-xl" value="{{ session('amount') }}">
                    @error('amount')
                    <div class="text-decoration-color: #7f1d1d;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex flex-col font-bold w-4/4 px-2">
                    <label for="from" class="mb-3 text-black">From</label>
                    <select name="from" class="py-3 px-4 bg-gray-100 rounded-xl">
                        @foreach($codes as $code => $value)
                        <option class="py-1" {{ $code == session('from') || $code =='USD' ? 'selected': '' }}>
                            {{ $code }}
                        </option>
                        @endforeach
                    </select>
                    @error('from')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex flex-col font-bold w-4/4 px-2">
                    <label for="to" class="mb-3 text-black">To</label>
                    <select name="to" class="py-3 px-4 bg-gray-100 rounded-xl">
                        @foreach($codes as $code => $value)
                            <option class="py-1" {{ $code == session('to') || $code =='KES' ? 'selected': '' }}>
                                {{ $code }}
                            </option>
                        @endforeach
                    </select>
                    @error('to')
                    <div class="text-decoration-color: #7f1d1d;">{{ $message }}</div>
                    @enderror
                </div>

                <button class="w-28 py-4 px-8 bg-green-500 text-white rounded-xl">Convert</button>

            </form>
            </div>
            <hr>
            @if(session('success'))
                <div class="text-gray-500 text-center pt-12 font-bold mx-auto text-2xl">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>

@endsection
