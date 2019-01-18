<template>
    <div 
        id="wrapper"
        class="site-wrapper"
        :class="{
            'scrolling': $root.isScrolling,
            'mobile-menu-open': $root.mobileMenuOpen,
            'text-normal': $root.textSize === 0,
            'text-large': $root.textSize === 1,
            'text-larger': $root.textSize === 2,
            'text-largest': $root.textSize === 3
        }" >
        <slot></slot>
    </div>
</template>
<script>
export default {
    
}
</script>
