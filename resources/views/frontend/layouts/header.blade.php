<nav class="navbar navbar-expand-lg navbar-light bg-light px-0 ">
    <a class="navbar-brand" href="{{route('getHome')}}">Truyện Hay </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('getHome')}}">Trang chủ <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Giới thiệu</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Danh mục
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach ($cates as $cate)
                    <a class="dropdown-item" href="{{route('cate',['c_slug'=>$cate->c_slug,'c_id'=>$cate->c_id])}}">{{Str::title($cate->c_name)}}</a>
                    @endforeach
                    
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0 position-relative" action="{{route('search')}}" method="GET">
            @csrf
            <input class="search" autocomplete="off" type="search" name="key" placeholder="Nhập truyện hoặc tác giả ..." aria-label="">
            <button class="submit" type="submit">Tìm truyện</button>
            <ul class="result" id="result">
                {{-- <li> 
                    <a href="">
                        <img src="public/frontend/img/nu-hon-cua-soi.jpg" alt="">
                        <div class="inf">
                            <div class="name">Nụ hôn của sói</div>
                            <div class="author">Tác giả: hahah</div>
                        </div>
                    </a>
                </li>
                <li> 
                    <a href="">
                        <img src="public/frontend/img/nu-hon-cua-soi.jpg" alt="">
                        <div class="inf">
                            <div class="name">Nụ hôn của sói</div>
                            <div class="author">Tác giả: hahah</div>
                        </div>
                    </a>
                </li> --}}
               
            </ul>
        </form>
       
    </div>
</nav>