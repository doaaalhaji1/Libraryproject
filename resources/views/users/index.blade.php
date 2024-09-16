@extends('layouts.Admindashboard')

@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif



    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ __('public.name') }}</th>
                <th>{{ __('public.email') }}</th>
                <th class="text-center">{{ __('public.Role') }}</th>
                <th class="text-center">{{ __('dash.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>
                  <form method="POST" action="{{ route('users.updateRole', $user->id) }}">
                      @csrf
                  @method('PUT')
              <div class="d-flex align-items-center">
            <select id="role" name="role" class="form-select me-2">
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>{{ __('public.Admin') }}</option>
                <option value="employee" {{ $user->role == 'employee' ? 'selected' : '' }}>{{ __('public.Employee') }}</option>
                <option value="member" {{ $user->role == 'member' ? 'selected' : '' }}>{{ __('public.Member') }}</option>
            </select>
            <button type="submit" class="btn btn-primary">{{ __('public.ok') }}</button>
        </div>
    </form>
</td>
                    <td class="text-center">
                        <a href="{{ route('users.show', $user['id']) }}" class="btn btn-primary">{{ __('dash.show') }}</a>
                         <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning ">{{ __('dash.edit') }}</a>
                        <form action="{{ route('users.destroy', $user['id']) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __('dash.delete') }}</button>
                    </td>
                </tr>
            </form>
            @endforeach
        </tbody>
    </table>

@endsection

