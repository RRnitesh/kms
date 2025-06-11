@extends('layouts.app')

@section('title', 'KMS - Knowledge Management System')

@section('styles')
    <link rel="stylesheet" href="{{ asset('asset/css/index.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection

@section('content')
    <section class="hero-section">
        <div class="shape-blob blob-1"></div>
        <div class="shape-blob blob-2"></div>
        
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="hero-title">Share <span>Knowledge.</span><br>Solve <span>Problems.</span></h1>
                        <p class="hero-subtitle">A collaborative platform to post, search, and solve real-world problems. Join our community of problem solvers and knowledge sharers.</p>
                        <button class="hero-cta">
                            Post a Problem
                            <i class="fas fa-plus-circle me-2"></i>
                        </button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('asset/images/hero-illustration.svg') }}" alt="Team Collaboration" class="hero-image">
                </div>
            </div>
        </div>
    </section>

    <section class="features-section">
        <div class="container">
            <div class="section-header text-center">
                <h2>Key <span>Features</span></h2>
                <p>What makes KMS stand out</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-search-plus"></i>
                        </div>
                        <h3>Post & Search</h3>
                        <p>Easily post problems and search through existing solutions with our powerful search engine.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-tags"></i>
                        </div>
                        <h3>Smart Tagging</h3>
                        <p>Organize and find relevant content quickly with our intelligent tagging system.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-arrow-up"></i>
                        </div>
                        <h3>Community Voting</h3>
                        <p>Find the best solutions fast with community-powered voting and ranking.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Live Collaboration</h3>
                        <p>Work together in real-time with built-in collaboration tools and features.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="how-it-works-section">
        <div class="container">
            <div class="section-header text-center">
                <h2>How It <span>Works</span></h2>
                <p>Get started with KMS in three simple steps</p>
            </div>
            
            <div class="timeline">
                <div class="row timeline-row">
                    <div class="col-lg-4">
                        <div class="timeline-step">
                            <div class="timeline-icon">
                                <i class="fas fa-edit"></i>
                                <span class="step-number">1</span>
                            </div>
                            <div class="timeline-content">
                                <h3>Post Your Problem</h3>
                                <p>Share your challenge with our community. Add relevant tags and details to get better responses.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="timeline-step">
                            <div class="timeline-icon">
                                <i class="fas fa-comments"></i>
                                <span class="step-number">2</span>
                            </div>
                            <div class="timeline-content">
                                <h3>Get Solutions</h3>
                                <p>Add solutions to your challenges and save them for future reference.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="timeline-step">
                            <div class="timeline-icon">
                                <i class="fas fa-check-circle"></i>
                                <span class="step-number">3</span>
                            </div>
                            <div class="timeline-content">
                                <h3>Mark Best Answers</h3>
                                <p>Upvote the best solutions and help others find the most effective answers.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection