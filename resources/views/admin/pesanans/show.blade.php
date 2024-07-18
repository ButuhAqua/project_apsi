@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pesanan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pesanans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pesanan.fields.id') }}
                        </th>
                        <td>
                            {{ $pesanan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pesanan.fields.fullname') }}
                        </th>
                        <td>
                            {{ $pesanan->fullname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pesanan.fields.address') }}
                        </th>
                        <td>
                            {{ $pesanan->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pesanan.fields.phone') }}
                        </th>
                        <td>
                            {{ $pesanan->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pesanan.fields.email') }}
                        </th>
                        <td>
                            {{ $pesanan->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pesanan.fields.product') }}
                        </th>
                        <td>
                            <ul>
                                @foreach($pesanan->products as $product)
                                    <li>{{ $product->name }} - {{ $product->pivot->quantity }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pesanan.fields.total') }}
                        </th>
                        <td>
                            {{ $pesanan->total }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pesanans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection