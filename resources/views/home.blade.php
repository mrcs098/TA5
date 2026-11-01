@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <section class="hero">
        <div class="hero-copy">
            <p class="eyebrow"><span class="dot"></span> YOUR ACCOUNT WORKSPACE</p>
            <h1>A clearer view of<br>the people behind<br><em>your business.</em></h1>
            <p class="lead">Keep customer details and team accounts within reach. A simple starting point for your point-of-sale workflow.</p>
            <div class="hero-actions">
                <a class="button" href="{{ route('customers') }}">View customers <span aria-hidden="true">&rarr;</span></a>
                <a class="text-link" href="{{ route('about') }}">About the application &nearr;</a>
            </div>
        </div>
        <aside class="overview" aria-label="Account overview">
            <div class="overview-top"><span>WORKSPACE OVERVIEW</span><span class="tiny-pill">POS</span></div>
            <div class="overview-number">{{ $customerCount + $userCount }}<span>accounts in your directory</span></div>
            <div class="overview-divider"></div>
            <a class="overview-row" href="{{ route('customers') }}"><span class="icon-square">C</span><span>Customer accounts<small>Contact details and status</small></span><strong>{{ str_pad($customerCount, 2, '0', STR_PAD_LEFT) }}</strong></a>
            <a class="overview-row" href="{{ route('users') }}"><span class="icon-square pale">U</span><span>User accounts<small>Team members and roles</small></span><strong>{{ str_pad($userCount, 2, '0', STR_PAD_LEFT) }}</strong></a>
            <p class="overview-note">Everything starts with knowing your people.</p>
        </aside>
    </section>
    <section class="section-space" aria-labelledby="explore-heading">
        <div class="section-top"><h2 id="explore-heading">A place for every account.</h2><span class="muted">Browse your workspace</span></div>
        <div class="feature-grid">
            <a class="feature-card" href="{{ route('customers') }}"><span class="card-index">01 / CUSTOMERS</span><h3>Your customer directory</h3><p>Find names, email addresses, contact details, and account status in one organized view.</p><span class="card-link">Browse {{ $customerCount }} customers &rarr;</span></a>
            <a class="feature-card" href="{{ route('users') }}"><span class="card-index">02 / TEAM</span><h3>The people running things</h3><p>See the team behind the counter, with account usernames, assigned roles, and status.</p><span class="card-link">Browse {{ $userCount }} users &rarr;</span></a>
            <a class="feature-card" href="{{ route('about') }}"><span class="card-index">03 / ABOUT</span><h3>Built on clear foundations</h3><p>Learn about the application, its purpose, and the pages that support this POS foundation.</p><span class="card-link">Get to know Counter POS &rarr;</span></a>
        </div>
    </section>
@endsection
