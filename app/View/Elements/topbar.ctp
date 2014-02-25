<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="<?=$this->action==''?'active':''?>">
                        <a href="<?=$baseUrl?>">Project List</a>
                    </li>
                    <li class="<?=$this->action=='ref_list'?'active':''?> dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reference<b class="caret"></b></a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <li role="presentation">
                                <a href="<?=$baseUrl?>/ref_item" tabindex="-1" role="menuitem">Items</a>
                            </li>
                            <li role="presentation">
                                <a href="<?=$baseUrl?>/ref_group_item" tabindex="-1" role="menuitem">Group Items</a>
                            </li>
                            <li role="presentation">
                                <a href="<?=$baseUrl?>/ref_sub_item" tabindex="-1" role="menuitem">Sub Items</a>
                            </li>
                            <li role="presentation">
                                <a href="<?=$baseUrl?>/ref_client" tabindex="-1" role="menuitem">Clients</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?=$this->action=='report'?'active':''?>">
                        <a href="<?=$baseUrl?>/report">Report</a>
                    </li>
                    <li class="">
                        <a href="<?=$baseUrl?>/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>