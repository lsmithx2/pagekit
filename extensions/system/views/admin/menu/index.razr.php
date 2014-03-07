@script('menu', 'system/js/menu/menu.js', 'requirejs')

<form id="js-menu" class="uk-form uk-grid" data-uk-grid-margin data-uk-grid-match action="@url('@system/menu/reorder', ['id' => menu.id])" method="post">
    <div class="pk-sidebar uk-width-medium-1-4">

        <ul class="uk-nav uk-nav-side">
            @foreach (menus as m)
            <li class="uk-visible-hover@( m == menu ? ' uk-active' )">
                @if (m.id)
                <ol class="uk-subnav pk-subnav-icon uk-hidden">
                    <li><a href="#" data-edit="@url('@system/menu/save', ['id' => m.id])" data-menu-name="@m.name" title="@trans('Edit')"><i class="uk-icon-pencil"></i></a></li>
                    <li><a href="#" data-action="@url('@system/menu/delete', ['id' => m.id])" data-confirm="@trans('Are you sure?')" title="@trans('Delete')"><i class="uk-icon-minus-circle"></i></a></li>
                </ol>
                @endif
                <a href="@url('@system/menu/index', ['id' => m.id])">@m.name</a>
            </li>
            @endforeach
        </ul>
        @if (menus)
        <hr>
        @endif
        <a class="uk-button" href="#modal-menu" data-edit="@url('@system/menu/save', ['id' => 0])" data-menu-name="">@trans('Add Menu')</a>

    </div>
    <div class="pk-content uk-width-medium-3-4">

        @if (menu.id)
        <div class="pk-options uk-clearfix">
            <div class="uk-float-left">

                <a class="uk-button uk-button-primary" href="@url('@system/item/add', ['menu' => menu.id])">@trans('Add Item')</a>

                <div class="uk-button-dropdown" data-uk-dropdown="{ mode: 'click' }">
                    <button class="uk-button" type="button">@trans('Actions') <i class="uk-icon-caret-down"></i></button>
                    <div class="uk-dropdown uk-dropdown-small">
                        <ul class="uk-nav uk-nav-dropdown">
                            <li><a href="#" data-action="@url('@system/item/status', ['menu' => menu.id, 'status' => 1])">@trans('Enable')</a></li>
                            <li><a href="#" data-action="@url('@system/item/status', ['menu' => menu.id, 'status' => 0])">@trans('Disable')</a></li>
                            <li class="uk-nav-divider"></li>
                            <li><a href="#" data-action="@url('@system/item/delete', ['menu' => menu.id])">@trans('Delete')</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <div class="pk-table-fake pk-table-fake-header">
            <div class="pk-table-width-minimum"><input type="checkbox" class="js-select-all"></div>
            <div>@trans('Title') </div>
            <div class="pk-table-width-100 uk-text-center">@trans('Status')</div>
            <div class="pk-table-width-200 uk-text-truncate">@trans('URL')</div>
            <div class="pk-table-width-100">@trans('Access')</div>
        </div>

        @include('view://system/admin/menu/item.razr.php', ['menu' => menu, 'root' => app.menus.getTree(menu.id), 'levels' => levels])

        @endif

        @token()

    </div>
</form>

<div id="modal-menu" class="uk-modal">
    <div class="uk-modal-dialog uk-modal-dialog-slide">

        <form class="uk-form" action="@url('@system/menu/save', ['id' => 0])" method="post">

            <p>
                <input class="uk-width-1-1 uk-form-large" type="text" name="name" value="" placeholder="@trans('Enter Menu Name')">
            </p>

            <button class="uk-button uk-button-primary" type="submit">@trans('Save')</button>
            <button class="uk-button uk-modal-close" type="submit">@trans('Cancel')</button>

            @token()

        </form>

    </div>
</div>