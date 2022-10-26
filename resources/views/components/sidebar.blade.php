<div class="border-end bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading border-bottom bg-light">Пульт админа</div>
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('index', ['filter' => '0']) }}">Все задачи</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('myTasks', ['userId' => Auth::user()->id]) }}">Мои задачи</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('create') }}">Создать задачу</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('goods') }}">Результаты парсинга</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('showPublishedGoods') }}">Опубликованные товары</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('showCharts') }}">Отчеты</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('allOrders') }}">Заказы пользователей</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('users') }}">Пользователи</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('siteIndex') }}">Сторона пользователя</a>
    </div>
</div>
