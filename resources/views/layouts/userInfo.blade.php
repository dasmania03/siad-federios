<!-- User info -->
<div class="login-info">
    <span> <!-- User image size is adjusted inside CSS, it should stay as is -->
        <a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
            <img src="img/avatars/{{ Auth::user()->avatar }}" alt="yo" class="online" />
            <span>
                {{ Auth::user()->username }}
            </span>
            <i class="fa fa-angle-down"></i>
        </a>
    </span>
</div>
<!-- end user info -->