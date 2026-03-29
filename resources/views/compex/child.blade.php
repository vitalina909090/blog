@extends('layouts.app')

@section('title', 'Components')

{{--@section('content')--}}
{{--    <x-alert--}}
{{--        type="success"--}}
{{--        message="Hello from view"--}}
{{--        :dismissible="false"--}}
{{--        id="alert_main"--}}
{{--        class="my-class"--}}
{{--    />--}}

{{--    <x-alert message="This is test message"/>--}}

{{--    <x-props title="props_title" :count="5"></x-props>--}}

{{--    ----------}}
{{--    <x-attr type="success" class="mb-4" id="main-alert" data-notify="true"/>--}}

{{--    <x-attr type="success" class="mb-4" id="main-alert" data-notify="true">--}}
{{--        Content from child.blade.php--}}
{{--    </x-attr>--}}


{{--<x-attr type="success" id="main-alert" data-notify="true">--}}
{{--    Content--}}
{{--</x-attr>--}}

{{--<x-attr class="mb-4 btn btn-primary" id="test">--}}
{{--    BUTTON--}}
{{--</x-attr>--}}


{{--    -----------------------}}


@section('content')
    <div>
        <x-button>Click</x-button>

        <x-button variant="success">Save</x-button>
        <x-button variant="danger">Delete</x-button>

        <x-button size="lg">Large button</x-button>
        <x-button size="sm">Small button</x-button>

        <x-button :disabled="true">Disabled</x-button>
        <x-button :loading="true">Loading...</x-button>

        <x-button
            variant="success"
            id="submit-btn"
            data-action="save"
        >Save</x-button>
    </div>

    <div class="container">
        <div class="row">
            <x-card class="col-md-6" title="Post Title" subtitle="By P32">
                <p>This is the test content</p>
                <a href="/posts/1" class="btn btn-primary">Read more...</a>
            </x-card>

            <x-card class="col-md-6"
                    title="Post Title"
                    subtitle="By P32"
                    image="{{ Vite::asset('resources/img/cat.png') }}"
                    footer="20.00"
            >
                <p>This is the test content</p>
                <a href="/posts/1" class="btn btn-primary">Read more...</a>
            </x-card>
        </div>
    </div>

    <x-class-alert
        type="success"
        message="Пост создан успешно"
        :dismissible="true"
    />

    <x-class-alert
        type="danger"
        message="Ошибка при сохранении"
        :dismissible="true"
    />

    <x-class-alert
        type="success"
        message="Все хорошо"
    />

    <x-class-alert
        type="warning"
        message="Проверьте данные перед отправкой"
        class="mt-4"
        id="warning-alert"
    />


@endsection
