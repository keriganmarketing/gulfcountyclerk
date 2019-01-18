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
            <action-bar  
                class="container d-flex flex-wrap align-items-center"
                date="{{ date('F j, Y')  }}"
                :main-nav="{{ website_menu('main-navigation') }}" 
            ></action-bar>
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