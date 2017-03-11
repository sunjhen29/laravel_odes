<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="#" class="navbar-brand">{{ $title or "Offline Data Entry System" }}</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            @if(session('batch_name'))
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="{{ setActiveapp('interest/view') }}"><a href="{{ url('/interest/view') }}"><i class="fa fa-tasks" aria-hidden="true"></i> View</a></li>
                    <li class="{{ setActiveapp('interest/entry') }}"><a href="{{ url('/interest/entry') }}"><i class="fa fa-plus" aria-hidden="true"></i> Entry</a></li>
                    @if(setActive('interest/modify/')=='active')
                        <li class="{{ setActive('interest/modify/') }}"><a href=""><i class="fa fa-plus" aria-hidden="true"></i> Modify</a></li>
                    @endif
                    <li class="{{ setActiveapp('interest/verify') }}"><a href="{{ url('/interest/verify') }}"><i class="fa fa-check-square-o" aria-hidden="true"></i> Verify</a></li>
                    <li class="{{ setActiveapp('interest') }}"><a href="{{ url('/interest') }}"><i class="fa fa-reply" aria-hidden="true"></i> Close</a></li>
                </ul>
            </div>
            @endif
            <!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</header>
<!-- Full Width Column -->
<div class="content-wrapper">
    <div class="container">
        <!-- Main content -->
        <section class="content">