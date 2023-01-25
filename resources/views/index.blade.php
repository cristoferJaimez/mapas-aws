@extends('layout.app')
@section('contenido')
@include('home.load')

    <div class="cont">
        <!--<div class="mouse"></div>-->
        <div class="app">
            <div class="app__bgimg">
                <div class="app__bgimg-image app__bgimg-image--1">
                </div>
                <div class="app__bgimg-image app__bgimg-image--2">
                </div>
            </div>
            <div class="app__img">
                <img onmousedown="return false" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/537051/whiteTest4.png"
                    alt="city" />
            </div>

            <div class="app__text app__text--1">
                <div class="app__text-line app__text-line--4">Geo<i class="fa-solid fa-globe"></i>UTC </div>
                <div class="app__text-line app__text-line--3">  </div>
                <div class="app__text-line app__text-line--2"><img src="https://www.close-upinternational.com/img/logo.svg"
                    alt="" /></div>
                <div class="app__text-line app__text-line--1"><img src="https://upload.wikimedia.org/wikipedia/commons/2/21/Flag_of_Colombia.svg"
                        alt=""  /> <i>Colombia</i>
                        @auth
                        @include('auth.loginOK')
                        @endauth
                        @guest
                        <button class="btn badge bg-primary text-wrap" id="btn_login"> <i class="fa-solid fa-arrow-right-to-bracket"></i> Sign In</button></div>
                        @endguest
                    </div>

            <A name="login" class="login" id="login"></A>
            <div class="app__text app__text--2">
                <div class="app__text-line app__text-line--4"></div>
                <div class="app__text-line app__text-line--3"></div>
                <div class="app__text-line app__text-line--2 mt-5">


                    @guest
                        @include('auth.login')
                    @endguest

                    @guest
                    @endguest
                </div>
                <div class="app__text-line app__text-line--1"><img src="" alt="" /></div>

            </div>


        </div>
        <!--
     <div class="pages">
      <ul class='pages__list'>
       <li data-target='1' class='pages__item pages__item--1 page__item-active'></li>
       <li data-target='2' class='pages__item pages__item--2'></li>
      </ul>
     </div>
    -->
    </div>
    <!--
    <a href="https://dribbble.com/shots/2936160-Opus-Animation" target="_blank" class="icon-link">
        <img src="http://icons.iconarchive.com/icons/uiconstock/socialmedia/256/Dribbble-icon.png">
      </a>
      <a href="https://twitter.com/mrspok407" target="_blank" class="icon-link icon-link--twitter">
        <img src="https://cdn1.iconfinder.com/data/icons/logotypes/32/twitter-128.png">
      </a>
    -->
@endsection
