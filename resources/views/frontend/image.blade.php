<!DOCTYPE html>
<html style="font-size: 16px;">

@include('frontend.layout.head')


    @include('frontend.layout.header')


 <!-- Gallery -->
 <div class="container" style="background: #f5f5f5;">
    <div class="col-md-10 offset-md-1">




        <div class="row pb-row">

@foreach ($image as $list)




         <h4>{{ $list->title }}</h4>
            <div class="col-md-3 col-sm-1">

                <?php foreach (json_decode($list->file)as $picture) { ?>
                    <img src="{{ asset('assets/images/blog/' .$picture) }}" style="height:120px; width:200px"/>
                   <?php } ?>
            </div>




            @endforeach
        </div>





    </div>
</div>

<style>
    div.gallery {
      margin: 5px;
      border: 1px solid #ccc;
      float: left;
      width: 180px;
    }

    div.gallery:hover {
      border: 1px solid #777;
    }

    div.gallery img {
      width: 100%;
      height: auto;
    }

    div.desc {
      padding: 15px;
      text-align: center;
    }
    </style>
  <!-- Gallery -->


    @include('frontend.layout.footer')
  </body>
</html>
