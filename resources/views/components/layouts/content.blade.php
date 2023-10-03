<div class="content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Panel Admin</a></li>
                            @if(!empty($subtitle))
                                <li class="breadcrumb-item"><a href="javascript: void(0);">{{$title}}</a></li>
                                <li class="breadcrumb-item active">{{$subtitle}}</li>
                            @else
                                <li class="breadcrumb-item active">{{$title}}</li>
                            @endif
                        </ol>
                    </div>
                    <h4 class="page-title">{{$name}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        {{$slot}}

    </div>
</div>
