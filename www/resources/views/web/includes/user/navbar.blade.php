<nav class="shadow-sm d-flex flex-row justify-content-between">
    <div class="toggle" id="toggle" onclick="toggleMenu()">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </div>
    <div class="d-flex align-items-center">
        @if ($my_group == null)
            <button type="button" class="btn btn-default d-none d-md-block create-new-group shadow-none border-0 rounded-0"
                data-bs-toggle="modal" data-bs-target="#createGroupModal">
                <i class="fa-solid fa-pen-to-square"></i>
                Create New Group
            </button>
        @endif
        <div class="dropdown">
            <a class="btn btn-select-level dropdown-toggle shadow-none rounded-0" href="#" role="button"
                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                ROOKIE LEVEL
            </a>
            {{-- <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">ROOKIE LEVEL</a></li>
                <li><a class="dropdown-item" href="#">VETERAN LEVEL</a></li>
                <li><a class="dropdown-item" href="#">HALL OF FAMER LEVEL</a></li>
            </ul> --}}
        </div>

        <button type="button" class="btn btn-notification shadow-none position-relative">
            <i class="fa-solid fa-bell"></i>
            <span class="new_notification"</span>
        </button>

        <div class="dropdown profile_image_div">
            <a class="btn p-0 dropdown-toggle shadow-none rounded-0" href="#" role="button"
                id="dropdownProfileLink" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('web_assets/images/default.jpg') }}" width="40" height="40" alt="">
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
