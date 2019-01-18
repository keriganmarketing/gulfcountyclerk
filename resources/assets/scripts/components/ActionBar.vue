<template>
    <div>
        <p class="todays-date d-block mr-lg-auto text-center text-md-left text-white m-0 px-1 no-break">{{ date }}</p>
        <button @click="$root.toggleSearchBox" 
            :class="{
                'd-lg-none btn btn-sm': true,
                'btn-primary': !$root.searchBoxOpen,
                'btn-white': $root.searchBoxOpen
            }" >
            SEARCH <i 
                    :class="{ 
                        'fa fa-search': !$root.searchBoxOpen, 
                        'fa fa-times': $root.searchBoxOpen 
                    }" 
                    aria-hidden="true"
                    ></i>
        </button>
        <button @click="$root.toggleMenu" 
            :class="{
                'd-lg-none btn btn-sm': true,
                'btn-primary': !$root.mobileMenuOpen,
                'btn-white': $root.mobileMenuOpen
            }"
            type="button" data-toggle="collapse" data-target="#mobilemenu"  aria-expanded="false" aria-label="Toggle navigation">
            MENU <i
                    :class="{
                        'fa fa-bars': !$root.mobileMenuOpen,
                        'fa fa-times': $root.mobileMenuOpen
                    }"
                    aria-hidden="true"
                ></i>
        </button>
        <div class="main-navigation collapse navbar-collapse flex-grow-1">
            <main-menu :main-nav="mainNav" class="navbar-nav ml-auto"></main-menu>
            <button @click="$root.toggleHowDoI"
                class="nav-link bg-white text-primary font-weight-bold sizeable-element border-0"
                style="cursor:pointer"
            >How Do I...</button>
        </div>
        <button @click="$root.toggleMobileHowDoI" 
            :class="{
                'd-lg-none btn btn-sm': true,
                'btn-primary': !$root.mobileHowDoIOpen,
                'btn-white': $root.mobileHowDoIOpen
            }"
            >HOW Do I... <i
                :class="{
                    'fa fa-chevron-down': !$root.mobileHowDoIOpen,
                    'fa fa-chevron-up': $root.mobileHowDoIOpen
                }"
                aria-hidden="true"
            ></i>
        </button>
    </div>
</template>
<script>
export default {
    props: ['date', 'mainNav']
}
</script>
