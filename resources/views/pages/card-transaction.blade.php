@extends('layout.app')

@section('content')
    <div class="mb-5 border-bottom border-2">
        <h2>Card Transaction</h2>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form class="needs-validation"
                  method="POST"
                    action="{{ route('transactions.store') }}"
            >
                {{ csrf_field() }}
                @method('POST')
                <input type="hidden" name="type" value="{{ \Database\Factories\TransactionFactory::CARD_TYPE }}">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Card number</label>
                        <input name="card_number"
                               type="text"
                               class="form-control @error('card_number') is-invalid @enderror"
                               value="{{ old('card_number') }}"
                               required
                        >
                        @error('card_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Cardholder</label>
                        <input name="card_holder"
                               type="text"
                               class="form-control @error('card_holder') is-invalid @enderror"
                               value="{{ old('card_holder') }}"
                               required
                        >
                        @error('card_holder')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>Expiration Date</label>
                        <input name="expiration_date"
                               type="text"
                               class="form-control @error('expiration_date') is-invalid @enderror"
                               value="{{ old('expiration_date') }}"
                               required
                        >
                        <small class="text-muted">Please use (MM/YYYY) format</small>

                        @error('expiration_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>CVV</label>
                        <input name="cvv"
                               type="text"
                               class="form-control @error('cvv') is-invalid @enderror"
                               value="{{ old('cvv') }}"
                        >
                        @error('cvv')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3 mb-3 w-100">
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

                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            </form>
        </div>
    </div>
@endsection
