<header class="top">
    <div class="bg-white">
        <div class="top-container">
            <div class="container d-md-flex justify-content-between">
                <div class="site-branding text-left d-inline-flex" >
                    <a class="logo" href="/">
                        <img class="logo img-fluid" src="/themes/wordplate/assets/images/seal.png" alt="Gulf County, Florida Circuit Court Seal" >
                    </a>
                    <div class="logo-text">
                        <p class="clerk-name">Rebecca L. (Becky) Norris</p>
                        <p>Gulf County, Florida<br>Clerk of Court</p>
                    </div>
                </div>
                <div class="header-right d-none d-md-flex flex-column justify-content-center">
                    <text-sizer class="text-sizer d-flex justify-content-end align-items-center py-2"></text-sizer>
                    <div class="search-box py-2">
                        {{ get_search_form() }}
                    </div>
                </div>
            </div>
        </div>
        <div role="navigation" class="topnav flex-wrap navbar navbar-expand-lg bg-primary sizable" >
            <div class="container d-flex flex-wrap align-items-center">
                <p class="todays-date d-block mr-lg-auto text-center text-md-left text-white m-0 px-1 no-break">{{ date('F j, Y') }}</p>
                <button @click="toggleSearchBox" 
                    :class="{
                        'd-lg-none btn btn-sm': true,
                        'btn-primary': !searchBoxOpen,
                        'btn-white': searchBoxOpen
                    }" >
                    SEARCH <i 
                            :class="{ 
                                'fa fa-search': !searchBoxOpen, 
                                'fa fa-times': searchBoxOpen 
                            }" 
                            aria-hidden="true"
                            ></i>
                </button>
                <button @click="toggleMenu" 
                    :class="{
                        'd-lg-none btn btn-sm': true,
                        'btn-primary': !mobileMenuOpen,
                        'btn-white': mobileMenuOpen
                    }"
                    type="button" data-toggle="collapse" data-target="#mobilemenu"  aria-expanded="false" aria-label="Toggle navigation">
                    MENU <i
                            :class="{
                                'fa fa-bars': !mobileMenuOpen,
                                'fa fa-times': mobileMenuOpen
                            }"
                            aria-hidden="true"
                        ></i>
                </button>
                <div class="main-navigation collapse navbar-collapse flex-grow-1">
                    <main-menu :main-nav="{{ website_menu('main-navigation') }}" class="navbar-nav ml-auto"></main-menu>
                    <button @click="toggleHowDoI"
                        class="nav-link bg-white text-primary font-weight-bold sizeable-element border-0"
                        style="cursor:pointer"
                    >How Do I...</button>
                </div>
                <button @click="toggleMobileHowDoI" 
                    :class="{
                        'd-lg-none btn btn-sm': true,
                        'btn-primary': !mobileHowDoIOpen,
                        'btn-white': mobileHowDoIOpen
                    }"
                    >HOW Do I... <i
                        :class="{
                            'fa fa-chevron-down': !mobileHowDoIOpen,
                            'fa fa-chevron-up': mobileHowDoIOpen
                        }"
                        aria-hidden="true"
                    ></i>
                </button>
            </div>
        </div>
    </div>
    <div v-if="howDoIOpen" class="mobile-menu sizable" ref="howdoiMenuContainer" :class="{ 'open': howDoIOpen }" >
        <div class="container d-none d-lg-block">
            <mega-menu :main-nav="{{ website_menu(5) }}" ></mega-menu>
        </div>
    </div>
    <div v-if="mobileHowDoIOpen" class="mobile-menu" ref="howdoiMenuContainer" :class="{ 'open': mobileHowDoIOpen }" >
        <mobile-menu :mobile-nav="{{ website_menu(5) }}" class="navbar-nav" ></mobile-menu>
    </div>
    <div id="mobilemenu" v-if="mobileMenuOpen" class="mobile-menu" ref="mobileMenuContainer" :class="{ 'open': mobileMenuOpen }" >
        <mobile-menu :mobile-nav="{{ website_menu('mobile-navigation') }}" class="navbar-nav" ></mobile-menu>
    </div>
    <div v-if="searchBoxOpen" class="mobile-search-box" ref="mobileSearchBoxContainer" :class="{ 'open': searchBoxOpen }" >
        <search-box></search-box>
    </div>
</header>
<div class="top-pad"></div>