@extends('admin.layouts.master')

@section('title')

@endsection

@section('content')
<h3>การจัดส่ง</h3>
<hr>
<table class="table table-striped text-center">
  <thead>
    <tr>
      <th scope="col">อันดับ</th>
      <th scope="col">รายละเอียดการจัดส่ง</th>
      <th scope="col">จัดส่งแล้ว</th>
    </tr>
  </thead>
  <tbody>
    @foreach($shipping as $all_shipping)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$all_shipping->shipping_address}}</td>
      <td>
        <form action="/admin/shipping-success" method="post">
          <input type="hidden" name="inventory_id" value="{{$all_shipping->inventory_id}}">
          @csrf
          <button class="btn btn-success form-control" type="submit" name="button">จัดส่งแล้ว</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
