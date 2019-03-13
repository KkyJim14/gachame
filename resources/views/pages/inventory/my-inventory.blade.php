@extends('layouts.master')

@section('title')

@endsection

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <h3>กระเป๋าของฉัน</h3>
    </div>
  </div>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <hr>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped text-center">
        <thead>
          <tr>
            <th scope="col">อันดับ</th>
            <th scope="col">รูปสินค้า</th>
            <th scope="col">ชื่อสินค้า</th>
            <th scope="col">เวลาที่ได้</th>
            <th scope="col">ส่งของ</th>
          </tr>
        </thead>
        <tbody>
          @foreach($my_item as $show_item)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td><img class="inventory-img" src="/assets/img/product/{{$show_item->product->product_img}}" alt="product_img"> </td>
            <td>{{$show_item->product->product_name}}</td>
            <td>{{$show_item->created_at}}</td>
            @if($show_item->inventory_transfer == true)
            <td><button class="btn btn-success form-control disabled" type="button" name="button">จัดส่งแล้ว</button> </td>
            @elseif($show_item->shipping_address == null)
            <td>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-success form-control" data-toggle="modal" data-target="#inventory{{$show_item->inventory_id}}">
                ส่งของ
              </button>

              <!-- Modal -->
              <div class="modal fade" id="inventory{{$show_item->inventory_id}}" tabindex="-1" role="dialog" aria-labelledby="inventory" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">ข้อมูลการจัดส่ง</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form class="text-left" action="/shipping-confirm" method="post">
                        <div class="form-group">
                          <label>รายละเอียดการจัดส่ง</label>
                          <input type="hidden" name="inventory_id" value="{{$show_item->inventory_id}}">
                          <textarea class="form-control" name="shipping_address" rows="5" placeholder="กรุณากรอกรายละเอียดการจัดส่ง"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                      @csrf
                      <button class="btn btn-success form-control" type="submit" name="button">ยืนยันการจัดส่ง</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            @else
            <td>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-warning form-control" data-toggle="modal" data-target="#inventory{{$show_item->inventory_id}}">
                แก้ไขการจัดส่ง
              </button>

              <!-- Modal -->
              <div class="modal fade" id="inventory{{$show_item->inventory_id}}" tabindex="-1" role="dialog" aria-labelledby="inventory" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">ข้อมูลการจัดส่ง</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form class="text-left" action="/shipping-edit" method="post">
                        <div class="form-group">
                          <label>รายละเอียดการจัดส่ง</label>
                          <input type="hidden" name="inventory_id" value="{{$show_item->inventory_id}}">
                          <textarea class="form-control" name="shipping_address" rows="5" placeholder="กรุณากรอกรายละเอียดการจัดส่ง"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                      @csrf
                      <button class="btn btn-warning form-control" type="submit" name="button">แก้ไขการจัดส่ง</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
