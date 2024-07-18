@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.pesanan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.pesanans.update', [$pesanan->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="fullname">{{ trans('cruds.pesanan.fields.fullname') }}</label>
                <input class="form-control {{ $errors->has('fullname') ? 'is-invalid' : '' }}" type="text" name="fullname" id="fullname" value="{{ old('fullname', $pesanan->fullname) }}" required>
                @if($errors->has('fullname'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fullname') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pesanan.fields.fullname_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.pesanan.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $pesanan->address) }}" required>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pesanan.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.pesanan.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $pesanan->phone) }}" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pesanan.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.pesanan.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $pesanan->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pesanan.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="products">{{ trans('cruds.pesanan.fields.product') }}</label>
                <select class="form-control select2 {{ $errors->has('products') ? 'is-invalid' : '' }}" name="products[]" id="products" multiple required>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ (in_array($product->id, old('products', $pesanan->products->pluck('id')->toArray())) ? 'selected' : '') }}>{{ $product->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('products'))
                    <div class="invalid-feedback">
                        {{ $errors->first('products') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pesanan.fields.product_helper') }}</span>
            </div>
            <div id="quantity-container"></div>
            <div class="form-group">
                <label for="total">{{ trans('cruds.pesanan.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', $pesanan->total) }}" step="0.01" readonly>
                @if($errors->has('total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pesanan.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
@parent
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const productSelect = document.getElementById('products');
        const quantityContainer = document.getElementById('quantity-container');
        const pesananQuantities = @json($pesanan->products->pluck('pivot.quantity', 'id'));

        productSelect.addEventListener('change', function() {
            quantityContainer.innerHTML = '';
            for (let product of this.selectedOptions) {
                let quantityInput = document.createElement('input');
                quantityInput.type = 'number';
                quantityInput.name = `quantities[${product.value}]`;
                quantityInput.min = 1;
                quantityInput.placeholder = `Quantity for ${product.text}`;
                quantityInput.value = pesananQuantities[product.value] || 1;
                quantityContainer.appendChild(quantityInput);
            }
        });

        productSelect.dispatchEvent(new Event('change')); // To initialize the quantities on page load if any products are pre-selected
    });
</script>
@endsection
