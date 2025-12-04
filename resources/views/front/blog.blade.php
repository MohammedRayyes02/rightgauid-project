@extends('front.layouts.master')
@section('title','المقالات')
@section('content')

    <div class="body-content blogs-page">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">
                            <span class="px-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20.02" height="19.998"
                                    viewBox="0 0 20.02 19.998">
                                    <g id="vuesax_bulk_home-2" data-name="vuesax/bulk/home-2"
                                        transform="translate(-621.99 -190.002)">
                                        <g id="home-2">
                                            <path id="Vector"
                                                d="M18.05,4.818,12.29.788A4.853,4.853,0,0,0,6.8.918L1.79,4.828A5.153,5.153,0,0,0,0,8.468v6.9A4.631,4.631,0,0,0,4.62,20H15.4a4.622,4.622,0,0,0,4.62-4.62V8.6A5.1,5.1,0,0,0,18.05,4.818Z"
                                                transform="translate(621.99 190.002)" fill="#e2e2e2" />
                                            <path id="Vector-2" data-name="Vector"
                                                d="M.75,4.5A.755.755,0,0,1,0,3.75v-3A.755.755,0,0,1,.75,0,.755.755,0,0,1,1.5.75v3A.755.755,0,0,1,.75,4.5Z"
                                                transform="translate(631.25 202.25)" fill="#05060f" />
                                        </g>
                                    </g>
                                </svg>
                            </span>
                            <span>الرئيسية</span>
                        </a>
                    </li>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="6.811" height="12.121"
                            viewBox="0 0 6.811 12.121">
                            <path id="Arrow_-_Right" data-name="Arrow - Right" d="M10,0,5,5,0,0"
                                transform="translate(5.75 1.061) rotate(90)" fill="none" stroke="#727a83"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
                        </svg>
    
                    </span>
                    <li class="breadcrumb-item active" aria-current="page">المدونة</li>
                </ol>
            </nav>
            <div class="main-title mt-5">
                <h2>أحدث المقالات الطبية</h2>
            </div>
        </div>
       
            <div class="container">
                <div class="categories-filter mt-4">
                    <a href="#" class="active">كل التصنيفات</a>
                    <a href="#" >صحة وطب</a>
                    <a href="#" >سياحة علاجية</a>
                    <a href="#" >نصائح طبية</a>
                    <a href="#" >الأدوية الطبية</a>
                </div>
            </div>
            
        <!-- blog-section -->
            <section class="blog-section">
            <div class="container">
                <div class="main-title d-flex flex-wrap justify-content-between align-items-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2>طب العيون</h2>
                    <a href="#" class="btn cs-btn">عرض كل المقالات</a>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <a href="#">
                                <div class="article-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" >
                                    <figure>
                                        <img src="{{ asset('front/assets/images/article1.png') }}" alt="" srcset="">
                                    </figure>
                                    <div class="article-card-body">
                                        <h6>‏12 أغسطس، 2022 - طب العيون</h6>
                                        <h4> أسباب جفاف العين وأهم أعراضه وطرق
                                            العلاج بالأدوية والجراحة</h4>
                                            <p> يعتبر من أسباب جفاف العين الذي انتشر في الآونة الأخيرة
                                                بشكل كبير خصوصا في ظل الثورة التكنولوجية الكبيرة
                                            .وانتشار الأجهزة الإلكترونية من أجهزة الهواتف المحمولة</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <a href="#">
                                <div class="article-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" >
                                    <figure>
                                        <img src="{{ asset('front/assets/images/article-2.png') }}" alt="" srcset="">
                                    </figure>
                                    <div class="article-card-body">
                                        <h6>‏12 أغسطس، 2022 - طب العيون</h6>
                                        <h4>الجلطة القلبية: وأعراض جلطة القلب وأسبابها وماذا بعد الإصابة بالجلطة </h4>
                                            <p> الجلطة القلبية هي نقص شديد ومفاجئ في التروية
                                                الدموية لعضلة القلب، تكون بسبب انسداد مفاجئ في
                                            .الشرايين التاجية المصابة وتكون أعراضها مثل الذبحة</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <a href="#">
                                <div class="article-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s" >
                                    <figure>
                                        <img src="{{ asset('front/assets/images/article-3.png') }}" alt="" srcset="">
                                    </figure>
                                    <div class="article-card-body">
                                        <h6>‏12 أغسطس، 2022 - طب العيون</h6>
                                        <h4>مرض الربو (الأزمة) عند الأطفال: ماهيته، أهم أعراضه، التشخيص والعلاج</h4>
                                            <p> ينتج مرض الربو عن حساسية زائدة للمجاري الهوائية لبعض
                                                المحفزات، تظهر على شكل نوبات من صعوبة التنفس عند 
                                            .التعرض لهذه المحفزات نتيجة التضيق فيها وزيادة الإفرازات</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            </section>
        <!-- ./blog-section -->

          <!-- blog-section -->
          <section class="blog-section">
            <div class="container">
                <div class="main-title d-flex flex-wrap justify-content-between align-items-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2>أمراض القلب</h2>
                    <a href="#" class="btn cs-btn">عرض كل المقالات</a>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <a href="#">
                                <div class="article-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" >
                                    <figure>
                                        <img src="{{ asset('front/assets/images/article1.png') }}" alt="" srcset="">
                                    </figure>
                                    <div class="article-card-body">
                                        <h6>‏12 أغسطس، 2022 - طب العيون</h6>
                                        <h4> أسباب جفاف العين وأهم أعراضه وطرق
                                            العلاج بالأدوية والجراحة</h4>
                                            <p> يعتبر من أسباب جفاف العين الذي انتشر في الآونة الأخيرة
                                                بشكل كبير خصوصا في ظل الثورة التكنولوجية الكبيرة
                                            .وانتشار الأجهزة الإلكترونية من أجهزة الهواتف المحمولة</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <a href="#">
                                <div class="article-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" >
                                    <figure>
                                        <img src="{{ asset('front/assets/images/article-2.png') }}" alt="" srcset="">
                                    </figure>
                                    <div class="article-card-body">
                                        <h6>‏12 أغسطس، 2022 - طب العيون</h6>
                                        <h4>الجلطة القلبية: وأعراض جلطة القلب وأسبابها وماذا بعد الإصابة بالجلطة </h4>
                                            <p> الجلطة القلبية هي نقص شديد ومفاجئ في التروية
                                                الدموية لعضلة القلب، تكون بسبب انسداد مفاجئ في
                                            .الشرايين التاجية المصابة وتكون أعراضها مثل الذبحة</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <a href="#">
                                <div class="article-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s" >
                                    <figure>
                                        <img src="{{ asset('front/assets/images/article-3.png') }}" alt="" srcset="">
                                    </figure>
                                    <div class="article-card-body">
                                        <h6>‏12 أغسطس، 2022 - طب العيون</h6>
                                        <h4>مرض الربو (الأزمة) عند الأطفال: ماهيته، أهم أعراضه، التشخيص والعلاج</h4>
                                            <p> ينتج مرض الربو عن حساسية زائدة للمجاري الهوائية لبعض
                                                المحفزات، تظهر على شكل نوبات من صعوبة التنفس عند 
                                            .التعرض لهذه المحفزات نتيجة التضيق فيها وزيادة الإفرازات</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            </section>
        <!-- ./blog-section -->
                
        <!-- consultation-section -->
        <section class="consulation-section callaction-section">
            <div class="container">
                <div class="content">
                    <div class="row align-items-center">
                        <div class="col-lg-2">
                            <figure>
                                <img src="{{ asset('front/assets/images/consultation.png') }}" class="wow zoomIn" data-wow-duration="1s" data-wow-delay="0.1s" alt="" srcset="">
                            </figure>
                        </div>
                        <div class="col-lg-7">
                            <h4 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">طلب استشارة</h4>
                            <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                                استشارات طبية مجانية من أطباء مختصين، هل تريد سؤال طبيب؟ احصل على مشورة
                                .طبية ورأي ثان مجاناً، اسأل طبيب وسيتم الرد في نفس اليوم، اطئمن على صحتك
                            </p>
                        </div>
                        <div class="col-lg-3 mx-auto">
                            <a href="#" class="btn cs-btn wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">طلب استشارة</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ./consultation-section -->
          <!-- blog-section -->
          <section class="blog-section">
            <div class="container">
                <div class="main-title d-flex flex-wrap justify-content-between align-items-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2>أمراض العظام</h2>
                    <a href="#" class="btn cs-btn">عرض كل المقالات</a>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <a href="#">
                                <div class="article-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" >
                                    <figure>
                                        <img src="{{ asset('front/assets/images/article1.png') }}" alt="" srcset="">
                                    </figure>
                                    <div class="article-card-body">
                                        <h6>‏12 أغسطس، 2022 - طب العيون</h6>
                                        <h4> أسباب جفاف العين وأهم أعراضه وطرق
                                            العلاج بالأدوية والجراحة</h4>
                                            <p> يعتبر من أسباب جفاف العين الذي انتشر في الآونة الأخيرة
                                                بشكل كبير خصوصا في ظل الثورة التكنولوجية الكبيرة
                                            .وانتشار الأجهزة الإلكترونية من أجهزة الهواتف المحمولة</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <a href="#">
                                <div class="article-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" >
                                    <figure>
                                        <img src="{{ asset('front/assets/images/article-2.png') }}" alt="" srcset="">
                                    </figure>
                                    <div class="article-card-body">
                                        <h6>‏12 أغسطس، 2022 - طب العيون</h6>
                                        <h4>الجلطة القلبية: وأعراض جلطة القلب وأسبابها وماذا بعد الإصابة بالجلطة </h4>
                                            <p> الجلطة القلبية هي نقص شديد ومفاجئ في التروية
                                                الدموية لعضلة القلب، تكون بسبب انسداد مفاجئ في
                                            .الشرايين التاجية المصابة وتكون أعراضها مثل الذبحة</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <a href="#">
                                <div class="article-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s" >
                                    <figure>
                                        <img src="{{ asset('front/assets/images/article-3.png') }}" alt="" srcset="">
                                    </figure>
                                    <div class="article-card-body">
                                        <h6>‏12 أغسطس، 2022 - طب العيون</h6>
                                        <h4>مرض الربو (الأزمة) عند الأطفال: ماهيته، أهم أعراضه، التشخيص والعلاج</h4>
                                            <p> ينتج مرض الربو عن حساسية زائدة للمجاري الهوائية لبعض
                                                المحفزات، تظهر على شكل نوبات من صعوبة التنفس عند 
                                            .التعرض لهذه المحفزات نتيجة التضيق فيها وزيادة الإفرازات</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            </section>
        <!-- ./blog-section -->

              <!-- service-request-section -->
              <section class="callaction-section service-request-section">
                <div class="container">
                    <div class="content">
                        <div class="row align-items-center">
                            <div class="col-lg-2">
                                <figure>
                                    <img src="{{ asset('front/assets/images/medical-health-services.png') }}" class="wow zoomIn" data-wow-duration="1s" data-wow-delay="0.1s" alt="" srcset="">
                                </figure>
                            </div>
                            <div class="col-lg-7">
                                <h4 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">طلب خدمة</h4>
                                <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                                    تحتاج للمساعدة، ونحن هنا لمساعدتك فريق عملنا متواجد دائما على مدار الساعة
                                    .طوال أيام الأسبوع لخدمتك والإجابة على جميع أسئلتك واستفساراتك
                                </p>
                            </div>
                            <div class="col-lg-3 mx-auto">
                                <a href="#" class="btn cs-btn wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">ارسل طلب الأن</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ./service-request-section -->
    
        
        
    </div>

    @endsection