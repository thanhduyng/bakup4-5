@extends('layouts.layout')

@section('content')

@include('layouts.header')

<div>
    <div style="height: 20px; background-color: #EEEEEE;">
        <!--  -->
    </div>
    <div class="container-fluid border" style="width: 99%;margin-left: 14px;background-color: white;">
        <div class="row">
            <div class="col-sm-11">
                <div class="btn-sm-6">
                    <h3 style="margin-left: 20px;">ユーザーマスタ一覧</h3>
                </div>
            </div>
            <div class="col-sm-1"> <a class="btn-default btn-sm-2" onclick="$('#TXT_user').toggle();return false;"> <i class="glyphicon glyphicon-chevron-down" style="margin-top: 20px; margin-left: 50px;"></i></a> </div>
        </div>
        <div id="TXT_user" style="margin-top: -20px;">
            <hr>
            <div class="form-group row"> <label for="" class="col-sm-0 col-form-label" style="margin-left: 184px;">ユーザーコード</label>
                <div class="col-sm-3">
                    <input type="text" class="required form-control number-only" id="user_cd" placeholder="" value="" name="user_cd" style="height: 31px;">
                </div>
            </div>
            <div class="form-group row"> <label for="" class="col-sm-0 col-form-label" style="margin-left: 170px;">ユーザー名称和文</label>
                <div class="col-sm-3">
                    <input type="text" class="required form-control" id="user_nm_j" placeholder="" value="" name="user_nm_j" style="height: 31px;">
                </div>
            </div>
            <div class="form-group row"> <label for="" class="col-sm-0 col-form-label" style="margin-left: 170px;">ユーザー名称英文</label>
                <div class="col-sm-3">
                    <input type="text" class="required form-control" id="user_nm_e" placeholder="" value="" name="user_nm_e" style="height: 31px;">
                </div>
            </div>
            <div class="col-sm-4 col-xs-3"> </div>
            </form>
        </div>
    </div>
    <div style="height: 30px; background-color: #EEEEEE">
        <!--  -->
    </div>
</div>

<!-- view  -->
<div class="container-fluid border" style="width: 98%; margin-left: 16px; background-color: white">
    <div class="row">
        <div class="col-sm-3" style="background-color: ;">
            <div class="dataTables_length" id="datatable_length" style="margin-top: 10px; width: 79px;"> <select name="datatable_length" aria-controls="datatable" class="form-control input-sm">
                    <option value="10">10 作</option>
                    <option value="25">25 作</option>
                    <option value="50">50 作</option>
                    <option value="100">100 作</option>
                </select> </div>
        </div>

        <div class="col-sm-3"> <label style="margin-left:-248px;margin-top: 20px;"> {{ $mUser->total() }}作成日 {{ $mUser->firstItem()}}者-{{ $mUser->lastItem()}}</label> </div>

        <div class="col-sm-6" style="margin-top: -30px;">
            <ul style="margin-left: 440px; margin-top: 20px;"> {{ $mUser->links() }} </ul>
        </div>

    </div>

    <div id="table_data">
        <table class="show-products table table-bordered" id="searchTable" style="margin-top: -20px;">
            <thead>
                <tr style="background-color: #0099FF;">
                    <th class="tha"><label id="DSP_user_cd">ユーザーコード</label></th>
                    <th class="tha"><label id="DSP_user_nm_j">ユーザー名称和文</label></th>
                    <th class="tha"><label id="DSP_user_ab_j">ユーザー略称和文</label></th>
                    <th class="tha"><label id="DSP_user_nm_e">ユーザー名称英文</label></th>
                    <th class="tha"><label id="DSP_user_ab_e">ユーザー略称英文</label></th>
                    <th class="tha"><label id="DSP_auth_role_div">権限区分</label></th>
                    <th class="tha"><label id="DSP_incumbent_div">在職区分</label></th>
                </tr>
            </thead>
            <tbody> @foreach($mUser as $value) <tr>
                    <td>{{$value->user_cd}}</td>
                    <td>{{$value->user_nm_j}}</td>
                    <td>{{$value->user_ab_j}}</td>
                    <td>{{$value->user_nm_e}}</td>
                    <td>{{$value->user_ab_e}}</td>
                    <td>{{$value->lib_val_nm_j}}</td>
                    <td>{{$value->lib_val_nm_js}}</td>

                </tr> @endforeach </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6" style="margin-top: -20px;">
            <div style="margin-left: 480px;"> {{ $mUser->links() }} </div>

            {{-- <!-- // Số trang trong kết quả $products trả về -->
             tổng số dòng hiện tại:   {{ $mUser->count()}} <br>

            <!-- // Trang hiện tại trong phần phân trang -->
            trang hiện tại: {{ $mUser->currentPage()}}<br>

            từ dòng: {{ $mUser->firstItem()}}
            đến dòng: {{ $mUser->lastItem()}}<br>

            <!-- // Trang cuối cùng trong phân trang -->
            trang cuối: {{ $mUser->lastPage()}}<br>

            <!-- // Trang tiếp theo trong phân trang -->
            trang tiếp theo: {{ $mUser->nextPageUrl()}}
            {{ $mUser->perPage()}}<br>

            <!-- // Trang trước đó trong phân trang -->
            trang trước: {{ $mUser->previousPageUrl()}}<br>

            tổng số dòng: {{ $mUser->total() }} --}}
        </div>
    </div>

    <div class="row">
        <div class="col-sm-9"> </div>
    </div>
</div>
<!-- end view  -->
@endsection