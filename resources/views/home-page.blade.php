@extends('layout.app')

@section('content')

    <div class="row">
        <div class="col-4">
            <div class="card p-5">
                <img src="{{ asset('images/cash-stack.svg') }}" class="card-img-top" alt="Cash icon">
                <div class="card-body">
                    <h5 class="card-title">Cash Transaction</h5>
                    <a href="{{ route('transactions.create', ['transaction' => \Database\Factories\TransactionFactory::CASH_TYPE]) }}"
                       class="btn btn-primary">
                        Go to transaction
                    </a>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card p-5">
                <img src="{{ asset('images/credit-card-2-back.svg') }}" class="card-img-top" alt="Cash icon">
                <div class="card-body">
                    <h5 class="card-title">Card Transaction</h5>
                    <a href="{{ route('transactions.create', ['transaction' => \Database\Factories\TransactionFactory::CARD_TYPE]) }}"
                       class="btn btn-primary">
                        Go to transaction
                    </a>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card p-5">
                <img src="{{ asset('images/bank.svg') }}" class="card-img-top" alt="Cash icon">
                <div class="card-body">
                    <h5 class="card-title">Bank Transaction</h5>
                    <a href="{{ route('transactions.create', ['transaction' => \Database\Factories\TransactionFactory::BANK_TYPE]) }}"
                       class="btn btn-primary">
                        Go to transaction
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
