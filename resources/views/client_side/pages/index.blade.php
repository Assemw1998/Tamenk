@extends('client_side.layouts.index')
@section('content')
<body>
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
      <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          @foreach ($backgroundImages as $backgroundImage){
            @if ($loop->first)
              <div class="carousel-item active">
                <img class="w-100" src="{{ asset($backgroundImage->image_url) }}" alt="Image" />
                <div class="carousel-caption">
                  <div class="container">
                    <div class="row">
                      <div class="col-12 col-lg-6">
                        <h1 class="display-3 text-dark mb-4 animated slideInDown">
                          {{$backgroundImage->background_image_title}}
                        </h1>
                        <p class="fs-5 text-body mb-5">
                          {{$backgroundImage->background_image_description}}
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @else
              <div class="carousel-item">
                <img class="w-100" src="{{ asset($backgroundImage->image_url) }}" alt="Image" />
                <div class="carousel-caption">
                  <div class="container">
                    <div class="row">
                      <div class="col-12 col-lg-6">
                        <h1 class="display-3 text-dark mb-4 animated slideInDown">
                          {{$backgroundImage->background_image_title}}
                        </h1>
                        <p class="fs-5 text-body mb-5">
                          {{$backgroundImage->background_image_description}}
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endif
          }
          @endforeach
          
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#header-carousel"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#header-carousel"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <!-- Carousel End -->

    

   

     <!-- Features Start -->
     <div class="container-xxl py-5 ">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="display-6 mb-5">Few Reasons Why People Choosing Us!</h1>
            <p class="mb-4">
              Choose Tamenk for your car insurance needs and experience the difference. We prioritize your satisfaction and strive to be your trusted partner in protecting what matters most to you – your car and your peace of mind.
            </p>
            <div class="row g-3">
              <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="bg-light rounded h-100 p-3">
                  <div
                    class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3"
                  >
                    <img
                      class="align-self-center mb-3"
                      src="{{ asset("images/resource/icon/icon-06-primary.png") }}"
                      alt=""
                    />
                    <h5 class="mb-0">Easy Process</h5>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                <div class="bg-light rounded h-100 p-3">
                  <div
                    class="bg-white d-flex flex-column justify-content-center text-center rounded py-4 px-3"
                  >
                    <img
                      class="align-self-center mb-3"
                      src="{{ asset("images/resource/icon/icon-03-primary.png") }}"
                      alt=""
                    />
                    <h5 class="mb-0">Fast Delivery</h5>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="bg-light rounded h-100 p-3">
                  <div
                    class="bg-white d-flex flex-column justify-content-center text-center rounded py-4 px-3"
                  >
                    <img
                      class="align-self-center mb-3"
                      src="{{ asset("images/resource/icon/icon-04-primary.png") }}"
                      alt=""
                    />
                    <h5 class="mb-0">Policy Controlling</h5>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                <div class="bg-light rounded h-100 p-3">
                  <div
                    class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3"
                  >
                    <img
                      class="align-self-center mb-3"
                      src="{{ asset("images/resource/icon/icon-07-primary.png") }}"
                      alt=""
                    />
                    <h5 class="mb-0">Money Saving</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
            <div
              class="position-relative rounded overflow-hidden h-100"
              style="min-height: 400px"
            >
              <img
                class="position-absolute w-100 h-100"
                src="{{ asset("images/resource/client_side_images/feature.jpg") }}"
                alt=""
                style="object-fit: cover"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Features End -->

   

     <!-- Appointment Start -->
     <div
     class="container-fluid appointment my-5 py-5 wow fadeIn"
     data-wow-delay="0.1s"
   >
     <div class="container py-5">
       <div class="row g-5">
         <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
           <h1 class="display-6 mb-5 text-white">
             Car Insurance Quote Request
           </h1>
           <p class=" mb-5 text-white">
             Our Car Insurance Quote Request Form is designed to provide you with a seamless experience in obtaining personalized car insurance quotes. Simply fill out the required details about your vehicle and driving history, and our team of experts will analyze the information to present you with the best insurance options tailored to your needs. Safeguard your car with the right coverage today.
           </p>
          
         </div>
         <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
           <div class="bg-white rounded p-5">
             <form>
               <div class="row g-3">
                 <div class="col-sm-6">
                   <div class="form-floating">
                     <input
                       type="text"
                       class="form-control"
                       id="gname"
                       placeholder="Gurdian Name"
                     />
                     <label for="gname">Your Name</label>
                   </div>
                 </div>
                 <div class="col-sm-6">
                   <div class="form-floating">
                     <input
                       type="email"
                       class="form-control"
                       id="gmail"
                       placeholder="Gurdian Email"
                     />
                     <label for="gmail">Your Email</label>
                   </div>
                 </div>
                 <div class="col-sm-6">
                   <div class="form-floating">
                     <input
                       type="text"
                       class="form-control"
                       id="cname"
                       placeholder="Child Name"
                     />
                     <label for="cname">Your Mobile</label>
                   </div>
                 </div>
                 <div class="col-sm-6">
                   <div class="form-floating">
                     <input
                       type="text"
                       class="form-control"
                       id="cage"
                       placeholder="Child Age"
                     />
                     <label for="cage">Service Type</label>
                   </div>
                 </div>
                 <div class="col-12">
                   <div class="form-floating">
                     <textarea
                       class="form-control"
                       placeholder="Leave a message here"
                       id="message"
                       style="height: 80px"
                     ></textarea>
                     <label for="message">Message</label>
                   </div>
                 </div>
                 <div class="col-12">
                   <button class="btn btn-primary py-3 px-5" type="submit">
                     Get Appointment
                   </button>
                 </div>
               </div>
             </form>
           </div>
         </div>
       </div>
     </div>
   </div>
   <!-- Appointment End -->
   
  </body>
  @endsection 