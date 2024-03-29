    <div class="container z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav
                    class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid pe-0">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-uppercase" href="#">
                            {{ Auth::user()->first_name }} {{ Auth::user()->last_name ?? '' }}
                        </a>
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navigation">
                            <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                                            href="{{ route('landing.page') }}">
                                            <i class="fa fa-home opacity-6 text-dark me-1"></i>
                                            Home page
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link me-2" href="{{ route('auth.login.page') }}">
                                            <i class="fas fa-key opacity-6 text-dark me-1"></i>
                                            Sing In
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link me-2" href="{{ route('auth.register.page') }}">
                                            <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                            Sing Up
                                        </a>
                                    </li>
                                @endguest
                                @auth
                                    @if (session('role') === 'general')
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                                                href="{{ route('general.index.page') }}">
                                                <i class="fas fa-desktop opacity-6 text-dark me-1"></i>
                                                Dashboard
                                            </a>
                                        </li>
                                    @elseif (session('role') === 'recruiter')
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                                                href="{{ route('recruiter.index.page') }}">
                                                <i class="fas fa-desktop opacity-6 text-dark me-1"></i>
                                                Dashboard
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                                                href="{{ route('recruiter.applicant.data.page') }}">
                                                <i class="fas fa-table opacity-6 text-dark me-1"></i>
                                                Applicant data
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                                                href="{{ route('recruiter.applicant.history.page') }}">
                                                <i class="fas fa-table opacity-6 text-dark me-1"></i>
                                                Applicant history
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                                                href="{{ route('recruiter.manage.user.page') }}">
                                                <i class="fas fa-user opacity-6 text-dark me-1"></i>
                                                Manage user
                                            </a>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                                                href="{{ route('applicant.index.page') }}">
                                                <i class="fas fa-desktop opacity-6 text-dark me-1"></i>
                                                Dashboard
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                                                href="{{ route('applicant.status.page') }}">
                                                <i class="fas fa-info-circle opacity-6 text-dark me-1"></i>
                                                Application Status
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link me-2" href="{{ route('applicant.account.page') }}">
                                                <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                                Account
                                            </a>
                                        </li>
                                    @endif
                                    <li class="nav-item">
                                        <a class="nav-link me-2" href="{{ route('logout.process') }}">
                                            <i class="fas fa-sign-out-alt opacity-6 text-dark me-1"></i>
                                            Log out
                                        </a>
                                    </li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>
