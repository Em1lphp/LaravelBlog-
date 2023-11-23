<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <div class="sidebar">
        <ul class="nav nav-pills nav-sidebar flex-column">
            <li class="mt-3 nav-item">
                <a href="{{route('admin')}}" class="nav-link">
                    <i class="nav-icon fa fa-home"></i>
                    <p>
                        ГЛАВНАЯ
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        ПОЛЬЗОВАТЕЛИ
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('posts.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-portrait"></i>
                    <p>
                        ПОСТЫ
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('categories.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-th-list"></i>
                    <p>
                        КАТЕГОРИИ
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('tags.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-tags"></i>
                    <p>
                        ТЭГИ
                    </p>
                </a>
            </li>


        </ul>

    </div>

</aside>
