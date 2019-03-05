@extends('admin.layouts.master')

@section('title')

@endsection

@section('content')
<h3>การแลก token</h3>
<a class="btn btn-success" href="/admin/token/create">สร้างการแลก token</a>
<hr>
<table class="table table-striped text-center">
  <thead>
    <tr>
      <th scope="col">ลำดับ</th>
      <th scope="col">ชื่อ</th>
      <th scope="col">เงินที่จ่าย</th>
      <th scope="col">tokenที่ได้</th>
      <th scope="col">แก้ไข</th>
      <th scope="col">ลบ</th>
    </tr>
  </thead>
  <tbody>
    @foreach($token as $all_token)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$all_token->token_name}}</td>
      <td>{{$all_token->token_pay}}</td>
      <td>{{$all_token->token_get}}</td>
      <td><a class="btn btn-warning form-control" href="/admin/token/{{$all_token->token_id}}/edit">แก้ไข</a> </td>
      <td>
        <form action="/admin/token/{{$all_token->token_id}}" method="post">
          @csrf
          <button class="btn btn-danger form-control" type="submit" name="button">ลบ</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
