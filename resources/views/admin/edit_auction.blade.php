@extends('admin.layouts.main')

@section('title')
المزادات | أضافة مزاد

@endsection

@section('css')

@endsection
@section('breadcrumb-item')
المزادات
@endsection
@section('breadcrumb-item2')
أضافة مزاد
@endsection

@section('breadcrumb-item-active')
المزادات
@endsection

@section('page-title')

@endsection

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h4 class="my-1">تعديل مزاد </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2"><h5 class="my-1">المعلومات الاساسية</h5></div>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="mb-2 col-lg-4 col-md-12">
                                <label for="name" class="form-label">اسم السيارة</label>
                                <input required name="name" type="text" class="form-control" id="name" placeholder="مثال هيلوكس...">
                            </div>
                            <div class="mb-2 col-lg-4 col-md-12">
                                <label for="category" class="form-label">نوع السيارة</label>
                                <select required name="category_id" class="form-select" id="category">
                                    <option selected disabled>أختر احدى الانوع</option>

                                        <option value="2">بي أم دبليو</option>
                                        <option value="3">فيراري</option>
                                </select>
                            </div>
                            <div class="mb-2 col-lg-4 col-md-12">
                                <label for="color" class="form-label">لون السيارة</label>
                                <select required name="color" class="form-select" id="color">
                                    <option selected disabled>أختر لون السيارة </option>
                                    <option value="أزرق">أزرق</option>
                                    <option value="أحمر">أحمر</option>
                                    <option value="أخضر">أخضر</option>
                                    <option value="رمادي">رمادي</option>
                                    <option value="أسود">أسود</option>
                                    <option value="أبيض">أبيض</option>
                                    <option value="بنفجسي">بنفجسي</option>
                                </select>
                            </div>
                            <div class="mb-2 col-lg-3 col-md-12">
                                <label for="state" class="form-label">حالة السيارة</label>
                                <select required name="state" class="form-select" id="state">
                                    <option selected disabled>أختر حالة السيارة </option>
                                    <option value="مستخدم">مستخدم</option>
                                    <option value="جديد">جديد</option>
                                </select>
                            </div>
                            <div class="mb-2 col-lg-3 col-md-12">
                                <label for="model" class="form-label">الموديل</label>
                                <input required name="model" type="text" class="form-control" id="model" placeholder="مثال 2014...">
                            </div>
                            <div class="mb-2 col-lg-3 col-md-12">
                                <label for="address" class="form-label">مكان السيارة الحالي (المحافظة)</label>
                                <!--                             <input name="address" type="text" class="form-control" id="inputAddress" placeholder="مثال حضرموت-المكلا...">
                                 -->                            <select required id='address' name="state" class="form-select mb-3">
                                    <option selected disabled>أختر محافظة</option>
                                    @isset($states)
                                        @foreach($states as $state)
                                            <option value="{{$state->id}}">{{$state->name}}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                            <div class="mb-2 col-lg-3 col-md-12">
                                <label for="city" class="form-label"> مكان السيارة الحالي (المدينة)</label>
                                <select  required name="address" id='city' class="form-select mb-3">
                                    <option selected disabled>أختر مدينة</option>
                                    @isset($states)
                                        @foreach($states as $state)
                                            @foreach($state->city as $city)
                                                <option style="display: none;" class="citys state-{{$city->state_id}}" value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                            <script>
                                const states = document.getElementById('state');
                                const city = document.getElementById('city');
                                states.addEventListener('change',function(){
                                    city.value='أختر مدينة ';
                                    var citys = document.getElementsByClassName('citys');
                                    for (let index = 0; index < citys.length; index++) {
                                        citys[index].style.display='none';
                                    }
                                    citys = document.getElementsByClassName('state-'+states.value);
                                    for (let index = 0; index < citys.length; index++) {
                                        citys[index].style.display='block';
                                    }
                                })
                            </script>
                            </div>
                        </div>
                    </div>
                    <div class="card-header mb-3"></div>
                    <div class="row">
                        <div class="col-lg-2"><h5 class="my-1">المعلومات الفنية</h5></div>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="mb-1 col-lg-6 col-md-12">
                                    <label for="vehicle_type" class="form-label">نوع المركبة</label>
                                    <!-- <input required name="vehicle_type" type="text" class="form-control" id="inputAddress" placeholder="مثال باص ..."> -->
                                    <select required name="vehicle_type" class="form-select" id="vehicle_type">
                                        <option selected disabled>أختر احدى الانوع</option>
                                        @isset($vehicleTypes)
                                            @foreach($vehicleTypes as $vehicleType)
                                                <option value="{{$vehicleType->id}}">{{$vehicleType->name}}</option>
                                                <!-- <option value="2">بي أم دبليو</option>
                                                    <option value="3">فيراري</option> -->
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="mb-1 col-lg-6 col-md-12">
                                    <label for="fuel" class="form-label">نوع الوقود</label>
                                    <select required name="fuel" class="form-select" id="fuel">
                                        <option selected disabled>أختر نوع الوقود </option>
                                        <option value="بترول">بترول</option>
                                        <option value="ديزيل">ديزيل</option>
                                        <option value="غاز">غاز</option>
                                        <option value="كهرباء">كهرباء</option>
                                    </select>
                                </div>
                                <div class="mb-1 col-lg-6 col-md-12">
                                    <label for="engine_type" class="form-label">نوع المحرك</label>
                                    <input required name="engine_type" type="text" class="form-control" id="engine_type" placeholder="مثال 6 بوستن...">
                                </div>
                                <div class="mb-1 col-lg-6 col-md-12">
                                    <label for="ger_type" class="form-label">نوع القير</label>
                                    <select required name="ger_type" class="form-select" id="ger_type">
                                        <option selected disabled>أختر احدى الانوع</option>
                                        <option value="عادي">عادي</option>
                                        <option value="تماتيك">تماتيك</option>
                                        <option value="عادي واتماتيك">عادي واتماتيك</option>
                                    </select>
                                </div>
                                <div class="mb-1 col-lg-6 col-md-12">
                                    <label for="damage" class="form-label">الاضرار</label>
                                    <input required name="damage" type="text" class="form-control" id="damage" placeholder="مثال صدمة في الباب ...">
                                </div>
                                <div class="mb-1 col-lg-6 col-md-12">
                                    <label for="odometer" class="form-label">المسافة المقطوعة</label>
                                    <input required name="odometer" type="number" class="form-control" id="odometer" placeholder="مثال 5000KM ...">
                                </div>
                            </div>
                        </div>
                </div>
                    <div class="card-header mb-3"></div>
                    <div class="row">
                        <div class="col-lg-2"><h5 class="my-1">صور السيارة</h5></div>
                        <div class="col-lg-10">
                            <div class="row">
                                <!-- preview template -->
                                <div class="col-lg-3 col-md-3">
                                    <div class="card mt-1 mb-0 shadow-none border">
                                        <div class="p-1">
                                            <div class="">
                                                <img data-dz-thumbnail="" src="assets/images/users/avatar-2.jpg" class="avatar-lx rounded bg-light" alt="">
                                                <form><button type="button" class="btn-close" style="position: absolute;
    top: 0;
    left: 0;
    z-index: 2;
    /* padding: 0.9375rem 1.25rem; */"></button></form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="card mt-1 mb-0 shadow-none border">
                                        <div class="p-1">
                                            <div class="">
                                                <img data-dz-thumbnail="" src="assets/images/users/avatar-2.jpg" class="avatar-lx rounded bg-light" alt="">
                                                <form><button type="button" class="btn-close" style="position: absolute;
    top: 0;
    left: 0;
    z-index: 2;
    /* padding: 0.9375rem 1.25rem; */"></button></form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="card mt-1 mb-0 shadow-none border">
                                        <div class="p-1">
                                            <div class="">
                                                <img data-dz-thumbnail="" src="assets/images/users/avatar-2.jpg" class="avatar-lx rounded bg-light" alt="">
                                                <form><button type="button" class="btn-close" style="position: absolute;
    top: 0;
    left: 0;
    z-index: 2;
    /* padding: 0.9375rem 1.25rem; */"></button></form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="card mt-1 mb-0 shadow-none border">
                                        <div class="p-1">
                                            <div class="">
                                                <img data-dz-thumbnail="" src="assets/images/users/avatar-2.jpg" class="avatar-lx rounded bg-light" alt="">
                                                <form><button type="button" class="btn-close" style="position: absolute;
    top: 0;
    left: 0;
    z-index: 2;
    /* padding: 0.9375rem 1.25rem; */"></button></form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="card mt-1 mb-0 shadow-none border">
                                        <div class="p-1">
                                            <div class="">
                                                <img data-dz-thumbnail="" src="assets/images/users/avatar-2.jpg" class="avatar-lx rounded bg-light" alt="">
                                                <form><button type="button" class="btn-close" style="position: absolute;
    top: 0;
    left: 0;
    z-index: 2;
    /* padding: 0.9375rem 1.25rem; */"></button></form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="card mt-1 mb-0 shadow-none border">
                                        <div class="p-1">
                                            <div class="">
                                                <img data-dz-thumbnail="" src="assets/images/users/avatar-2.jpg" class="avatar-lx rounded bg-light" alt="">
                                                <form><button type="button" class="btn-close" style="position: absolute;
    top: 0;
    left: 0;
    z-index: 2;
    /* padding: 0.9375rem 1.25rem; */"></button></form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="card mt-1 mb-0 shadow-none border">
                                        <div class="p-1">
                                            <div class="">
                                                <img data-dz-thumbnail="" src="assets/images/users/avatar-2.jpg" class="avatar-lx rounded bg-light" alt="">
                                                <form><button type="button" class="btn-close" style="position: absolute;
    top: 0;
    left: 0;
    z-index: 2;
    /* padding: 0.9375rem 1.25rem; */"></button></form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="card mt-1 mb-0 shadow-none border">
                                        <div class="p-1">
                                            <div class="">
                                                <img data-dz-thumbnail="" src="assets/images/users/avatar-2.jpg" class="avatar-lx rounded bg-light" alt="">
                                                <form><button type="button" class="btn-close" style="position: absolute;
    top: 0;
    left: 0;
    z-index: 2;
    /* padding: 0.9375rem 1.25rem; */"></button></form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="card mt-1 mb-0 shadow-none border">
                                        <div class="p-1">
                                            <div class="">
                                                <img data-dz-thumbnail="" src="assets/images/users/avatar-2.jpg" class="avatar-lx rounded bg-light" alt="">
                                                <form><button type="button" class="btn-close" style="position: absolute;
    top: 0;
    left: 0;
    z-index: 2;
    /* padding: 0.9375rem 1.25rem; */"></button></form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="card mt-1 mb-0 shadow-none border">
                                        <div class="p-1">
                                            <div class="">
                                                <img data-dz-thumbnail="" src="assets/images/users/avatar-2.jpg" class="avatar-lx rounded bg-light" alt="">
                                                <form><button type="button" class="btn-close" style="position: absolute;
    top: 0;
    left: 0;
    z-index: 2;
    /* padding: 0.9375rem 1.25rem; */"></button></form>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <!-- end file preview template -->
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header mb-3"></div>
                    <div class="row">
                    <div class="col-lg-2"><h5 class="my-1">معلومات اضافية</h5></div>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="project-overview" class="form-label">ملاحظات</label>
                                <textarea class="form-control" id="project-overview" rows="5" placeholder="ملاحظات..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mb-3">إضافة</button>

                        </div>

                    </div>

                </div>



            </div> <!-- end card-body-->
        </div>
    </div>






@endsection

@section('script')


    <!-- plugin js -->
    <script src="assets/js/vendor/dropzone.min.js"></script>
    <!-- init js -->
    <script src="assets/js/ui/component.fileupload.js"></script>

@endsection
