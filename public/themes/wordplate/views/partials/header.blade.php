<header class="top">
    <div class="container d-md-flex justify-content-between">
        <div class="site-branding text-left d-inline-flex" >
            <div class="seal">
                <img class="logo" src="/themes/wordplate/assets/images/seal.png" class="img-fluid" alt="Gulf County, Florida Circuit Court Seal" >
            </div>
            <div class="logo-text">
                <p class="clerk-name">Rebecca L. (Becky) Norris</p>
                <p>Gulf County, Florida<br>Clerk of Court</p>
            </div>
        </div>
    </div>
    <div role="navigation" class="topnav navbar navbar-expand-lg bg-primary" >
        <div class="container d-flex align-items-center">
            <span class="todays-date d-block mr-lg-auto text-center text-md-left text-white">{{ date('F j, Y') }}</span>
            <button @click="toggleSearchBox" 
                class="d-lg-none btn btn-sm"
                :class="{
                    'btn-primary': !searchBoxOpen,
                    'btn-white': searchBoxOpen
                }" >
                SEARCH <i 
                        class="fa" 
                        :class="{ 
                            'fa-search': !searchBoxOpen, 
                            'fa-times': searchBoxOpen 
                        }" 
                        aria-hidden="true"
                        ></i>
            </button>
            <button @click="toggleMenu" 
                class="d-lg-none btn btn-sm" 
                :class="{
                    'btn-primary': !mobileMenuOpen,
                    'btn-white': mobileMenuOpen
                }"
                type="button" data-toggle="collapse" data-target="#mobilemenu" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                MENU <i
                        class="fa" 
                        :class="{
                            'fa-bars': !mobileMenuOpen,
                            'fa-times': mobileMenuOpen
                        }"
                        aria-hidden="true"
                    ></i>
            </button>
            <div class="main-navigation collapse navbar-collapse flex-grow-1">
                <main-menu :main-nav="{{ website_menu('main-navigation') }}" class="navbar-nav ml-auto"></main-menu>
                <a @click="toggleHowDoI" @mouseover="howDoIOpen = true"
                    class="nav-link bg-white text-primary font-weight-bold" 
                >How Do I...</a>
            </div>
            <button @click="toggleMobileHowDoI" 
                class="d-lg-none btn btn-sm"
                :class="{
                    'btn-primary': !mobileHowDoIOpen,
                    'btn-white': mobileHowDoIOpen
                }"
                >HOW Do I... <i
                    class="fa" 
                    :class="{
                        'fa-chevron-down': !mobileHowDoIOpen,
                        'fa-chevron-up': mobileHowDoIOpen
                    }"
                    aria-hidden="true"
                ></i>
            </button>
        </div>
    </div>
    <div v-if="howDoIOpen" class="mobile-menu" ref="howdoiMenuContainer" :class="{ 'open': howDoIOpen }" >
        <div class="container d-none d-lg-block">
            <mega-menu :main-nav="{{ website_menu(5) }}" @mousedout="toggleHowDoI" ></mega-menu>
        </div>
    </div>
    <div v-if="mobileHowDoIOpen" class="mobile-menu" ref="howdoiMenuContainer" :class="{ 'open': mobileHowDoIOpen }" >
        <mobile-menu :mobile-nav="{{ website_menu(5) }}" class="navbar-nav" ></mobile-menu>
    </div>
    <div v-if="mobileMenuOpen" class="mobile-menu" ref="mobileMenuContainer" :class="{ 'open': mobileMenuOpen }" >
        <mobile-menu :mobile-nav="{{ website_menu('mobile-navigation') }}" class="navbar-nav" ></mobile-menu>
    </div>
    <div v-if="searchBoxOpen" class="mobile-search-box" ref="mobileSearchBoxContainer" :class="{ 'open': searchBoxOpen }" >
        <search-box></search-box>
    </div>
</header>
<div class="top-pad"></div>