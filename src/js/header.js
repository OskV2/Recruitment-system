const activeNavItems = () => {
    const navItems = document.querySelectorAll('.nav__item');
    
    console.log(navItems)

    navItems.forEach(button => {
        if (button.href === window.location.href) {
            button.classList.add('nav__item--active');
        }
    });
}

export default activeNavItems;