// Vue.component('component-name', require('path/to/component'))

//navigation menus
Vue.component('main-menu', require('./components/navigation/MainNavigationMenu.vue').default);
Vue.component('mobile-menu', require('./components/navigation/MobileNavigationMenu.vue').default);
Vue.component('mega-menu', require('./components/navigation/MegaMenu.vue').default);

//plugins
Vue.component('kma-slider', require('./components/KMASliderModule.vue').default);
Vue.component('search-box', require('./components/SearchBox.vue').default);
Vue.component('expandable-sidebar', require('./components/ExpandableSidebar.vue').default);
Vue.component('text-sizer', require('./components/TextSizer.vue').default);
Vue.component('wrapper', require('./components/Wrapper.vue').default);
Vue.component('action-bar', require('./components/ActionBar.vue').default);