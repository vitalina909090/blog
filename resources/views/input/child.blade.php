@extends('layouts.app')

@section('title', 'Input')

@section('content')
    <div class="container py-4">
        <h4 class="mt-4 text-muted">Базовый</h4>
        <x-input id="basic" name="basic" label="Обычный input" placeholder="Введите текст..."/>

        <h4 class="mt-4 text-muted">Типы</h4>
        <x-input type="email" id="email" name="email" label="Email" placeholder="vasia@gmail.com"/>
        <x-input type="password" id="password" name="password" label="Пароль" placeholder="*********"/>
        <x-input type="number" id="number" name="number" label="Число" min="0" max="100" step="1" placeholder="123"/>
        <x-input type="tel" id="tel" name="tel" label="Телефон" placeholder="+380 (00) 000-00-00"/>
        <x-input type="url" id="url" name="url" label="URL" placeholder="https://"/>
        <x-input type="search" id="search" name="search" label="Поиск" placeholder="Поиск..."/>
        <x-input type="date" id="date" name="date" label="Дата"/>
        <x-input type="color" id="color" name="color" label="Цвет" value="#0d6efd"/>

        <h4 class="mt-4 text-muted">Размеры</h4>
        <x-input id="sm" name="sm" label="Маленький" size="sm"/>
        <x-input id="md" name="md" label="Стандартный"/>
        <x-input id="lg" name="lg" label="Большой" size="lg"/>

        <h4 class="mt-4 text-muted">Состояния</h4>
        <x-input id="valid-input" name="valid_input" label="Валидное поле" state="valid" value="Верный ответ" feedback="Отлично!"/>
        <x-input id="invalid-input" name="invalid_input" label="Невалидное поле" state="invalid" value="Неверный ответ" feedback="Попробуйте еще раз"/>

        <h4 class="mt-4 text-muted">Disabled / Readonly</h4>
        <x-input id="dis" name="dis" label="Disabled" :disabled="true" value="Нельзя редактировать"/>
        <x-input id="ro" name="ro" label="Readonly" :readonly="true" value="Только чтение"/>

        <h4 class="mt-4 text-muted">Обязательное поле + вспомогательный текст</h4>
        <x-input id="req" name="req" label="Обязательное поле" :required="true" placeholder="Не оставляйте пустым" helperText="Это поле обязательно для заполнения"/>

        <h4 class="mt-4 text-muted">Вставка перед/после</h4>
        <x-input id="price" name="price" label="Цена" type="number" prepend="$" append=".00" placeholder="0"/>
        <x-input id="site" name="site" label="Сайт" prepend="https://" placeholder="blog.com"/>
        <x-input id="em" name="em" label="Email" type="email" prepend="@" placeholder="vasia@gmail.com"/>

        <h4 class="mt-4 text-muted">Всплывающий label</h4>
        <x-input id="float1" name="float1" label="Email" type="email" :floatingLabel="true" placeholder="name@example.com"/>
        <x-input id="float2" name="float2" label="Пароль" type="password" :floatingLabel="true" placeholder="Пароль"/>

        <h4 class="mt-4 text-muted">Шаблон + максимальная длина</h4>
        <x-input id="pattern" name="pattern" label="Только цифры + максимум 6 символов" pattern="[0-9]*" maxlength="6" placeholder="123456"/>
    </div>
@endsection
