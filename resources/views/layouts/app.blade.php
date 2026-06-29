<!DOCTYPE html>
<html>
<head>
    <title>Asset Management</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

body{
    background:#eef2f7;
    margin:0;
    font-family:'Segoe UI',sans-serif;
}

/* =========================
   SIDEBAR
========================= */

.sidebar{
    position:fixed;
    top:0;
    left:0;

    width:280px;
    height:100vh;

    background:linear-gradient(
        180deg,
        #020617 0%,
        #03113a 100%
    );

    display:flex;
    flex-direction:column;

    overflow:hidden; /* Important */
}

.sidebar::-webkit-scrollbar{
    width:6px;
}

.sidebar::-webkit-scrollbar-track{
    background:transparent;
}

.sidebar::-webkit-scrollbar-thumb{
    background:#334155;
    border-radius:10px;
}

.sidebar-header{
    padding:25px;
    display:flex;
    gap:15px;
    align-items:center;
    border-bottom:1px solid rgba(255,255,255,.05);
}

.logo-box{
    width:50px;
    height:50px;
    border-radius:14px;
    background:#2563eb;
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-size:20px;
}

.sidebar-menu{
    flex:1;
    overflow-y:auto;

    scrollbar-width:none;
}

.sidebar-menu::-webkit-scrollbar{
    display:none;
}

.sidebar-menu h4{
    color:white;
    margin-bottom:25px;
    font-weight:700;
}

.sidebar-menu a{
    display:flex;
    align-items:center;
    gap:15px;
    padding:15px;
    margin-bottom:10px;
    border-radius:16px;
    color:#cbd5e1;
    text-decoration:none;
    transition:all .25s ease;
}

.sidebar-menu a:hover{
    background:rgba(255,255,255,.05);
    color:white;
    transform:translateX(5px);
}

.sidebar-menu a.active{
    background:#2563eb;
    color:white;
    font-weight:600;
    box-shadow:0 10px 30px rgba(37,99,235,.35);
    position:relative;
}

.sidebar-menu a.active::before{
    content:'';
    position:absolute;
    left:-20px;
    top:0;
    width:4px;
    height:100%;
    background:white;
    border-radius:5px;
}

/* =========================
   SIDEBAR FOOTER
========================= */

.sidebar-footer{
    padding:20px;
    border-top:1px solid rgba(255,255,255,.08);
    background:rgba(255,255,255,.02);
}

.user-card{
    display:flex;
    gap:15px;
    align-items:center;

    background:rgba(255,255,255,.06);

    backdrop-filter:blur(10px);

    padding:15px;

    border-radius:18px;

    border:1px solid rgba(255,255,255,.05);

    margin-bottom:15px;
}

.user-card:hover{
    background:rgba(255,255,255,.08);
}

.avatar{
    width:45px;
    height:45px;
    border-radius:50%;
    background:#2563eb;
    color:white;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:bold;
}

.logout-btn{
    display:block;
    text-align:center;
    padding:12px;
    border-radius:14px;
    background:#dc2626;
    color:white;
    text-decoration:none;
    transition:.3s;
    font-weight:600;
}

.logout-btn:hover{
    background:#b91c1c;
    color:white;
}

/* =========================
   CONTENT
========================= */

.content{
    margin-left:280px;
    min-height:100vh;

}

/* =========================
   TOPBAR
========================= */

.topbar{
    position:fixed;
    top:0;
    left:280px;   /* same as sidebar width */
    right:0;

    height:90px;

    z-index:9999;

    background:rgba(255,255,255,.85);
    backdrop-filter:blur(20px);

    border-bottom:1px solid #e5e7eb;

    display:flex;
    justify-content:space-between;
    align-items:center;

    padding:0 25px;
}

.topbar-left{
    display:flex;
    align-items:center;
    gap:20px;
}

.menu-btn{
    width:46px;
    height:46px;
    border:none;
    border-radius:20px;
    background:white;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
    transition:.3s;
}

.menu-btn:hover{
    transform:translateY(-4px);
}

.search-box{
    width:600px;
    max-width:100%;

    height:52px;

    background:white;

    border:1px solid #e2e8f0;

    border-radius:16px;

    display:flex;
    align-items:center;

    padding:0 15px;

    gap:10px;

    box-shadow:
        0 4px 15px rgba(0,0,0,.05);
}

.search-box input{
    border:none;
    outline:none;
    background:transparent;
    width:100%;
}

.topbar-right{
    display:flex;
    align-items:center;
    gap:15px;
}

.notification-btn{
    width:48px;
    height:48px;

    background:white;

    border-radius:50%;

    display:flex;
    align-items:center;
    justify-content:center;

    box-shadow:0 4px 15px rgba(0,0,0,.08);

    transition:.3s;
}

.notification-btn:hover{
    transform:translateY(-2px);
}

.date-card{
    background:white;
    padding:12px 18px;

    border-radius:14px;

    box-shadow:0 4px 15px rgba(0,0,0,.08);

    display:flex;
    align-items:center;
    gap:10px;

    font-weight:600;

    transition:.3s;
}

.date-card:hover{
    transform:translateY(-2px);
}

.profile-card{
    background:white;

    padding:10px 15px;

    border-radius:14px;

    display:flex;
    align-items:center;
    gap:12px;

    box-shadow:0 4px 15px rgba(0,0,0,.08);

    transition:.3s;
}

.profile-card:hover{
    transform:translateY(-2px);
}

.profile-avatar{
    width:42px;
    height:42px;

    border-radius:50%;

    background:#2563eb;
    color:white;

    display:flex;
    align-items:center;
    justify-content:center;

    font-weight:700;
}

