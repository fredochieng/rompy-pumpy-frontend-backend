<div class="list-group">
    <a href="/account/{{ $model->model_no }}" class="list-group-item {{ (request()->is('account*')) ? 'active' : '' }}">My Profile</a>
    <a href="/my-subscription/{{ $model->model_no }}" class="list-group-item {{ (request()->is('my-subscription*')) ? 'active' : '' }}">My Subscription</a>
    <a href="/my-services/{{ $model->model_no }}" class="list-group-item {{ (request()->is('my-services*')) ? 'active' : '' }}">My Services</a>
    <a href="/my-pictures/{{ $model->model_no }}" class="list-group-item {{ (request()->is('my-pictures*')) ? 'active' : '' }}">My Pictures</a>
    <a href="/change-password/{{ $model->model_no }}" class="list-group-item {{ (request()->is('change-password*')) ? 'active' : '' }}">Change Password</a>
</div>
