@extends('layouts.main')

@section('content')
@include('includes.header')
<div id="content">
    <div class="page-header">
       <div class="_container">
          <div class="page-header__body">
             <h1 class="page-header__title">Список идей</h1>
             <div class="page-header__actions">
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
                <li class="page-header__nav-item active"><a href="{{ route('page.dashboard') }}">Категории идей</a></li>
                <li class="page-header__nav-item"><a href="{{ route('page.list') }}">Список идей</a></li>
             </ul>
          </div>
       </div>
    </div>
    <!-- Page header -->

    <form method="{{ !$category_edit ? "post" : "get" }}" action="{{ !$category_edit ? route('category.create') : route('category.update', ['id' => $category->id]) }}" enctype="multipart/form-data" class="add-new">
        @csrf
        <input type="hidden" name="status" value="Включена">
       <div class="add-new__header">
          <div class="_container">
             <div class="add-new__header-body">
                <h2 class="add-new__title">Добавление категории</h2>
                <div class="add-new__actions">
                   <a href="{{ route('page.dashboard') }}" class="btn add-new__btn add-new__cancel">Отменить</a>
                   <button type="submit" class="btn btn__main add-new__btn add-new__save">Создать</a>
                </div>
             </div>
          </div>
       </div>
       <div class="add-new__body">
          <div class="_container">
             <div class="add-new__form">
                <div class="add-new__form-group">
                   <input type="text" name="title" class="add-new__form-control form-control" @if($category_edit) value="{{ $category->title }}" @endif placeholder="Название">
                </div>
                <div class="add-new__form-group">
                   <textarea name="content" class="add-new__form-control form-control textarea" id="" placeholder="Описание">@if($category_edit) {{ $category->content }} @endif</textarea>
                </div>
                <div class="add-new__form-group">
                   <label class="add-new__drop-zone drop-zone">
                      <input type="file" name="image" id="file" class="drop-zone__input" accept=".png, .jpg, .jpeg" hidden/>
                      <p>Перетащите фото сюда или <span>выберите файл</span></p>
                      <div class="btn btn__drop">Загрузить</div>
                   </label>
                   <div class="drop-zone__thumb">
                      <a class="drop-zone__zoom" data-fancybox="dropfile"><svg><use xlink:href="{{ asset('img/sprite.svg') }}#arrow"></use></svg></a>
                      <a href="#"><svg><use xlink:href="{{ asset('img/sprite.svg') }}#close"></use></svg></a>
                   </div>
                </div>

             </div>
          </div>
       </div>
    </form>
    <!-- Add new single -->

    <div class="add-new__btns">
       <a href="{{ route('page.dashboard') }}" class="btn add-new__btn add-new__cancel">Отменить</a>
       <a href="{{ route('page.dashboard') }}" class="btn btn__main add-new__btn add-new__save">Сохранить</a>
    </div>

 </div>
 <!-- Content -->

@endsection
