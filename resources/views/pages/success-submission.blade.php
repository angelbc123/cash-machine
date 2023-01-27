@extends('layout.app')

@section('content')
    @php
        /** @var \App\Models\Interfaces\Transaction $transaction */
        $transaction = session()->get('transaction')
    @endphp
    <div class="row">
        <div class="col-md-12 mb-4">
            <h2 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Transaction details</span>
            </h2>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">ID</h6>
                    </div>
                    <span class="text-muted">{{ $transaction->id }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Amount</h6>
                    </div>
                    <span class="text-muted">{{ number_format($transaction->amount(), 2, ',', '.') }}$</span>
                </li>
                @foreach($transaction->inputs() as $key => $value)
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{ str_replace('_', ' ', \Illuminate\Support\Str::title($key)) }}</h6>
                        </div>
                        <span class="text-muted">{{ $value }}</span>
                    </li>
                @endforeach

            </ul>

            <a href="{{ route('home-page') }}"
               class="btn btn-secondary">
                Back to home
            </a>

        </div>
    </div>
@endsection
