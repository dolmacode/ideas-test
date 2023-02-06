@extends('layouts.main')

@section('content')
@include('includes.header')
<div id="content">
    <div class="page-header">
       <div class="_container">
          <div class="page-header__body">
             <h1 class="page-header__title">Список идей</h1>
             <div class="page-header__actions">
                <a href="{{ route('page.create.idea') }}" class="btn btn__main">Добавить идею</a>
                <div class="page-header__list">
                   <div class="page-header__lang">
                      RU
                      <svg>
                         <use xlink:href="{{ asset('img/sprite.svg') }}#drop"></use>
                      </svg>
                      <ul class="page-header__lang-list">
                         <li><a href="#">eng</a></li>
                         <li class="active"><a href="#">ru</a></li>
                      </ul>
                   </div>
                   <a href="./search.html" class="page-header__search">
                      <svg>
                         <use xlink:href="{{ asset('img/sprite.svg') }}#search"></use>
                      </svg>
                   </a>
                   <a href="./mess.html" class="page-header__mess">
                      <svg>
                         <use xlink:href="{{ asset('img/sprite.svg') }}#messpc"></use>
                      </svg>
                   </a>
                </div>
             </div>
             <ul class="page-header__nav">
                <li class="page-header__nav-item"><a href="#">Инструкция</a></li>
                <li class="page-header__nav-item"><a href="{{ route('page.dashboard') }}">Категории идей</a></li>
                <li class="page-header__nav-item active"><a href="{{ route('page.list') }}">Список идей</a></li>
             </ul>
          </div>
       </div>
    </div>
    <!-- Page header -->

    <div class="filter">
       <div class="_container">
          <div class="filter__body">
             <div class="filter-drops">
                <div class="select filter-select">
                   <button class="btn select__btn filter-select__btn">
                      <span>Статус</span>
                      <svg><use xlink:href="{{ asset('img/sprite.svg') }}#drop"></use></svg>
                   </button>
                   <ul class="select__list filter-select__list">
                      <li class="select__item filter-select__item">Статус 1</li>
                      <li class="select__item filter-select__item">Статус 2</li>
                      <li class="select__item filter-select__item">Статус 3</li>
                   </ul>
                </div>
                <div class="select filter-select">
                   <button class="btn select__btn filter-select__btn">
                      <span>Дата</span>
                      <svg><use xlink:href="{{ asset('img/sprite.svg') }}#drop"></use></svg>
                   </button>
                   <ul class="select__list filter-select__list">
                      <li class="select__item filter-select__item">Дата 1</li>
                      <li class="select__item filter-select__item">Дата 2</li>
                      <li class="select__item filter-select__item">Дата 3</li>
                   </ul>
                </div>
                <div class="select filter-select filter-select__search">
                   <div class="filter-select__search-froup">
                      <input type="text" class="filter-select__btn form-control" placeholder="Поиск...">
                      <button class="btn filter-select__search-btn"><svg><use xlink:href="{{ asset('img/sprite.svg') }}#search"></use></svg></button>
                   </div>
                </div>
             </div>
             <div class="filter-act">
                <div class="select filter-select">
                   <button class="btn select__btn filter-select__btn">
                      <span>Сортировать по...</span>
                      <svg><use xlink:href="{{ asset('img/sprite.svg') }}#drop"></use></svg>
                   </button>
                   <ul class="select__list filter-select__list">
                      <li class="select__item filter-select__item">По возрастанию</li>
                      <li class="select__item filter-select__item">По убыванию</li>
                      <li class="select__item filter-select__item">Цена</li>
                      <li class="select__item filter-select__item">Доступно</li>
                      <li class="select__item filter-select__item">Статус</li>
                   </ul>
                </div>
                <div class="filter-actions">
                   <button class="btn filter-reset"><svg><use xlink:href="{{ asset('img/sprite.svg') }}#close"></use></svg>Сбросить</button>
                   <button class="btn btn__main filter-submit"><svg><use xlink:href="{{ asset('img/sprite.svg') }}#check"></use></svg>Применить</button>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- Filter -->

    <div class="page-table">
       <div class="table-responsive">
          <table class="table with-action">
             <thead>
                <tr>
                   <td></td>
                   <td>Категория</td>
                   <td>Имя создателя</td>
                   <td>Дата создания</td>
                   <td>Тема</td>
                   <td>Кол-во лайков</td>
                   <td>Статус</td>
                   <td>Действие</td>
                </tr>
             </thead>
             <tbody>
                @foreach($ideas as $item)
                <tr>
                   <td>{{ $item->id }}</td>
                   <td>{{ App\Models\Category::whereId($item->category_id)->first()->title }}</td>
                   <td>{{ $item->author }}</td>
                   <td>{{ $item->created_at }}</td>
                   <td>{{ substr($item->title, 0, 40) }}...</td>
                   <td>{{ $item->favs }}</td>
                   <td>{{ $item->status }}</td>
                   <td>
                      <div>
                         <a href="{{ route('idea.edit', ['id' => $item->id]) }}"><svg><use xlink:href="{{ asset('img/sprite.svg') }}#arrow"></use></svg></a>
                         <a href="{{ route('idea.delete', ['id' => $item->id]) }}"><svg><use xlink:href="{{ asset('img/sprite.svg') }}#close"></use></svg></a>
                      </div>
                   </td>
                </tr>
                @endforeach
             </tbody>
          </table>
       </div>
    </div>
    <!-- Page table -->

 </div>
 <!-- Content -->

@endsection
