@extends('layouts.app')
@section('title', 'User Accounts')
@section('content')
    <div class="page-heading directory-heading"><div><p class="eyebrow">YOUR PEOPLE / TEAM</p><h1>User <em>accounts.</em></h1><p class="lead">Meet the team behind your day-to-day operations.</p></div><span class="count-pill">{{ count($users) }} users</span></div>
    <section class="table-panel" aria-labelledby="user-list-heading">
        <div class="table-heading"><h2 id="user-list-heading">Team directory</h2><span class="muted">Staff accounts &amp; assigned roles</span></div>
        <div class="table-scroll"><table><caption class="sr-only">User accounts with username, email, role, and status</caption><thead><tr><th scope="col">Account ID</th><th scope="col">Team member</th><th scope="col">Username</th><th scope="col">Email address</th><th scope="col">Role</th><th scope="col">Status</th></tr></thead><tbody>
            @foreach ($users as $user)
                <tr><td class="record-id">{{ $user['id'] }}</td><td><div class="person"><span class="avatar avatar-blue" aria-hidden="true">{{ substr($user['name'], 0, 1) }}</span><strong>{{ $user['name'] }}</strong></div></td><td>{{ $user['username'] }}</td><td>{{ $user['email'] }}</td><td><span class="role-label">{{ $user['role'] }}</span></td><td><span class="badge {{ $user['status'] === 'Active' ? 'badge-active' : 'badge-inactive' }}"><span aria-hidden="true">&bull;</span> {{ $user['status'] }}</span></td></tr>
            @endforeach
        </tbody></table></div>
        <div class="table-footer"><span>Showing {{ count($users) }} of {{ count($users) }} users</span><a href="{{ route('customers') }}">View customer accounts &rarr;</a></div>
    </section>
    <p class="directory-note">All records shown are fictional sample accounts.</p>
@endsection