/* =========================
   MAIN CONTENT
========================= */

.main-content{
    padding:120px 25px 25px 25px;
}

.page-container{
    max-width:1600px;
    margin:auto;
}

/* =========================
   CARDS
========================= */

.card{
    border:none !important;

    border-radius:22px !important;

    background:white;

    box-shadow:
        0 8px 30px rgba(15,23,42,.06);

    transition:.25s;
}

.card:hover{
    transform:translateY(-5px);

    box-shadow:
        0 15px 35px rgba(15,23,42,.10);
}

/* =========================
   FORM ELEMENTS
========================= */

.form-control,
.form-select{
    border-radius:12px;
    min-height:48px;
}

.btn{
    border-radius:12px;
}

.form-control,
.form-select{
    height:52px;
    border-radius:12px;
}

::-webkit-scrollbar{
    width:8px;
}

::-webkit-scrollbar-track{
    background:#f1f5f9;
}

::-webkit-scrollbar-thumb{
    background:#94a3b8;
    border-radius:50px;
}

::-webkit-scrollbar-thumb:hover{
    background:#64748b;
}

.notification-count{
    position:absolute;

    top:-3px;
    right:-3px;

    width:18px;
    height:18px;

    border-radius:50%;

    background:#ef4444;
    color:white;

    font-size:10px;

    display:flex;
    align-items:center;
    justify-content:center;
}

.asset-card{
    border-radius:20px;
    background:#fff;
    transition:.25s;
}

.asset-card:hover{
    transform:translateY(-3px);
    box-shadow:0 18px 35px rgba(0,0,0,.08);
}

.asset-card .badge{
    border-radius:30px;
    font-weight:600;
}

</style>

</head>
<body>

<div class="sidebar">

    <div class="sidebar-header">

        <div class="logo-box">
            <i class="fa-solid fa-cube"></i>
        </div>

        <div>
            <h5 class="mb-0 text-white">
                Asset Management
            </h5>

            <small class="text-secondary">
                Atlas-Maharani Group
            </small>
        </div>

    </div>

    <div class="sidebar-menu">

        <h4 class="logo text-white">
            Asset Management
        </h4>

        <a href="/dashboard"
   class="{{ request()->is('dashboard') ? 'active' : '' }}">
        <i class="fa-solid fa-house"></i>
Dashboard
        </a>

        <a href="/assets"
class="{{ request()->is('assets') && !request()->is('assets/create') ? 'active' : '' }}">
            <i class="fa-solid fa-box"></i>
Assets
        </a>

        <a href="/issues"
   class="{{ request()->is('issues') || request()->is('issues/*') ? 'active' : '' }}">
            <i class="fa-solid fa-arrow-right-arrow-left"></i>
Issued Assets
        </a>

        <a href="/history"
   class="{{ request()->is('history') || request()->is('history/*') ? 'active' : '' }}">
            <i class="fa-solid fa-clock-rotate-left"></i>
History
        </a>

        

<a href="/verification/create"
   class="{{ request()->is('verification*') ? 'active' : '' }}">
            <i class="fa-solid fa-circle-check"></i>
Asset Verification
        </a>

        <a href="/users"
   class="{{ request()->is('users*') ? 'active' : '' }}">
    <i class="fa-solid fa-users"></i>
    Users
</a>

<a href="{{ route('activity-logs.index') }}"
   class="{{ request()->routeIs('activity-logs.*') ? 'active' : '' }}">

    <i class="fa-solid fa-clock-rotate-left"></i>
    Activity Logs

</a>

    </div>

    <div class="sidebar-footer">

        <div class="user-card">

            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'A',0,1)) }}
            </div>

            <div>
                <div class="text-white fw-bold">
                    {{ auth()->user()->name ?? 'Admin' }}
                </div>

                <small class="text-secondary">
                    {{ auth()->user()->role ?? 'Administrator' }}
                </small>
            </div>

        </div>

        <form action="/logout" method="POST">
    @csrf

    <button type="submit" class="logout-btn w-100 border-0">
        Logout
    </button>

    <div class="text-center mt-4">

    <small class="text-secondary">
        Version 1.0.0
    </small>

    <br>

    <small class="text-secondary">
        Atlas-Maharani Group
    </small>

</div>
</form>

    </div>

</div>

<div class="content">

    <div class="topbar">

    <div class="topbar-left">

        <button class="menu-btn">
            <i class="fa-solid fa-bars"></i>
        </button>

        <form action="{{ route('search') }}" method="GET">

    <div class="search-box">

        <i class="fa-solid fa-magnifying-glass"></i>

        <input
            type="text"
            name="search"
            placeholder="Search assets, codes, employees..."
            required>

    </div>

</form>

    </div>

    <div class="topbar-right">

        <div class="notification-btn">
            <i class="fa-regular fa-bell"></i>
        </div>

        <div class="date-card">
            <i class="fa-regular fa-calendar"></i>
            {{ now()->format('d F Y, l') }}
        </div>

        <div class="profile-card">

            <div class="profile-avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'A',0,1)) }}
            </div>

            <div>
                <div class="fw-bold">
                    {{ auth()->user()->name ?? 'Admin' }}
                </div>

                <small class="text-muted">
                    {{ auth()->user()->role ?? 'Administrator' }}
                </small>
            </div>

        </div>

    </div>

</div>

    <div class="main-content">

        <div class="page-container">

            @yield('content')

        </div>

    </div>

</div>

</div>

</body>
</html>