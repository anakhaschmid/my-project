<div id="sidebar" class="sidebar responsive">
    <ul class="nav nav-list">
        <li class="{{ $nav=='profile' ? 'active' : '' }}">
            <a href="{{ asset('/users/details') }}">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text"> Profile </span>
            </a>

            <b class="arrow"></b>
        </li>
            <li class="{{ $nav=='edit' ? 'active' : '' }}">
                <a href="{{ asset('/users/edit/profile') }}" class="{{ $nav }}">
                    <i class="menu-icon fa fa-edit"></i>
                    <span class="menu-text"> Edit Profile </span>
                </a>
            </li>
           
         <!--    <li class=" ">
                <a href="{{ asset('/users/shortenLink') }}" class="{{ $nav }}">
                    <i class="menu-icon fa fa-edit"></i>
                    <span class="menu-text"> Short Url </span>
                </a>
            </li>

</ul>/.nav-list -->

<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
    <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>
</div>