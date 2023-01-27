@extends('layout.app')

@section('content')
    <div class="mb-5 border-bottom border-2">
        <h2>Bank Transaction</h2>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form class="needs-validation"
                  method="POST"
                  action="{{ route('transactions.store') }}"
            >
                {{ csrf_field() }}
                @method('POST')
                <input type="hidden" name="type" value="{{ \Database\Factories\TransactionFactory::BANK_TYPE }}">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Transfer Date</label>
                        <input name="transfer_date"
                               type="text"
                               class="form-control @error('transfer_date') is-invalid @enderror"
                               value="{{ old('transfer_date') }}"
                               required
                        >

                        <small class="text-muted">Please use (MM/DD/YYYY) format</small>

                        @error('transfer_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <div class="col-md-6 mb-3">
                        <label>Customer Name</label>
                        <input name="customer_name"
                               type="text"
                               class="form-control @error('customer_name') is-invalid @enderror"
                               value="{{ old('customer_name') }}"
                               required
                        >
                        @error('customer_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Account Number</label>
                        <input name="account_number"
                               type="text"
                               class="form-control @error('account_number') is-invalid @enderror"
                               value="{{ old('account_number') }}"
                               required
                        >

                        @error('account_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Amount</label>
                        <input name="amount"
                               type="number"
                               class="form-control @error('amount') is-invalid @enderror"
                               required min="0"
                               step="0.01"
                               value="{{ old('amount') }}"
                        >
                        @error('amount')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                </div>


                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            </form>
        </div>
    </div>
@endsection
