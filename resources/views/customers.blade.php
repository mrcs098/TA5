@extends('layouts.app')
@section('title', 'Customer Accounts')
@section('content')
    <div class="page-heading directory-heading"><div><p class="eyebrow">YOUR PEOPLE / CUSTOMERS</p><h1>Customer <em>accounts.</em></h1><p class="lead">The details that help you stay connected with your customers.</p></div><span class="count-pill">{{ count($customers) }} customers</span></div>
    <section class="table-panel" aria-labelledby="customer-list-heading">
        <div class="table-heading"><h2 id="customer-list-heading">Customer directory</h2><span class="muted">Contact information &amp; account status</span></div>
        <div class="table-scroll"><table><caption class="sr-only">Customer accounts with email, phone, city, and status</caption><thead><tr><th scope="col">Account ID</th><th scope="col">Customer</th><th scope="col">Email address</th><th scope="col">Phone number</th><th scope="col">City</th><th scope="col">Status</th></tr></thead><tbody>
            @foreach ($customers as $customer)
                <tr><td class="record-id">{{ $customer['id'] }}</td><td><div class="person"><span class="avatar" aria-hidden="true">{{ substr($customer['name'], 0, 1) }}</span><strong>{{ $customer['name'] }}</strong></div></td><td>{{ $customer['email'] }}</td><td>{{ $customer['phone'] }}</td><td>{{ $customer['address'] }}</td><td><span class="badge {{ $customer['status'] === 'Active' ? 'badge-active' : 'badge-inactive' }}"><span aria-hidden="true">&bull;</span> {{ $customer['status'] }}</span></td></tr>
            @endforeach
        </tbody></table></div>
        <div class="table-footer"><span>Showing {{ count($customers) }} of {{ count($customers) }} customers</span><a href="{{ route('users') }}">View user accounts &rarr;</a></div>
    </section>
    <p class="directory-note">All records shown are fictional sample accounts.</p>
@endsection
