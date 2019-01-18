// Vue.component('component-name', require('path/to/component'))

//navigation menus
Vue.component('main-menu', require('./components/navigation/MainNavigationMenu.vue'));
Vue.component('mobile-menu', require('./components/navigation/MobileNavigationMenu.vue'));
Vue.component('mega-menu', require('./components/navigation/MegaMenu.vue'));

//plugins
Vue.component('kma-slider', require('./components/KMASliderModule.vue'));
Vue.component('search-box', require('./components/SearchBox.vue'));
Vue.component('expandable-sidebar', require('./components/ExpandableSidebar.vue'));
Vue.component('text-sizer', require('./components/TextSizer.vue'));
Vue.component('wrapper', require('./components/Wrapper.vue'));
Vue.component('action-bar', require('./components/ActionBar.vue'));