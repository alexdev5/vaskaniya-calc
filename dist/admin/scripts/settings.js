window.addEventListener('DOMContentLoaded', function () {
    setActiveMenuIfCreatePost()

    function setActiveMenuIfCreatePost() {
        if (!isActiveUrl()) return

        const menu = document.querySelector('#menu-posts-vs-products')

        if(!menu) return

        menu.classList.remove('wp-not-current-submenu')
        menu.classList.add('wp-has-current-submenu', 'wp-menu-open')
    }

    function isActiveUrl() {
        return [
            '?post_type=vs-products-palette',
            '?post_type=vs-products-addons',
            '?post_type=vs-products-services',
        ]
            .some(search => search === location.search)
    }
})
