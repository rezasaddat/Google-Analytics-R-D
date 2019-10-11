<div class="uk-grid-collapse uk-child-width-expand@s">
    <!-- tinggi grid -->
    <div class="border-bottom" uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">
        <!-- navbar sisi kiri -->
        <nav class="uk-navbar uk-navbar-container" uk-navbar="mode:click; offset: 0" style="background-color: white;position: relative; z-index: 980;">
            <!-- navbar left -->
            <div class="uk-navbar-left">
                <!-- item navbar -->
                <ul class="uk-navbar-nav" style="z-index: 9">
                    <li>
                        <a class="uk-navbar-toggle uk-visible@s uk-padding-remove-left" uk-navbar-toggle-icon href="#"></a>
                        <div class="uk-navbar-dropdown uk-navbar-dropdown-width-2 uk-visible@s border">

                            <div class="uk-grid-small uk-child-width-1-2@s uk-flex-left uk-text-center" uk-grid>

                                <div>
                                    <div>
                                        <a href="#" style="font-size:12px;text-decoration:none;color:grey">
                                            <span uk-icon="icon: home; ratio: 2"></span>
                                            <p>Dashboard</p>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <hr class="uk-margin-remove-top">

                            <div class="uk-grid-small uk-child-width-1-2@s uk-flex-left" uk-grid>
                                <div class="uk-width-expand">
                                    <div class="uk-card uk-text-left">
                                    <a style="text-decoration:none;color:grey; font-size:12px; cursor: auto;">Selamat datang, <b class="text-main">!</b></a>
                                    </div>
                                </div>
                                <div class="uk-width-auto">
                                    <div class="uk-card uk-text-center">
                                    <a href="#" uk-icon="icon: arrow-right" style="text-decoration:none;color:grey; font-size:12px"> LOG OUT </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="uk-navbar-right ">

                <ul class="uk-navbar-nav ">
                    
                    <div id="embed-api-auth-container"></div>
                                        
                </ul>
            </div>
        </nav>
    </div>
    <hr class="uk-margin-remove-top">
</div>