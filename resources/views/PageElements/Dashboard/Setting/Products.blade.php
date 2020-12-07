@extends('PageElements.Dashboard.Layout')
@section('PageTitle', 'تنظیمات محصولات')
@section('ContentHeader', 'مدیریت محصولات')
@section('content')

<div class="col-md-12">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">
                افزودن محصول جدید
            </h3>

        </div>
        <!-- /.card-header -->
        <form class="card-body" action="{{ route('Product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- /error box -->
            <div class="mb3">


                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

            </div>
            <!-- /.error box -->

            <div class="box-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>انتخاب نوع و دسته بندی محصول جدید</label>
                            <select name="ptype" class="form-control select2" onchange="collectCategories(this)" style="width: 100%;">
                                <option value="">یکی از انواع اصلی محصولات را انتخاب کنید</option>
                                @foreach ($product_ptypes as $id=>$ptype)
                                <option value="{{$id}}">{{$ptype}}</option>
                                @endforeach
                            </select>
                            <hr>
                            {{-- ======================================= --}}
                            <div class="form-group">
                                <select name="category" id="categories_list" class="form-control select2" style="width: 100%;">
                                    <option value="">یکی از دسته بندی های محصولات را انتخاب کنید</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <!-- file uploader -->
            <div class="col-6">
                <div class="card">
                    <div class="form-group">
                        <label for="exampleInputFile">ارسال تصاویر محصول</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="product_images[]" class="custom-file-input" id="fileUploader" multiple>
                                <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-12">
                    <!-- Custom Tabs -->
                    <div class="card">
                        <label>معرفی محصول</label>

                        <div class="card-header d-flex p-0">
                            <ul class="nav nav-pills ml-auto p-2">
                                @foreach (Locales() as $item)
                                <li class="nav-item"><a class="nav-link @if ($loop->first) active @endif" href="#p_introduction_{{$item['locale']}}" data-toggle="tab">{{$item['name']}}</a> </li>
                                @endforeach
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                @foreach (Locales() as $item)
                                <div class="tab-pane @if ($loop->first) active @endif" id="p_introduction_{{$item['locale']}}">
                                    <div class="mb-3">
                                        <textarea id="editor1" name="p_introduction_{{$item['locale']}}" style="width: 100%"></textarea>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- ./card -->
                </div>
                <!-- /.col -->
            </div>




            <div class="row">
                <div class="col-12">
                    <!-- Custom Tabs -->
                    <div class="card">
                        <label>ارزش غذایی</label>

                        <div class="card-header d-flex p-0">
                            <ul class="nav nav-pills ml-auto p-2">
                                @foreach (Locales() as $item)
                                <li class="nav-item"><a class="nav-link @if ($loop->first) active @endif" href="#nutritionalValue_{{$item['locale']}}" data-toggle="tab">{{$item['name']}}</a> </li>
                                @endforeach
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                @foreach (Locales() as $item)
                                <div class="tab-pane @if ($loop->first) active @endif" id="nutritionalValue_{{$item['locale']}}">
                                    <div class="mb-3">
                                        <textarea id="editor1" name="nutritionalValue_{{$item['locale']}}" style="width: 100%"></textarea>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- ./card -->
                </div>
                <!-- /.col -->
            </div>
            <button type="submit" class="btn btn-primary">ذخیره</button>
        </form>
    </div>
</div>
<!-- /.card -->


<script>
    function collectCategories(ptype)
{
    let selectedPType=ptype.value;


        $.ajax({
            type: "GET",
            url: '/Category/' + selectedPType,

            success: function (data) {

                $('#categories_list').empty();
                data.forEach(function(entry){
                let list='';
                let Cat_id='';
                    entry.forEach(function(childrenEntry) {
                        list = list + ' (' +  childrenEntry.element_content + ') ';
                        Cat_id=childrenEntry.element_id;

                    });
                        let select = document.getElementById("categories_list");
                        select.options[select.options.length] = new Option(list, Cat_id);
                });
            }
        });
}


</script>
@endsection
