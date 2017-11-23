<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand page-scroll" href="{!! url('/') !!}">leishDB</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="{!! url('/#about') !!}" class="page-scroll">About</a>
            </li>
            <li>
                <a href="{!! url('/#statistics') !!}" class="page-scroll">Statistics</a>
            </li>
            <li>
                <a href="{!! url('/#downloads') !!}" class="page-scroll">Downloads</a>
            </li>
            <li>
                <a href="{!! url('/#citing') !!}" class="page-scroll">Citing</a>
            </li>
            <li>
                <a href="{!! url('/mirna-graph') !!}" class="page-scroll">miRNA</a>
            </li>
            <li>
                <a href="http://www.leishdb.com/community/" class="page-scroll">Community</a>
            </li>
            <li class="dropdown nav-item">
                <a href="#tools" class="dropdown-toggle" data-toggle="dropdown">Tools
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{!! url('/blast') !!}">BLAST</a>
                    </li>
                    <li>
                        <a href="{!! url('/genome-browser') !!}">Genome browser</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>