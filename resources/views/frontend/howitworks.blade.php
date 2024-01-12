@extends('frontend.master')
@section('content')

<div>
   <div class="">
      <div class="">
         <div class="container">
            <div class="row my-4">
                <div class="col-md-12">
                    <h6 style="text-align: justify;">
                        Opening a new restaurant does not promise profits. Advertising it will get customers to your hutti. Printing menu brochures of your restaurants and arranging teams to promote your restaurants by door-to-door campaigns takes away a significant chunk of your advertising budget. Food Hutti provides a platform to advertise restaurants where the foodies discover places for their food cravings. Food lovers can find sufficient information about restaurants present in their city enabling them to decide whether the restaurant is worth a try.
                    </h6>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingOne">
                            <button style="color: black;font-size: 20px;" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Listing your Restaurant:
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                             <ul>
                                <li>Listing your restaurant is free on foodhutti.</li>
                                <li>Your account on foodhutti is made.</li>
                                <li>Enter your email and set password.</li>
                                <li>Click  the signup button</li>
                                <li>Signing Up:</li>
                             </ul>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button  style="color: black;font-size: 20px;"  class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Create Page:
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                    <ul>
                                        <li>Click on <img src="{{ asset('images/add_update_restaurant.png') }}" alt="">  and fill in the information.</li>
                                        <li>Upload the menu, restaurant image, buffet & hi tea menus (if applicable)</li>
                                        <li>Do mention your location and phone number so customer can order for home delivery if you provide it.</li>
                                        <li>At last click PUBLISH button to publish your restaurant page on FoodHutti.</li>
                                    </ul>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingThree">
                            <button style="color: black;font-size: 20px;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Advertising your Restaurant:
                            </button>
                          </h2>
                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Listing a restaurant is free on FoodHutti however, in order for your restaurant to get more views its better to promote your restaurant.
                                <ul>
                                    <li>Click on <img src="{{ asset('images/view_advertise.png') }}" alt=""></li>
                                    <li>Then click on Advertise your page button</li>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <img src="{{ asset('images/advt_your_page.png') }}" alt="">
                                        </div>
                                    </div>
                                    <p>
                                        You will be directed to Packages page. Select your preferred package, pay the fee, and Upload the proof of payment on the same page and select submit.

                                    </p>
                                </ul>
                                <img src="{{ asset('images/invoice.png') }}" width="80%;" alt=""> <br>
                                <img src="{{ asset('images/request.png') }}" width="80%;" alt="">
                                <br>
                                <p>Your request will be placed for approval. You can always check the status by clicking <img src="{{ asset('images/packages.png') }}" alt=""></p>
                                <p>
                                    In case you want to choose multiple Packages. Repeat the steps mentioned above separately for the required package. In case you have paid the fee of multiple package altogether you can upload the same receipt for all the package requests.
                                </p>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                              <button style="color: black;font-size: 20px;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Searching Restaurants:
                              </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                <ul>
                                    <li>
                                        FoodHutti is an online platform to explore restaurants in your city. Searching Restaurants on Foodhutti is super easy.
                                    </li>
                                    <li>
                                        <strong>Case 1:</strong> If you want to find details of a particular Restaurant just enter restaurant name, city and area/Location and press search.
                                    </li>
                                    <li>
                                        <img src="{{ asset("images/search1.png") }}" width="70%;" alt="">
                                    </li>
                                    <li>
                                        <strong>Case 2:</strong> If you want to find random restaurants in a particular city, just select city and press Search.
                                    </li>
                                    <li>
                                        <img src="{{ asset("images/search2.png") }}" width="70%;" alt="">
                                    </li>
                                    <li>
                                        <strong>Case 3:</strong> If you want to search restaurants in a particular location of a city simply select city and enter Area where you want to search restaurants.
                                    </li>
                                    <li>
                                        <img src="{{ asset("images/search3.png") }}" width="70%;" alt="">
                                    </li>
                                    <li>You can also search category wise from the category bar such as desi, Chinese etc. </li>
                                </ul>
                              </div>
                            </div>
                          </div>

                      </div>
                </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection
