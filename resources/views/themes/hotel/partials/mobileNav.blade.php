<style>
    @media (max-width: 767px) {
        .nav-menu {
            display: flex !important;
        }
    }

    .nav-menu {
        display: none;
        width: 100%;
        justify-content: space-between;
        align-items: center;
        box-sizing: border-box;
        background: black;
        position: fixed;
        bottom: 0;
        padding: 10px;
        z-index: 999;
    }

    .nav-btn {
        border-radius: 50%;
        box-sizing: border-box;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50px;
        height: 50px;
        border: none;
        cursor: pointer;
        transition: 0.2s all ease-in-out;
        text-decoration: none;
        color: black;
    }

    .nav-btn>i {
        font-size: 1.25rem;
    }

    .nav-btn:hover {
        background: #d09f06;
        transition: 0.2s all ease-in-out;
    }

    .nav-btn:focus,
    .nav-btn.active {
        background: #d09f06;
        color: white;
        transition: 0.2s all ease-in-out;
    }

    .content-section {
        width: 100%;
        height: 100%;
        flex-shrink: 0;
        box-sizing: border-box;
        padding: 20px;
    }
</style>
<nav class="nav-menu">
    <a class="nav-btn {{ menuActive('user.wallet.list') }}" href="{{ route('user.wallet.list') }}" role="button"
        aria-label="wallet button">
        <i class="fal fa-wallet"></i>
    </a>
    <a class="nav-btn {{ menuActive('user.transaction') }}" href="{{ route('user.transaction') }}" role="button"
        aria-label="transaction button">
        <i class="fal fa-exchange-alt"></i>
    </a>
    <a class="nav-btn {{ menuActive('user.home') }}" href="{{ route('user.home') }}" role="button"
        aria-label="home button">
        <i data-feather="home"></i>
    </a>
    <a class="nav-btn {{ menuActive('user.profile') }}" href="{{ route('user.profile') }}" role="button"
        aria-label="Profile button">
        <i data-feather="user"></i>
    </a>
    <a class="nav-btn {{ menuActive('user.list.setting') }}" href="{{ route('user.list.setting') }}" role="button"
        aria-label="settings button">
        <i data-feather="settings"></i>
    </a>
</nav>
