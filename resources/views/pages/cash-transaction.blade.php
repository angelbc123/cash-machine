@extends('layout.app')

@section('content')
    <div class="mb-5 border-bottom border-2">
        <h2>Cash Transaction</h2>
        <p class="small">Keep in mind that the total amount can not exceed 10.000$!</p>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form class="needs-validation"
                  method="POST"
                  action="{{ route('transactions.store') }}"
            >
                {{ csrf_field() }}
                @method('POST')
                <input type="hidden" name="type" value="{{ \Database\Factories\TransactionFactory::CASH_TYPE }}">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Banknote 1$</label>
                        <input name="banknote_1"
                               type="number"
                               class="form-control @error('banknote_1') is-invalid @enderror"
                               value="{{ old('banknote_1') }}"
                               required
                               min="1"
                        >
                        @error('banknote_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Banknote 5$</label>
                        <input name="banknote_5"
                               type="number"
                               class="form-control @error('banknote_5') is-invalid @enderror"
                               value="{{ old('banknote_5') }}"
                               required
                               min="1"
                        >
                        @error('banknote_5')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Banknote 10$</label>
                        <input name="banknote_10"
                               type="number"
                               class="form-control @error('banknote_10') is-invalid @enderror"
                               value="{{ old('banknote_10') }}"
                               required
                               min="1"
                        >
                        @error('banknote_10')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Banknote 50$</label>
                        <input name="banknote_50"
                               type="number"
                               class="form-control @error('banknote_50') is-invalid @enderror"
                               value="{{ old('banknote_50') }}"
                               required
                               min="1"
                        >
                        @error('banknote_50')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Banknote 100$</label>
                        <input name="banknote_100"
                               type="number"
                               class="form-control @error('banknote_100') is-invalid @enderror"
                               value="{{ old('banknote_100') }}"
                               required
                               min="1"
                        >
                        @error('banknote_100')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                @error('amount')
                    <p class="small text-danger">You have exceeded amount of 10.000$!</p>
                @enderror

                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            </form>
        </div>
    </div>
@endsection
