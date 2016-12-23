<!-- ******HEADER****** -->
<header id="header" class="header">
    <div class="container">
        <h1 class="logo pull-left">
            <a class="scrollto" href="<?= base_url("welcome#promo")?>">
                <span class="logo-title">leishDB</span>
            </a>
        </h1><!--//logo-->
        <nav id="main-nav" class="main-nav navbar-right " role="navigation">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button><!--//nav-toggle-->
            </div><!--//navbar-header-->
            <div class="navbar-collapse collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active nav-item sr-only"><a class="scrollto" href="#promo">Home</a></li>
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">About <span class="caret"></span></a>
                        <ul class="dropdown-menu" style="z-index: 10000">
                            <li><a href="<?= base_url("welcome#docs")?>" >Citing</a></li>
                            <li><a href="<?= base_url("welcome#features")?>" >Statistics</a></li>
                            <li><a href="<?= base_url("welcome#about")?>" >What is LeishDB?</a></li>
                            <li><a href="<?= base_url("welcome#collaborators")?>" >Team</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="http://www.leishdb.com/community/">Community</a></li>
                    <li class="nav-item"><a href="<?= base_url("welcome#downloads")?>" >Downloads</a></li>
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Tools <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://regadb.bahia.fiocruz.br:4567" target="_blank">BLAST</a></li>
                            <li><a href="http://regadb.bahia.fiocruz.br/jbrowse/index.html"
                                   target="_blank">Genome browser</a></li>
                        </ul>
                    </li>
                </ul><!--//nav-->
            </div><!--//navabr-collapse-->
        </nav><!--//main-nav-->
    </div>
</header><!--//header-->