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
                <li class="page-header__nav-item"><a href="{{ route('page.dashboard') }}">Категории идей</a></li>
                <li class="page-header__nav-item active"><a href="{{ route('page.list') }}">Список идей</a></li>
             </ul>
          </div>
       </div>
    </div>
    <!-- Page header -->

    <form method="{{ !$idea_edit ? "post" : "get" }}" action="{{ !$idea_edit ? route('idea.create') : route('idea.update', ['id' => $idea->id]) }}" enctype="multipart/form-data" class="add-new">
        @csrf
       <div class="add-new__header">
          <div class="_container">
             <div class="add-new__header-body">
                <h2 class="add-new__title">Добавление идеи</h2>
                <div class="add-new__actions">
                   <a href="{{ route('page.list') }}" class="btn add-new__btn add-new__cancel">Отменить</a>
                   <button type="submit" class="btn btn__main add-new__btn add-new__save">Создать</a>
                </div>
             </div>
          </div>
       </div>
       <div class="add-new__body">
          <div class="_container">
             <div class="add-new__form">
                <div class="add-new__form-group">
                    <select name="category_id" class="select add-new__select">
                        <option selected disabled>Категория</option>
                        @if($idea_edit) <option selected value="{{ App\Models\Category::whereId($idea->category_id)->first()->id }}">{{ App\Models\Category::whereId($idea->category_id)->first()->title }}</option> @endif
                        @foreach(App\Models\Category::where('status', 'Включена')->get()->all() as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="add-new__form-group">
                   <input name="author" type="text" class="add-new__form-control form-control" @if($idea_edit) value="{{ $idea->author }}" @endif placeholder="Имя создателя">
                </div>
                <div class="add-new__form-group">
                   <input name="title" type="text" class="add-new__form-control form-control" @if($idea_edit) value="{{ $idea->title }}" @endif placeholder="Тема">
                </div>
                <div class="add-new__form-group">
                   <input name="content" type="text" class="add-new__form-control form-control" @if($idea_edit) value="{{ $idea->content }}" @endif placeholder="Описание">
                </div>
                <div class="add-new__form-group">
                   <div class="add-new__row">
                      <div class="add-new__col col-sm-6">
                        <select name="status" class="select add-new__select">
                            <option selected disabled>Статус</option>
                            @if($idea_edit) <option selected value="{{ $idea->status }}">{{ $idea->status }}</option> @endif
                            <option value="Новая">Новая</option>
                            <option value="В реализации">В реализации</option>
                            <option value="Реализована">Реализована</option>
                        </select>
                      </div>
                      <div class="add-new__col col-sm-6">
                         <label class="add-new__file w-100 h-100">
                            <input type="file" name="file" id="file" accept=".png, .jpg, .jpeg" hidden/>
                            <div class="btn btn__drop w-100 h-100">Прикрепить файл</div>
                         </label>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </form>
    <!-- Add new single -->

    <div class="add-new__btns">
       <a href="{{ route('page.list') }}" class="btn add-new__btn add-new__cancel">Отменить</a>
       <a href="{{ route('page.list') }}" class="btn btn__main add-new__btn add-new__save">Сохранить</a>
    </div>

 </div>
 <!-- Content -->

@endsection
