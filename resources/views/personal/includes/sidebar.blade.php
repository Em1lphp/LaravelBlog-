<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <div class="sidebar">
        <ul class="nav nav-pills nav-sidebar flex-column">
            <li class="mt-3 nav-item">
                <a href="{{route('personal')}}" class="nav-link">
                    <i class="nav-icon fa fa-home"></i>
                    <p>
                        Личный кабинет
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('likes.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-heart"></i>

                    <p>
                        Понравившиеся посты
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('comment.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-comments"></i>
                    <p>
                        Комменатрии
                    </p>
                </a>
            </li>

        </ul>

    </div>

</aside>
