@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard - Site Preview</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>
                    <p>New Orders</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                    <p>Bounce Rate</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>44</h3>
                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>65</h3>
                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header with-border">
                    <h3 class="card-title">Live Site Preview</h3>
                    <div class="card-tools pull-right">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body" style="padding: 0; overflow: hidden;">
                    <iframe id="sitePreview" src="{{ url('/') }}" style="width: 100%; height: 600px; border: none;"></iframe>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card card-primary">
                <div class="card-header with-border">
                    <h3 class="card-title">Quick Navigation</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Manage your application from here</p>
                    <div class="list-group">
                        <a href="{{ route('product.index') }}" class="list-group-item nav-link" data-preview-url="{{ route('product.index') }}">
                            <i class="fas fa-shopping-cart"></i> View Products
                        </a>
                        <a href="{{ route('age.form') }}" class="list-group-item nav-link" data-preview-url="{{ route('age.form') }}">
                            <i class="fas fa-check-circle"></i> Age Verification
                        </a>
                        <a href="{{ route('login') }}" class="list-group-item nav-link" data-preview-url="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt"></i> User Login
                        </a>
                        <a href="{{ route('register.form') }}" class="list-group-item nav-link" data-preview-url="{{ route('register.form') }}">
                            <i class="fas fa-user-plus"></i> Register
                        </a>
                    </div>
                </div>
            </div>

            <div class="card card-success">
                <div class="card-header with-border">
                    <h3 class="card-title">System Info</h3>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-6">Environment:</dt>
                        <dd class="col-sm-6"><small>{{ env('APP_ENV') }}</small></dd>

                        <dt class="col-sm-6">Debug Mode:</dt>
                        <dd class="col-sm-6">
                            <small>
                                @if(env('APP_DEBUG'))
                                    <span class="badge badge-success">On</span>
                                @else
                                    <span class="badge badge-danger">Off</span>
                                @endif
                            </small>
                        </dd>

                        <dt class="col-sm-6">Database:</dt>
                        <dd class="col-sm-6"><small>{{ env('DB_DATABASE') }}</small></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const previewUrl = this.getAttribute('data-preview-url');
            document.getElementById('sitePreview').src = previewUrl;
        });
    });
</script>
@endsection
