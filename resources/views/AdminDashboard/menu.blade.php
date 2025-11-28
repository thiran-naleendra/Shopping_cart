{{-- filter these menus --}}

<li class="nav-item">

    @php
        use Illuminate\Support\Facades\Auth;
        $user_role = Auth::user()->user_role;

        $permissions_for_add_items = ['Admin'];
        $permissions_for_register_user = ['Admin'];
        $permissions_for_reports = ['Admin', 'Sale Assistant'];

        $currentRouteName = request()->route()->getName();

    @endphp

    @if (in_array($user_role, $permissions_for_add_items) || $user_role === 'Admin' || $user_role === 'Sale Assistant')
        <a href="{{ route('menu') }}" class="nav-link ">
            <i class="nav-icon fas fa-home"></i>
            <p>Add Items</p>
        </a>
    @endif

    @if (in_array($user_role, $permissions_for_register_user) || $user_role === 'admin')
        <a href="{{ route('addUser') }}" class="nav-link ">
            <i class="nav-icon fas fa-home"></i>
            <p>Register User</p>
        </a>
    @endif
    @if (in_array($user_role, $permissions_for_reports) || $user_role === 'admin')
        <a href="{{ route('reports') }}" class="nav-link ">
            <i class="nav-icon fas fa-home"></i>
            <p>Delivary Update</p>
        </a>
    @endif
</li>
