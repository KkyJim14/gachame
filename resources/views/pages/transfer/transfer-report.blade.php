@extends('layouts.master')

@section('title')

@endsection

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <h3>รายการโอนเงิน</h3>
      <hr>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped text-center">
        <thead>
          <tr>
            <th scope="col">ลำดับ</th>
            <th scope="col">ยอดเงิน</th>
            <th scope="col">เวลาโอน</th>
            <th scope="col">อัพโหลดสลิป</th>
          </tr>
        </thead>
        <tbody>
          @foreach($transfer as $all_transfer)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$all_transfer->transfer_amount}}</td>
            <td>{{$all_transfer->created_at}}</td>
            @if($all_transfer->transfer_approve == 2)
            <td>
              <button class="btn btn-success form-control" type="button" name="button">การโอนเงินอนุมัติ</button>
            </td>
            @elseif($all_transfer->transfer_approve == 1)
            <td>
              <button class="btn btn-danger form-control" type="button" name="button">การโอนเงินถูกปฎิเสธ</button>
            </td>
            @elseif(empty($all_transfer->transfer_slip))
            <td>
              <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#uploadslip{{$all_transfer->transfer_id}}">
                  อัพโหลดสลิป
                </button>

                <!-- Modal -->
                <div class="modal fade" id="uploadslip{{$all_transfer->transfer_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ส่งสลิป</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="/transfer-slip-process" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="transfer_id" value="{{$all_transfer->transfer_id}}">
                            <input type="file" name="transfer_slip" value="">
                      </div>
                      <div class="modal-footer">
                            @csrf
                            <button class="btn btn-success form-control" type="submit" name="button">ยืนยัน</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
              @else
              <td>
                <button class="btn btn-warning form-control" type="button" name="button">รอตรวจสอบ</button>
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
