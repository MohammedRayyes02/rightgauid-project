@extends('front.layouts.master')
@section('title','تفاصيل المقال')
@section('content')

    <div class="body-content blog-details-page">
        <!--  breadcrumb -->
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
                    <li>
                        <a href="blog.html">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="6.811" height="12.121"
                                    viewBox="0 0 6.811 12.121">
                                    <path id="Arrow_-_Right" data-name="Arrow - Right" d="M10,0,5,5,0,0"
                                        transform="translate(5.75 1.061) rotate(90)" fill="none" stroke="#727a83"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
                                </svg>
            
                            </span>
                            <li class="breadcrumb-item active" aria-current="page">المدونة</li>
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
                    <li class="breadcrumb-item active" aria-current="page">تفاصيل المقال</li>
                </ol>
            </nav>
        </div>
        <!--  ./breadcrumb -->
        <div class="container mt-lg-50 mt-4">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8">
                        <h6>12 أغسطس، 2022 - طب العيون</h6>
                        <h1> أسباب جفاف العين وأهم أعراضه وطرق
                            العلاج بالأدوية والجراحة</h1>
                            <figure>
                                <img src="{{ asset('front/assets/images/blog-details-img.png') }}" class="img-fluid" alt="">
                            </figure>
                            <div class="description">
                                <p>
                                    يعتبر جفاف العين من أشهر أمراض العيون، وإذا لم يتم علاجها تصبح شكوى مزمنة خاصة لدى كبار السن، لذلك من
                                    المهم معرفة أهم الأعراض وطرق علاجها، من الجدير ذكره أن عند كل رجفة عين يتكون طبقة من الدمع على سطح 
                                    .العين، حيث تحافظ الدموع على سطح العين نظيفا، وملساً كما تساعد على وقاية العين من الالتهاب
                                </p>
                                <h4>
                                    أعراض جفاف العين
                                </h4>
                                <p>
                                    :يعتبر جفاف العين عرض مرضي، وليس مرض، ولكن غالباً ما يكون مصاحباً لعرض أو أكثر مما يلي
                                </p>
                                <ul>
                                    <li>
                                        .الوخز، الحكة أو حرقة بالعين (خاصة عند زوايا العين)
                                    </li>
                                    <li>
                                        احمرار
                                    </li>
                                    <li>
                                        .تشويش أو عدم وضوح الرؤية
                                    </li>
                                    <li>
                                        .إرهاق العين بعد القراءة، حتى لو لمدة قصيرة
                                    </li>
                                    <li>
                                        .مخاط حول الجفون، خاصة عند الاستيقاظ
                                    </li>
                                    <li>
                                        ).الإحساس بشيء غريب في العين (مثل رمش أو حبة رمل
                                    </li>
                                </ul>
                                <h4>أسباب جفاف العين</h4>
                                <p>
                                    يحدث جفاف العين عادة عند اختلال التوازن بين إنتاج وصرف الدموع، فيمكن أن يحدث عندما لا يتم إنتاج كمية دموع
                                    :كافية، أو تكون الدموع ذات تبخر سريع. ومن أهم أسباب جفاف العين
                                </p>
                                <ul>
                                    <li> العمر: قد يحدث جفاف العين في أي عمر، ولكن تزداد فرص حدوثه مع كبار السن، خاصة فوق 50 عام، بسبب نقص
                                        .إنتاج الدموع</li>
                                        <li>
                                            .وهناك أدوية قد تقلل من إنتاج المخاط، فيقل إنتاج الدموع(mucus). الأدوية: تتكون الدموع من ماء، زيت، ومخاط
                                        </li>
                                        <li>
                                            .الحاسوب: يميل الأشخاص الذين يعملون على شاشة الكمبيوتر إلى عدم الومض بسبب التركيز، فتتبخر الدموع بسرعة
                                        </li>
                                        <li>
                                            جراحة الليزر لتصحيح النظر: وذلك بسبب قطع في بعض أعصاب القرنية في هذه العملية، فيقل إنتاج الدموع. ولكن
                                            .هذه الشكوى مؤقتة لمدة أيام أو أسابيع
                                        </li>
                                        <li>
                                            الجنس: يمكن أن تلعب الهرمونات دورًا في جفاف العين. تعاني بعض النساء من أعراض جفاف العين أثناء الحمل أو
                                            .انقطاع الطمث أو أثناء استخدام حبوب منع الحمل؛ تحفز الهرمونات إنتاج الدموع، لذلك يؤدي عدم التوازن
                                        </li>
                                        <li>
                                            التعرض للمهيجات والرياح: تعمل الرياح والهواء الساخن على سرعة تبخر الدموع، فيحدث جفاف العين. والتعرض
                                            .للمهيجات التي تسبب الحساسية، كالدخان، أو استخدام العدسات اللاصقة لفترات طويلة
                                        </li>
                                </ul>
                                <h4>
                                    علاج جفاف العين
                                </h4>
                                <p>
                                    :بشكل عام علاج جفاف العين يعتمد على المسبب، حيث يمكن تجنبها من خلال تجنب
                                </p>
                                <ul>
                                    <li>
                                        .التدخين أو التعرض للدخان
                                    </li>
                                    <li>
                                        .الأماكن الجافة، مثل الصحراء والطائرات
                                    </li>
                                    <li>
                                        .مجفف الشعر، أو المروحة الموجهة للوجه مباشرة
                                    </li>
                                </ul>
                                <h4>
                                    متى ترى الطبيب
                                </h4>
                                <p>
                                    إذا كانت عيناك جافة، حمراء، أو مؤلمة على مدى فترة طويلة من الزمن، تحدث إلى طبيبك. يجب عليك أيضًا تحديد موعد إذا لم تساعدك العلاجات في المنزل، يمكن أن يعمل طبيبك معك لاكتشاف سبب جفاف عينيك واقتراح أفضل علاج. هذا مهم لأن جفاف العين قد يؤدي إلى مضاعفات، بما في ذلك العدوى، الالتهاب، أو تلف العين.
                                </p>
                                <div class="tags">
                                    <div class="tag">طب الأعصاب</div>
                                    <div class="tag">مستشفى الأناضول</div>
                                    <div class="tag">أمراض الكلى</div>
                                    <div class="tag">جراحة الأعصاب</div>
                                    <div class="tag">استيتك  انترناشونال</div>
                                    <div class="tag">أمراض السكري</div>
                                    <div class="tag">أوغور شاهين</div>
                                    <div class="tag">أمراض الجهاز الهضمي</div>
                                </div>
                                <div class="share-with"> 
                                    <h4>مشاركة المقال</h4>
                                    <div class="f-social">
                                        <a href="http://" class="when-hover" target="_blank" rel="noopener noreferrer">
                                            <svg id="Group_63319" data-name="Group 63319" xmlns="http://www.w3.org/2000/svg" width="32" height="31.997" viewBox="0 0 32 31.997">
                                                <path id="Vector" d="M7.913,29.8A16.012,16.012,0,0,0,16.008,32,16.241,16.241,0,0,0,31.974,15.055,16,16,0,1,0,2.138,24l-1.424,5.3a1.594,1.594,0,0,0,1.968,1.952Z" transform="translate(0 0)" fill="#dcdfe3"/>
                                                <g id="Group" transform="translate(7.99 7.95)">
                                                  <path id="Vector-2" data-name="Vector" d="M16.034,13.131a1.974,1.974,0,0,1-.208.882,3.825,3.825,0,0,1-.545.818,3.654,3.654,0,0,1-1.315.946,3.924,3.924,0,0,1-1.571.3,6.53,6.53,0,0,1-2.613-.593A14.685,14.685,0,0,1,7.023,13.9a23.168,23.168,0,0,1-2.63-2.245,22.929,22.929,0,0,1-2.245-2.63A14.106,14.106,0,0,1,.577,6.285,6.789,6.789,0,0,1,0,3.656,4.189,4.189,0,0,1,.289,2.1,3.58,3.58,0,0,1,1.219.754,2.317,2.317,0,0,1,2.886,0a1.569,1.569,0,0,1,.657.144,1.328,1.328,0,0,1,.545.449L5.932,3.239a2.588,2.588,0,0,1,.321.561,1.17,1.17,0,0,1,.112.5,1.15,1.15,0,0,1-.176.577,2.821,2.821,0,0,1-.449.577l-.609.641A.412.412,0,0,0,5,6.413a.8.8,0,0,0,.032.192,1.1,1.1,0,0,1,.064.16,6.429,6.429,0,0,0,.754,1.026c.369.417.754.85,1.17,1.267.433.433.85.818,1.283,1.186a6.156,6.156,0,0,0,1.042.738c.048.016.1.048.144.064a.526.526,0,0,0,.545-.112l.609-.609a2.576,2.576,0,0,1,.577-.449A1.1,1.1,0,0,1,11.8,9.7a1.17,1.17,0,0,1,.5.112,2.919,2.919,0,0,1,.561.321l2.662,1.892a1.354,1.354,0,0,1,.449.513A5.608,5.608,0,0,1,16.034,13.131Z" fill="#253751"/>
                                                </g>
                                              </svg>
                                              
                                        </a>
                                        <a href="http://" class="when-hover" target="_blank" rel="noopener noreferrer">
                                            <svg id="Group_63318" data-name="Group 63318" xmlns="http://www.w3.org/2000/svg" width="32" height="32.402" viewBox="0 0 32 32.402">
                                                <path id="Path_41468" data-name="Path 41468" d="M16,0A16,16,0,1,1,0,16,16,16,0,0,1,16,0Z" fill="#dcdfe3"/>
                                                <path id="Path_77" data-name="Path 77" d="M13.674,31.3a.78.78,0,0,0,.81-.791V18.347h3.242a1.621,1.621,0,1,0,0-3.242H14.484V11.863a1.621,1.621,0,0,1,1.621-1.621h1.621a1.621,1.621,0,1,0,0-3.242H16.105a4.863,4.863,0,0,0-4.863,4.863v3.242H9.621a1.621,1.621,0,1,0,0,3.242h1.621V30.329a.783.783,0,0,0,.652.781A16.274,16.274,0,0,0,13.674,31.3Z" transform="translate(1.754 1.105)" fill="#253751"/>
                                              </svg>                                          
                                        </a>
                    
                                        <a href="http://" class="when-hover" target="_blank" rel="noopener noreferrer">
                                            <svg id="Group_63317" data-name="Group 63317" xmlns="http://www.w3.org/2000/svg" width="32" height="28.193" viewBox="0 0 32 28.193">
                                                <path id="Path_109" data-name="Path 109" d="M31.74,10.048c.783,11.747-7.831,21.145-18.8,21.145A24.965,24.965,0,0,1,2.425,29.267a.674.674,0,0,1,.338-1.28c3.65-.242,6.67-1.113,8.616-3.059,4.7-4.7,5.482-6.265,6.68-12.493A7.05,7.05,0,0,1,30.449,5.981l2.69-.384a.783.783,0,0,1,.762,1.21Z" transform="translate(-2.034 -3)" fill="#dcdfe3"/>
                                                <path id="Path_110" data-name="Path 110" d="M11.234,23.964C2.753,21.137,1.29,10.653,2.813,5.185a.727.727,0,0,1,1.35-.07c2.6,4.449,7.549,6.933,13.749,6.36C27.676,11.475,25.327,28.662,11.234,23.964Z" transform="translate(-1.893 -2.043)" fill="#253751"/>
                                              </svg>                                          
                                        </a>
                    
                                        <a href="http://" class="when-hover" target="_blank" rel="noopener noreferrer">
                                            <svg id="Group_63316" data-name="Group 63316" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                                <circle id="Ellipse_11616" data-name="Ellipse 11616" cx="5.344" cy="5.344" r="5.344" transform="translate(10.656 10.123)" fill="#c3ebc7"/>
                                                <path id="Path_84" data-name="Path 84" d="M10,2a8,8,0,0,0-8,8V26a8,8,0,0,0,8,8H26a8,8,0,0,0,8-8V10a8,8,0,0,0-8-8Zm8,20.8A4.8,4.8,0,1,0,13.2,18,4.8,4.8,0,0,0,18,22.8Z" transform="translate(-2 -2)" fill="#dcdfe3" fill-rule="evenodd"/>
                                                <path id="Path_85" data-name="Path 85" d="M18.6,8.206A1.6,1.6,0,1,0,17,6.6,1.6,1.6,0,0,0,18.6,8.206Z" transform="translate(6.984 -0.191)" fill="#253751"/>
                                                <path id="Path_86" data-name="Path 86" d="M23.031,15.015A8.015,8.015,0,1,1,15.015,7,8.015,8.015,0,0,1,23.031,15.015Zm-3.206,0a4.809,4.809,0,1,1-4.809-4.809A4.809,4.809,0,0,1,19.825,15.015Z" transform="translate(0.984 0.984)" fill="#253751" fill-rule="evenodd"/>
                                              </svg>
                                              
                                        </a>
                                        <a href="http://" class="when-hover" target="_blank" rel="noopener noreferrer">
                                            <svg id="Group_63315" data-name="Group 63315" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                                <path id="Path_87" data-name="Path 87" d="M2,6.8A4.8,4.8,0,0,1,6.8,2H29.2A4.8,4.8,0,0,1,34,6.8V29.2A4.8,4.8,0,0,1,29.2,34H6.8A4.8,4.8,0,0,1,2,29.2Z" transform="translate(-2 -2)" fill="#dcdfe3"/>
                                                <g id="Group_52916" data-name="Group 52916" transform="translate(6.338 6.337)">
                                                  <path id="Path_88" data-name="Path 88" d="M7.614,9.228A1.614,1.614,0,1,0,6,7.614,1.614,1.614,0,0,0,7.614,9.228Z" transform="translate(-6 -6)" fill="#253751"/>
                                                  <path id="Path_89" data-name="Path 89" d="M7.614,10A1.614,1.614,0,0,0,6,11.614V21.3a1.614,1.614,0,1,0,3.228,0V11.614A1.614,1.614,0,0,0,7.614,10Z" transform="translate(-6 -3.578)" fill="#253751"/>
                                                  <path id="Path_90" data-name="Path 90" d="M16.456,13.228a3.228,3.228,0,0,0-3.228,3.228V21.3A1.614,1.614,0,1,1,10,21.3V11.614a1.614,1.614,0,0,1,3.085-.665,6.457,6.457,0,0,1,9.827,5.507V21.3a1.614,1.614,0,0,1-3.228,0V16.456A3.228,3.228,0,0,0,16.456,13.228Z" transform="translate(-3.58 -3.578)" fill="#253751"/>
                                                </g>
                                              </svg>
                                              
                                        </a>
                                    </div>
                                </div>
                               
                            </div>

                    </div>
                    <div class="col-lg-4 mt-lg-0 mt-4">
                        <div class="search-input">
                            <h4 class="subtitle">ابحث عن مقال</h4>
                            <div class="icon-input">
                                <span class="icon-i">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20.003" height="20" viewBox="0 0 20.003 20">
                                        <g id="search-normal" transform="translate(-430 -190)">
                                          <path id="Vector" d="M19,9.5A9.5,9.5,0,1,1,9.5,0,9.5,9.5,0,0,1,19,9.5Z" transform="translate(430 190)" fill="#d3d3d8"/>
                                          <path id="Vector-2" data-name="Vector" d="M2.552,3.252a.7.7,0,0,1-.49-.2L.2,1.192A.706.706,0,0,1,.2.2a.706.706,0,0,1,.99,0l1.86,1.86a.706.706,0,0,1,0,.99A.738.738,0,0,1,2.552,3.252Z" transform="translate(446.747 206.747)" fill="#868692"/>
                                        </g>
                                      </svg>                                                                                             
                                </span>                                                                                              
                                <input type="text" name="name" class="form-control cs-input" id="recipient-name" placeholder="ابحث عن مقال">
                            </div>
                        </div>
                        <div class="categories mt-lg-50 mt-4">
                            <h4 class="subtitle mb-3">التصنيفات</h4>
                            <a href="#">صحة وطب</a>
                            <a href="#">سياحة علاجية</a>
                            <a href="#">نصائح طبية</a>
                            <a href="#">الأدوية الطبية</a>
                        </div>
                        <div class="mt-5">
                            <h4 class="subtitle mb-3">أحدث المقالات</h4>
                            <a href="#">

                                <div class="recently-article-card d-flex align-items-center">
                                    <figure class="mb-0">
                                      <img src="{{ asset('front/assets/images/article-2.png') }}" class="img-fluid" alt="...">
                                    </figure>
                                    <div class="flex-grow-1 ms-3">
                                        <h4>‏20 يوليو، 2022 - أمراض القلب</h4>
                                        <h2>الجلطة القلبية: وأعراض جلطة القلب وأسبابها وماذا بعد الإصابة </h2>
                                    </div>
                                  </div>
                            </a>
                            <a href="#">

                                <div class="recently-article-card d-flex align-items-center">
                                    <figure class="mb-0">
                                      <img src="{{ asset('front/assets/images/article-3.png') }}" class="img-fluid" alt="...">
                                    </figure>
                                    <div class="flex-grow-1 ms-3">
                                        <h4>‏20 يوليو، 2022 - أمراض القلب</h4>
                                        <h2>الجلطة القلبية: وأعراض جلطة القلب وأسبابها وماذا بعد الإصابة </h2>
                                    </div>
                                  </div>
                            </a>
                            <a href="#">

                                <div class="recently-article-card d-flex align-items-center">
                                    <figure class="mb-0">
                                      <img src="{{ asset('front/assets/images/article-2.png') }}" class="img-fluid" alt="...">
                                    </figure>
                                    <div class="flex-grow-1 ms-3">
                                        <h4>‏20 يوليو، 2022 - أمراض القلب</h4>
                                        <h2>الجلطة القلبية: وأعراض جلطة القلب وأسبابها وماذا بعد الإصابة </h2>
                                    </div>
                                  </div>
                            </a>
                            <a href="#">

                                <div class="recently-article-card d-flex align-items-center">
                                    <figure class="mb-0">
                                      <img src="{{ asset('front/assets/images/article1.png') }}" class="img-fluid" alt="...">
                                    </figure>
                                    <div class="flex-grow-1 ms-3">
                                        <h4>‏20 يوليو، 2022 - أمراض القلب</h4>
                                        <h2>الجلطة القلبية: وأعراض جلطة القلب وأسبابها وماذا بعد الإصابة </h2>
                                    </div>
                                  </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

         
        </div>
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
        
     <!-- blog-section -->
      <section class="blog-section">
        <div class="container">
            <div class="main-title d-flex flex-wrap justify-content-between align-items-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                <h2>مقالات ذات صلة</h2>
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
     <section class="blog-section  mt-lg-5 mt-4">
        <div class="container">
            <div class="main-title d-flex flex-wrap justify-content-between align-items-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                <h2>إقرأ أيضا</h2>
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

    </div>
    @endsection