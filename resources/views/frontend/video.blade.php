<!DOCTYPE html>
<html style="font-size: 16px;">

@include('frontend.layout.head')


    @include('frontend.layout.header')


    <div class="container pb-video-container" style="background: #f5f5f5;">
        <div class="col-md-10 offset-md-1">
            <h3 class="text-xs-center">Sample Video Gallery</h3>



            <div class="row pb-row">
                @foreach ($video as  $list)
                <div class="col-md-3 pb-video">


                    <iframe class="pb-video-frame" width="100%" height="230" src="{{  $list->link    }}" frameborder="0" allowfullscreen></iframe>
                    <label class="form-control label-warning text-xs-center">{{ $list->title }}</label>
                </div>

                @endforeach

            </div>

            {{-- <div class="row pb-row">
                <div class="col-md-3 pb-video">
                    <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/UY1bt8ilps4?ecver=1" frameborder="0" allowfullscreen></iframe>
                    <label class="form-control label-warning text-xs-center">F.O. and Peeva - Lichnata</label>
                </div>
                <div class="col-md-3 pb-video">
                    <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/QpbQ4I3Eidg?ecver=1" frameborder="0" allowfullscreen></iframe>
                    <label class="form-control label-warning text-xs-center">Machine Gun - Bad Things</label>
                </div>
                <div class="col-md-3 pb-video">
                    <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/h3kRIxLruDs?ecver=" frameborder="0" allowfullscreen></iframe>
                    <label class="form-control label-warning text-xs-center">INNA - Say it with your body</label>
                </div>
                <div class="col-md-3 pb-video">
                    <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/Jr4TMIU9oQ4?ecver=1" frameborder="0" allowfullscreen></iframe>
                    <label class="form-control label-warning text-xs-center">INNA - Gimme Gimme</label>
                </div>
            </div> --}}
        </div>
    </div>

    <style>
        .pb-video-container {
            padding-top: 20px;
            background:;
            font-family: Lato;
        }

        .pb-video {
            border: 1px solid #e6e6e6;
            padding: 5px;
        }

            .pb-video:hover {
                background: #478ac9;
            }

        .pb-video-frame {
            transition: width 2s, height 2s;
        }

            .pb-video-frame:hover {
                height: 300px;
            }

        .pb-row {
            margin-bottom: 10px;
        }
    </style>



    @include('frontend.layout.footer')
  </body>
</html>
