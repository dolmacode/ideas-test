<nav class="header-nav">
    <div class="header-nav__logo"><a href="./">Список идей</a></div>
    <div class="header-nav__body">
       <ul class="header-nav__menu">
          <li class="header-nav__list active">
             <a href="{{ route('page.dashboard') }}">
                <svg>
                   <use xlink:href="{{ asset('img/nav.svg') }}#list"></use>
                </svg>
                Список идей
             </a>
          </li>
       </ul>
    </div>
 </nav>
 <!-- Navigation -->

 <header class="header" id="header">
    <div class="header__body">
       <div class="bars"><svg><use xlink:href="{{ asset('img/sprite.svg') }}#bars"></use></svg></div>
       <div class="header__logo"><a href="./"><img src="{{ asset('img/logo.svg') }}" alt=""></a></div>
       <div class="header__actions">
          <a href="#" class="header__action header__action-search"><svg><use xlink:href="{{ asset('img/sprite.svg') }}#search-mob"></use></svg></a>
          <a href="#" class="header__action header__action-mess"><svg><use xlink:href="{{ asset('img/sprite.svg') }}#mess"></use></svg></a>
       </div>
    </div>
 </header>
 <!-- Header -->
