@extends('backend.admin_layout')
@section('admin_content')
  @php
    use Carbon\Carbon;
    $cateProducts = !empty($data['all_category_products']) ? $data['all_category_products'] : null;
  @endphp
  <div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">{{'Liệt kê danh mục sản phẩm'}}</div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">{{'Bulk action'}}</option>
            <option value="1">{{'Delete selected'}}</option>
            <option value="2">{{'Bulk edit'}}</option>
            <option value="3">{{'Export'}}</option>
          </select>
          <button class="btn btn-sm btn-default">{{'Apply'}}</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">{{'Go!'}}</button>
            </span>
          </div>
        </div>
      </div>
      <div class="table-responsive">
       @php
          $message = session()->get('message');
          //
          if(!empty($message)) {
            echo '<div><span class="text-alert">' .$message. '</span><div>';
            $message = session()->pull('message');
          }
        @endphp
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>{{'Tên danh mục'}}</th>
              <th>{{'Hiển thị'}}</th>
              <th>{{"Ngày thêm"}}</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($cateProducts as $key => $item)
                  <tr>
                      <!-- Checkbox -->
                      <td>
                          <label class="i-checks m-b-none">
                              <input type="checkbox" name="post[]">
                              <i></i>
                          </label>
                      </td>

                      <!-- Tên danh mục -->
                      <td>{{ $item->category_name }}</td>

                      <!-- Trạng thái danh mục -->
                      <td>
                          <span class="text-ellipsis">
                              @if ($item->category_status == 'activated')
                                  <!-- Trạng thái chưa kích hoạt -->
                                  <a href="{{ route('ROUTE_UNACTIVE_CATEGORY_PRODUCTS', ['id' => $item->category_id]) }}">
                                      <span class="fa-thumb-styling fa fa-thumbs-up"></span>
                                  </a>
                              @else
                                  <!-- Trạng thái đã kích hoạt -->
                                  <a href="{{ route('ROUTE_ACTIVE_CATEGORY_PRODUCTS', ['id' => $item->category_id]) }}">
                                      <span class="fa-thumb-styling fa fa-thumbs-down"></span>
                                  </a>
                              @endif
                          </span>
                      </td>

                      <!-- Ngày tháng (giả sử là ngày hiện tại) -->
                      @php
                        $createdAt = !empty($item->created_at) ? Carbon::parse($item->created_at)->format('d/m/Y') : null;
                      @endphp
                      <td><span class="text-ellipsis">{{ $createdAt }}</span></td>

                      <!-- Các hành động -->
                      <td>
                          <a href="{{ route('ROUTE_EDIT_CATEGORY_PRODUCTS_DASHBOARD_PAGE', ['id' => $item->category_id]) }}" class="active styling edit" ui-toggle-class="">
                              <i class="fa fa-check fa-pencil-square-o text-success text-active"></i>
                          </a>
                          <a onclick="return confirm('Are you sure to delete?');" href="{{ route('ROUTE_DELETE_CATEGORY_PRODUCTS_DASHBOARD_PAGE', ['id' => $item->category_id]) }}" class="active styling edit">
                              <i class="fa fa-times text-danger text"></i>
                          </a>
                      </td>
                  </tr>
              @endforeach
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          
          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection